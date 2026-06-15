<?php
/**
 * Plugin Name: PhysicalMe — Contact form
 * Description: A self-hosted contact form (no Google reCAPTCHA — bot-blocked in Iran).
 *              Uses a math CAPTCHA, stores every submission as a `contact_msg`
 *              CPT row (so admins can read everything in wp-admin),
 *              accepts file attachments up to 20 MB, emails the admin a
 *              digest with a `mailto:` reply link.
 *
 * Render with the [pm_contact_form] shortcode.
 */

if (!defined('ABSPATH')) exit;

const PM_CF_MAX_FILE_BYTES       = 20 * 1024 * 1024; // 20 MB per upload
const PM_CF_RATE_LIMIT_PER_HOUR  = 3;                // SUCCESSFUL submissions per IP per hour
const PM_CF_MAX_ATTEMPTS_PER_HOUR = 30;              // total attempts per IP per hour (incl rejects)
const PM_CF_GLOBAL_DAILY_CAP     = 80;               // site-wide ceiling (successful only)
const PM_CF_MIN_FORM_DURATION    = 4;                // seconds — humans take >= 4s
const PM_CF_MIN_FREE_DISK_BYTES  = 2 * 1024 * 1024 * 1024; // refuse uploads if < 2 GB free
const PM_CF_ATTACHMENT_RETENTION = 90;               // days — auto-delete older
const PM_CF_NONCE_ACTION         = 'pm_contact_form_submit';

/* Normalize Persian (۰-۹) and Arabic (٠-٩) digits to ASCII so PHP can int-cast them. */
function pm_cf_normalize_digits(string $s): string {
    $fa = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $ar = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    $en = ['0','1','2','3','4','5','6','7','8','9'];
    return str_replace(array_merge($fa, $ar), array_merge($en, $en), $s);
}

/* ─────────── Register the CPT that stores incoming messages ─────────── */
add_action('init', function () {
    register_post_type('contact_msg', [
        'label'        => 'پیام‌های تماس',
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-email',
        'supports'     => ['title', 'editor', 'custom-fields'],
        'capabilities' => [
            'create_posts' => 'do_not_allow',  // only the form creates them
        ],
        'map_meta_cap' => true,
    ]);
});

/* ─────────── Allowed MIME types for the attachment (whitelist) ─────────── */
function pm_cf_allowed_mimes(): array {
    return [
        'image/jpeg'                                                                => 'jpg',
        'image/png'                                                                 => 'png',
        'image/webp'                                                                => 'webp',
        'application/pdf'                                                           => 'pdf',
        'application/zip'                                                           => 'zip',
        'application/msword'                                                        => 'doc',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
        'application/vnd.ms-excel'                                                  => 'xls',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
        'text/plain'                                                                => 'txt',
    ];
}

/* ─────────── Issue a fresh math CAPTCHA challenge ─────────── */
function pm_cf_new_captcha(): array {
    $a = random_int(2, 9);
    $b = random_int(2, 9);
    $answer = $a + $b;
    // Token is a signed pair: "a+b|expiry|sha1(a+b|expiry|salt)"
    $expiry = time() + 30 * MINUTE_IN_SECONDS;
    $salt = wp_salt('auth');
    $payload = "{$answer}|{$expiry}";
    $token = $payload . '|' . sha1($payload . '|' . $salt);
    return [
        'question' => sprintf('%d + %d = ?', $a, $b),
        'token'    => $token,
    ];
}

function pm_cf_verify_captcha(string $token, string $user_answer): bool {
    $parts = explode('|', $token);
    if (count($parts) !== 3) return false;
    [$answer, $expiry, $sig] = $parts;
    if (time() > (int)$expiry) return false;
    $salt = wp_salt('auth');
    if (!hash_equals(sha1("{$answer}|{$expiry}|{$salt}"), $sig)) return false;
    // Persian/Arabic-digit keyboards send رقم فارسی; normalize before comparing.
    $normalized = pm_cf_normalize_digits($user_answer);
    return (int)$normalized === (int)$answer;
}

/* ─────────── Rate-limit helpers ─────────── *
 * Two counters per IP:
 *   • "attempts" — incremented on EVERY submit (incl. rejects). Defends against
 *     CAPTCHA brute-force + form spam.
 *   • "successful" — incremented only after the message is fully validated and
 *     saved. This is the visible "N per hour" limit the user feels.
 */
function pm_cf_attempts_count(string $ip): int {
    return (int) get_transient('pm_cf_att_' . md5($ip));
}
function pm_cf_attempts_bump(string $ip): void {
    $k = 'pm_cf_att_' . md5($ip);
    set_transient($k, pm_cf_attempts_count($ip) + 1, HOUR_IN_SECONDS);
}
function pm_cf_successful_count(string $ip): int {
    return (int) get_transient('pm_cf_rl_' . md5($ip));
}
function pm_cf_successful_bump(string $ip): void {
    $k = 'pm_cf_rl_' . md5($ip);
    set_transient($k, pm_cf_successful_count($ip) + 1, HOUR_IN_SECONDS);
}

function pm_cf_client_ip(): string {
    foreach (['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'] as $h) {
        if (!empty($_SERVER[$h])) {
            $ip = trim(explode(',', $_SERVER[$h])[0]);
            if (filter_var($ip, FILTER_VALIDATE_IP)) return $ip;
        }
    }
    return '0.0.0.0';
}

/* ─────────── Shortcode renderer ─────────── */
add_shortcode('pm_contact_form', function () {
    $sent_id  = isset($_GET['pm_cf_sent']) ? (int) $_GET['pm_cf_sent'] : 0;
    $error    = isset($_GET['pm_cf_err'])  ? sanitize_text_field((string) $_GET['pm_cf_err'])  : '';

    ob_start();

    if ($sent_id) {
        echo '<div class="pm-cf-success">'
           . '<h3>✓ پیام شما با موفقیت ارسال شد</h3>'
           . '<p>به‌زودی پاسخ می‌دم. اگه چیزی فوریه، می‌تونی مستقیماً ایمیل بزنی به <a href="mailto:bagheri.h@gmail.com">bagheri.h@gmail.com</a>.</p>'
           . '</div>';
    }

    if ($error) {
        echo '<div class="pm-cf-error">⚠️ ' . esc_html($error) . '</div>';
    }

    $challenge = pm_cf_new_captcha();
    $nonce = wp_create_nonce(PM_CF_NONCE_ACTION);
    $max_mb = (int)(PM_CF_MAX_FILE_BYTES / (1024 * 1024));

    // Signed timestamp — used to enforce minimum form-fill duration on submit.
    $start_ts  = time();
    $start_sig = sha1($start_ts . '|' . wp_salt('auth'));

    // Preserve user input on validation failure
    $old_email   = isset($_GET['pm_cf_email'])   ? sanitize_email((string) $_GET['pm_cf_email'])   : '';
    $old_subject = isset($_GET['pm_cf_subject']) ? sanitize_text_field((string) $_GET['pm_cf_subject']) : '';
    $old_body    = isset($_GET['pm_cf_body'])    ? sanitize_textarea_field((string) $_GET['pm_cf_body'])    : '';

    ?>
    <form method="post" enctype="multipart/form-data" class="pm-cf-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="pm_contact_submit" />
      <input type="hidden" name="pm_cf_nonce" value="<?php echo esc_attr($nonce); ?>" />
      <input type="hidden" name="pm_cf_captcha_token" value="<?php echo esc_attr($challenge['token']); ?>" />
      <input type="hidden" name="pm_cf_start_ts"  value="<?php echo esc_attr($start_ts); ?>" />
      <input type="hidden" name="pm_cf_start_sig" value="<?php echo esc_attr($start_sig); ?>" />

      <!-- Honeypot: hidden from real users via INLINE style (so it works even
           if site CSS is overridden). Bots that scrape DOM still fill it and
           reveal themselves. The label looks like a benign "Website" field on
           purpose — that's a common spam-bot magnet. -->
      <div class="pm-cf-hp" aria-hidden="true"
           style="position:absolute !important; left:-10000px !important; top:auto !important; width:1px !important; height:1px !important; overflow:hidden !important; opacity:0 !important; pointer-events:none !important;">
        <label for="pm_cf_website">Website</label>
        <input type="text" id="pm_cf_website" name="pm_cf_website" value="" tabindex="-1" autocomplete="off" />
      </div>

      <div class="pm-cf-field">
        <label for="pm-cf-email">ایمیل شما<span class="pm-cf-req">*</span></label>
        <input type="email" id="pm-cf-email" name="pm_cf_email" required
               value="<?php echo esc_attr($old_email); ?>"
               placeholder="you@example.com" autocomplete="email" />
      </div>

      <div class="pm-cf-field">
        <label for="pm-cf-subject">موضوع<span class="pm-cf-req">*</span></label>
        <input type="text" id="pm-cf-subject" name="pm_cf_subject" required maxlength="160"
               value="<?php echo esc_attr($old_subject); ?>"
               placeholder="مثلاً: سؤال درباره‌ی فصل ۳ دوازدهم" />
      </div>

      <div class="pm-cf-field">
        <label for="pm-cf-body">متن پیام<span class="pm-cf-req">*</span></label>
        <textarea id="pm-cf-body" name="pm_cf_body" required rows="7" maxlength="8000"
                  placeholder="پیامت رو اینجا بنویس…"><?php echo esc_textarea($old_body); ?></textarea>
      </div>

      <div class="pm-cf-field">
        <label for="pm-cf-file">پیوست (اختیاری)</label>
        <input type="file" id="pm-cf-file" name="pm_cf_file"
               data-max-bytes="<?php echo (int) PM_CF_MAX_FILE_BYTES; ?>"
               accept=".jpg,.jpeg,.png,.webp,.pdf,.zip,.doc,.docx,.xls,.xlsx,.txt" />
        <span class="pm-cf-hint">فرمت‌های قابل قبول: jpg, png, webp, pdf, zip, doc, docx, xls, xlsx, txt</span>
      </div>
      <script>
      (function () {
        var f = document.getElementById('pm-cf-file');
        if (!f) return;
        var maxBytes = parseInt(f.getAttribute('data-max-bytes'), 10) || (20 * 1024 * 1024);
        f.addEventListener('change', function () {
          if (!this.files || !this.files[0]) return;
          var size = this.files[0].size;
          if (size > maxBytes) {
            var mb = (size / (1024*1024)).toFixed(1);
            alert('⚠️ حجم فایل (' + mb + ' مگابایت) از حداکثر مجاز (۲۰ مگابایت) بیشتره. فایل کوچکتری انتخاب کن.');
            this.value = '';
          }
        });
        var form = f.closest('form');
        if (form) {
          form.addEventListener('submit', function (ev) {
            if (f.files && f.files[0] && f.files[0].size > maxBytes) {
              ev.preventDefault();
              alert('⚠️ حجم فایل از ۲۰ مگابایت بیشتره. فایل کوچکتری انتخاب کن.');
            }
          });
        }
      })();
      </script>

      <div class="pm-cf-field pm-cf-captcha-field">
        <label for="pm-cf-captcha">برای تأیید انسان بودن: <strong><?php echo esc_html($challenge['question']); ?></strong></label>
        <input type="number" id="pm-cf-captcha" name="pm_cf_captcha_answer" required
               inputmode="numeric" autocomplete="off"
               placeholder="جواب" />
      </div>

      <button type="submit" class="pm-cf-submit">ارسال پیام</button>
    </form>
    <?php
    return ob_get_clean();
});

/* ─────────── Form handler ─────────── */
add_action('admin_post_nopriv_pm_contact_submit', 'pm_cf_handle_submit');
add_action('admin_post_pm_contact_submit',        'pm_cf_handle_submit');

function pm_cf_handle_submit() {
    $back_to = wp_get_referer() ?: home_url('/contact/');

    // 1. Nonce
    if (!isset($_POST['pm_cf_nonce']) || !wp_verify_nonce($_POST['pm_cf_nonce'], PM_CF_NONCE_ACTION)) {
        wp_safe_redirect(add_query_arg(['pm_cf_err' => 'احراز هویت ناموفق. صفحه را تازه کنید و دوباره تلاش کنید.'], $back_to));
        exit;
    }

    // 2a. Honeypot — if the hidden field has anything, it's a bot.
    if (!empty($_POST['pm_cf_website'])) {
        // Pretend success so the bot doesn't retry; just drop the message.
        wp_safe_redirect(add_query_arg(['pm_cf_sent' => 0], $back_to));
        exit;
    }

    // 2b. Minimum form-fill duration — humans take time to read & type.
    $start_ts  = (int) ($_POST['pm_cf_start_ts']  ?? 0);
    $start_sig = (string) ($_POST['pm_cf_start_sig'] ?? '');
    if (!$start_ts || !hash_equals(sha1($start_ts . '|' . wp_salt('auth')), $start_sig)) {
        wp_safe_redirect(add_query_arg(['pm_cf_err' => 'فرم نامعتبره. صفحه را تازه کن و دوباره تلاش کن.'], $back_to));
        exit;
    }
    $elapsed = time() - $start_ts;
    if ($elapsed < PM_CF_MIN_FORM_DURATION || $elapsed > 6 * HOUR_IN_SECONDS) {
        wp_safe_redirect(add_query_arg(['pm_cf_err' => 'لطفاً قبل از ارسال، چند ثانیه روی فرم بمون و دوباره تلاش کن.'], $back_to));
        exit;
    }

    // 2c. Per-IP — refuse if the SUCCESSFUL submission count already hit the cap.
    //     Rejected attempts don't count here (those are tracked in 2c-bis).
    $ip = pm_cf_client_ip();
    if (pm_cf_successful_count($ip) >= PM_CF_RATE_LIMIT_PER_HOUR) {
        wp_safe_redirect(add_query_arg(['pm_cf_err' => 'تعداد پیام‌های موفق شما در این ساعت پر شده. لطفاً بعداً تلاش کن.'], $back_to));
        exit;
    }
    // 2c-bis. Per-IP attempt cap (rejected + successful). Stops brute-force.
    if (pm_cf_attempts_count($ip) >= PM_CF_MAX_ATTEMPTS_PER_HOUR) {
        wp_safe_redirect(add_query_arg(['pm_cf_err' => 'تعداد تلاش‌های شما زیاد شده. لطفاً یه ساعت دیگه دوباره تلاش کن.'], $back_to));
        exit;
    }
    pm_cf_attempts_bump($ip);

    // 2d. Global daily ceiling (cap total submissions site-wide so a botnet
    //     using rotating IPs can't fill the disk overnight).
    $day_key   = 'pm_cf_global_' . gmdate('Ymd');
    $day_count = (int) get_transient($day_key);
    if ($day_count >= PM_CF_GLOBAL_DAILY_CAP) {
        wp_safe_redirect(add_query_arg(['pm_cf_err' => 'سهمیه‌ی روزانه‌ی پیام‌ها پر شده. لطفاً فردا دوباره تلاش کن.'], $back_to));
        exit;
    }
    set_transient($day_key, $day_count + 1, DAY_IN_SECONDS);

    // 2e. Disk-quota guard — refuse uploads if free space is getting tight.
    $up_dir = wp_get_upload_dir();
    $free   = @disk_free_space($up_dir['basedir']);
    if ($free !== false && $free < PM_CF_MIN_FREE_DISK_BYTES) {
        // Allow text-only messages through, but block any attached file.
        $_FILES['pm_cf_file'] = ['name'=>'','type'=>'','tmp_name'=>'','error'=>UPLOAD_ERR_NO_FILE,'size'=>0];
    }

    // 3. Sanitize inputs
    $email   = sanitize_email((string) ($_POST['pm_cf_email']   ?? ''));
    $subject = sanitize_text_field((string) ($_POST['pm_cf_subject'] ?? ''));
    $body    = sanitize_textarea_field((string) ($_POST['pm_cf_body'] ?? ''));
    $captcha_answer = (string) ($_POST['pm_cf_captcha_answer'] ?? '');
    $captcha_token  = (string) ($_POST['pm_cf_captcha_token']  ?? '');

    if (!is_email($email)) {
        wp_safe_redirect(add_query_arg([
            'pm_cf_err' => 'ایمیل معتبر نیست.',
            'pm_cf_email' => $email, 'pm_cf_subject' => $subject, 'pm_cf_body' => $body,
        ], $back_to));
        exit;
    }
    if (mb_strlen($subject) < 2 || mb_strlen($body) < 5) {
        wp_safe_redirect(add_query_arg([
            'pm_cf_err' => 'موضوع یا متن خیلی کوتاهه.',
            'pm_cf_email' => $email, 'pm_cf_subject' => $subject, 'pm_cf_body' => $body,
        ], $back_to));
        exit;
    }

    // 4. CAPTCHA
    if (!pm_cf_verify_captcha($captcha_token, $captcha_answer)) {
        wp_safe_redirect(add_query_arg([
            'pm_cf_err' => 'پاسخ تست انسانی اشتباهه. دوباره تلاش کن.',
            'pm_cf_email' => $email, 'pm_cf_subject' => $subject, 'pm_cf_body' => $body,
        ], $back_to));
        exit;
    }

    // 5. File upload (optional)
    $attachment_url  = '';
    $attachment_path = '';
    $attachment_meta = [];

    if (!empty($_FILES['pm_cf_file']['name']) && (int) $_FILES['pm_cf_file']['size'] > 0) {
        $f = $_FILES['pm_cf_file'];

        if ($f['error'] !== UPLOAD_ERR_OK) {
            wp_safe_redirect(add_query_arg(['pm_cf_err' => 'خطا در بارگذاری فایل (کد ' . (int)$f['error'] . ').'], $back_to));
            exit;
        }
        if ((int) $f['size'] > PM_CF_MAX_FILE_BYTES) {
            wp_safe_redirect(add_query_arg([
                'pm_cf_err' => 'حجم فایل بیشتر از ' . (int)(PM_CF_MAX_FILE_BYTES / 1024 / 1024) . ' مگابایته.',
                'pm_cf_email' => $email, 'pm_cf_subject' => $subject, 'pm_cf_body' => $body,
            ], $back_to));
            exit;
        }

        // Read MIME from the bytes (don't trust the client-supplied $f['type']).
        $finfo = function_exists('finfo_open') ? finfo_open(FILEINFO_MIME_TYPE) : false;
        $real_mime = $finfo ? finfo_file($finfo, $f['tmp_name']) : ($f['type'] ?? '');
        if ($finfo) finfo_close($finfo);

        $allowed = pm_cf_allowed_mimes();
        $ext = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));
        $ext_whitelist = ['jpg','jpeg','png','webp','pdf','zip','doc','docx','xls','xlsx','txt'];
        // Canonicalize the extension first — both .jpg and .jpeg are the same family.
        $canonical_ext = ($ext === 'jpeg') ? 'jpg' : $ext;

        // 1) MIME must be in whitelist
        if (!isset($allowed[$real_mime])) {
            wp_safe_redirect(add_query_arg([
                'pm_cf_err' => 'این نوع فایل پشتیبانی نمی‌شه (نوع تشخیص‌داده‌شده: ' . esc_html($real_mime) . ').',
                'pm_cf_email' => $email, 'pm_cf_subject' => $subject, 'pm_cf_body' => $body,
            ], $back_to));
            exit;
        }
        // 2) Extension must be in whitelist
        if (!in_array($ext, $ext_whitelist, true)) {
            wp_safe_redirect(add_query_arg([
                'pm_cf_err' => 'پسوند فایل پشتیبانی نمی‌شه (' . esc_html($ext) . ').',
                'pm_cf_email' => $email, 'pm_cf_subject' => $subject, 'pm_cf_body' => $body,
            ], $back_to));
            exit;
        }
        // 3) MIME and extension must match each other (e.g. .jpg + image/jpeg)
        if ($allowed[$real_mime] !== $canonical_ext) {
            wp_safe_redirect(add_query_arg([
                'pm_cf_err' => 'پسوند فایل با نوع واقعی همخوانی نداره (پسوند: ' . esc_html($ext) . ' / نوع واقعی: ' . esc_html($real_mime) . ').',
                'pm_cf_email' => $email, 'pm_cf_subject' => $subject, 'pm_cf_body' => $body,
            ], $back_to));
            exit;
        }

        // Move into uploads/contact-attachments/<year>/<month>/
        // Filename is RANDOMIZED — never trust the user's name. The original
        // name is still stored in meta so admin can read it but the public URL
        // never carries it.
        if (!function_exists('wp_handle_upload')) require_once ABSPATH . 'wp-admin/includes/file.php';

        $safe_ext  = $canonical_ext;
        $safe_name = wp_generate_uuid4() . '.' . $safe_ext;
        $_FILES['pm_cf_file']['name'] = $safe_name;

        $custom_dir = ['subdir' => '/contact-attachments/' . date('Y/m')];
        $filter = function ($dirs) use ($custom_dir) {
            $dirs['subdir'] = $custom_dir['subdir'];
            $dirs['path']   = $dirs['basedir'] . $custom_dir['subdir'];
            $dirs['url']    = $dirs['baseurl'] . $custom_dir['subdir'];
            return $dirs;
        };
        add_filter('upload_dir', $filter);
        $up = wp_handle_upload($_FILES['pm_cf_file'], [
            'test_form' => false,
            'mimes'     => pm_cf_allowed_mimes(),
        ]);
        remove_filter('upload_dir', $filter);

        if (isset($up['error'])) {
            wp_safe_redirect(add_query_arg(['pm_cf_err' => 'خطا در ذخیره‌ی فایل: ' . esc_html($up['error'])], $back_to));
            exit;
        }

        // Drop a hardened .htaccess in the attachment dir on first use
        $dir_path = dirname($up['file']);
        $htaccess = $dir_path . '/.htaccess';
        if (!file_exists($htaccess)) {
            @file_put_contents($htaccess, implode("\n", [
                "# Hardened: disable all server-side execution in this folder.",
                "<FilesMatch \"\\.(php|phtml|phar|cgi|pl|py|sh|asp|aspx|exe|js|html|htm|xhtml|svg)$\">",
                "    Require all denied",
                "</FilesMatch>",
                "# Defang any HTML inside this folder by serving as plain text",
                "AddType text/plain .html .htm .xhtml",
                "# Belt-and-braces: don't run handlers",
                "RemoveHandler .php .phtml .phar .cgi .pl .py .sh .asp .aspx .exe",
                "RemoveType    .php .phtml .phar .cgi .pl .py .sh .asp .aspx .exe",
                "Options -ExecCGI -Indexes",
                "php_flag engine off",
                "",
            ]));
        }

        $attachment_url  = $up['url'];
        $attachment_path = $up['file'];
        $attachment_meta = [
            'original_name' => sanitize_file_name($f['name']),
            'stored_name'   => $safe_name,
            'size_bytes'    => (int) $f['size'],
            'mime'          => $real_mime,
        ];
    }

    // 6. Persist as a CPT row
    $title = '[' . current_time('Y-m-d H:i') . '] ' . $subject . ' — ' . $email;
    $post_id = wp_insert_post([
        'post_type'    => 'contact_msg',
        'post_status'  => 'private',
        'post_title'   => wp_strip_all_tags($title),
        'post_content' => $body,
    ], true);

    if (is_wp_error($post_id)) {
        wp_safe_redirect(add_query_arg(['pm_cf_err' => 'ذخیره‌سازی پیام ممکن نشد. لطفاً دوباره تلاش کن.'], $back_to));
        exit;
    }

    update_post_meta($post_id, '_pm_cf_email',   $email);
    update_post_meta($post_id, '_pm_cf_subject', $subject);
    update_post_meta($post_id, '_pm_cf_ip',      $ip);
    update_post_meta($post_id, '_pm_cf_ua',      sanitize_text_field((string) ($_SERVER['HTTP_USER_AGENT'] ?? '')));
    if ($attachment_url) {
        update_post_meta($post_id, '_pm_cf_attachment_url',  esc_url_raw($attachment_url));
        update_post_meta($post_id, '_pm_cf_attachment_path', $attachment_path);
        update_post_meta($post_id, '_pm_cf_attachment_meta', $attachment_meta);
    }

    // 7. Notify the admin
    $admin = get_option('admin_email');
    $reply_subject = 'Re: ' . $subject;
    $mailto = 'mailto:' . rawurlencode($email)
            . '?subject=' . rawurlencode($reply_subject)
            . '&body=' . rawurlencode("\n\n— حسن باقری | منِ فیزیکی\n\n— پیام شما:\n" . $body);
    $mail_body  = "پیام جدیدی از فرم تماس سایت دریافت شد:\n\n";
    $mail_body .= "از: {$email}\n";
    $mail_body .= "موضوع: {$subject}\n\n";
    $mail_body .= "متن:\n{$body}\n\n";
    if ($attachment_url) {
        $mail_body .= "پیوست: {$attachment_url}\n";
        $mail_body .= "  ({$attachment_meta['original_name']}, " . round($attachment_meta['size_bytes']/1024) . " KB, {$attachment_meta['mime']})\n\n";
    }
    $mail_body .= "پاسخ‌دادن: {$mailto}\n";
    $mail_body .= "مشاهده در سایت: " . admin_url("post.php?post={$post_id}&action=edit") . "\n";

    wp_mail($admin, '[منِ فیزیکی] پیام جدید — ' . $subject, $mail_body, [
        'Reply-To: ' . $email,
    ]);

    // 8. Bump the SUCCESSFUL-submissions counter only now that we know the
    //    message was actually saved. Rejected attempts never reach this point,
    //    so a user who fluffs the CAPTCHA twice doesn't burn their 3/hour quota.
    pm_cf_successful_bump($ip);

    // 9. Redirect to a success state (don't preserve the body in URL — it's already saved)
    wp_safe_redirect(add_query_arg(['pm_cf_sent' => $post_id], home_url('/contact/')));
    exit;
}

/* ─────────── Scheduled cleanup: prune old attachments + old messages ─────────── */
add_filter('cron_schedules', function ($s) {
    if (!isset($s['daily'])) $s['daily'] = ['interval' => DAY_IN_SECONDS, 'display' => 'Once daily'];
    return $s;
});

add_action('init', function () {
    if (!wp_next_scheduled('pm_cf_daily_cleanup')) {
        wp_schedule_event(time() + 600, 'daily', 'pm_cf_daily_cleanup');
    }
});

add_action('pm_cf_daily_cleanup', function () {
    $cutoff = strtotime('-' . PM_CF_ATTACHMENT_RETENTION . ' days');
    $q = new WP_Query([
        'post_type'      => 'contact_msg',
        'post_status'    => 'any',
        'posts_per_page' => 200,
        'date_query'     => [['column' => 'post_date', 'before' => date('Y-m-d', $cutoff)]],
        'fields'         => 'ids',
    ]);
    foreach ($q->posts as $mid) {
        $att_path = get_post_meta($mid, '_pm_cf_attachment_path', true);
        if ($att_path && file_exists($att_path)) @unlink($att_path);
        wp_delete_post($mid, true); // hard delete — these are private support messages
    }
});

register_deactivation_hook(__FILE__, function () {
    $ts = wp_next_scheduled('pm_cf_daily_cleanup');
    if ($ts) wp_unschedule_event($ts, 'pm_cf_daily_cleanup');
});

/* ─────────── Admin: show meta on the CPT edit screen ─────────── */
add_action('add_meta_boxes', function () {
    add_meta_box('pm_cf_meta', 'اطلاعات تماس', function ($post) {
        $email   = get_post_meta($post->ID, '_pm_cf_email', true);
        $subject = get_post_meta($post->ID, '_pm_cf_subject', true);
        $ip      = get_post_meta($post->ID, '_pm_cf_ip', true);
        $att_url = get_post_meta($post->ID, '_pm_cf_attachment_url', true);
        $att_meta= get_post_meta($post->ID, '_pm_cf_attachment_meta', true);
        $mailto = 'mailto:' . rawurlencode($email)
                . '?subject=' . rawurlencode('Re: ' . $subject)
                . '&body=' . rawurlencode("\n\n— حسن باقری | منِ فیزیکی\n\n— پیام شما:\n" . wp_strip_all_tags($post->post_content));
        echo '<p><b>از:</b> <a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a></p>';
        echo '<p><b>موضوع:</b> ' . esc_html($subject) . '</p>';
        echo '<p><b>IP:</b> <code>' . esc_html($ip) . '</code></p>';
        if ($att_url) {
            $name = $att_meta['original_name'] ?? basename($att_url);
            $kb = isset($att_meta['size_bytes']) ? round($att_meta['size_bytes']/1024) . ' KB' : '';
            echo '<p><b>پیوست:</b> <a href="' . esc_url($att_url) . '" target="_blank">' . esc_html($name) . '</a> ' . esc_html($kb) . '</p>';
        }
        echo '<p><a class="button button-primary" href="' . esc_url($mailto) . '">📧 پاسخ با ایمیل</a></p>';
    }, 'contact_msg', 'side', 'high');
});

/* ─────────── Front-end styles ─────────── */
add_action('wp_head', function () {
    if (!is_page('contact')) return;
    ?>
<style id="pm-cf-styles">
.pm-cf-form {
    max-width: 640px; margin: 24px auto 0;
    background: #FFFFFF;
    border: 1px solid #E0DCC8;
    border-radius: 14px;
    padding: 24px 26px 26px;
    font-family: 'Vazirmatn', Tahoma, sans-serif;
}
.pm-cf-field { margin-bottom: 16px; }
.pm-cf-field label {
    display: block; font-weight: 700; font-size: 14px;
    color: #1F2421; margin-bottom: 6px;
}
.pm-cf-req { color: #C43838; margin-right: 3px; }
.pm-cf-form input[type="email"],
.pm-cf-form input[type="text"],
.pm-cf-form input[type="number"],
.pm-cf-form textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #D6D3C4;
    border-radius: 8px;
    font-family: inherit;
    font-size: 15px;
    background: #FAFAF5;
    box-sizing: border-box;
    transition: border-color 0.15s;
}
.pm-cf-form input[type="file"] { font-family: inherit; font-size: 13px; padding: 8px 0; }
.pm-cf-form input:focus,
.pm-cf-form textarea:focus { outline: none; border-color: #9CAB52; background: #FFFFFF; }
.pm-cf-form textarea { line-height: 1.7; resize: vertical; min-height: 120px; }
.pm-cf-hint { display: block; font-size: 12px; color: #5F5E5A; margin-top: 6px; }
.pm-cf-captcha-field input { max-width: 120px; text-align: center; font-weight: 700; }
.pm-cf-submit {
    background: #5B6E32;
    color: #FFFFFF;
    border: none;
    padding: 12px 28px;
    border-radius: 10px;
    font-family: inherit;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.15s, transform 0.15s;
}
.pm-cf-submit:hover { background: #4B5D26; transform: translateY(-1px); }
.pm-cf-success {
    background: #E3F5ED; border: 1px solid #1D9E75;
    border-right: 4px solid #1D9E75;
    border-radius: 10px; padding: 16px 20px;
    margin: 0 auto 22px; max-width: 640px;
    color: #1D5A45;
}
.pm-cf-success h3 { margin: 0 0 6px; font-size: 17px; border: none !important; padding: 0 !important; }
.pm-cf-error {
    background: #FCE5E5; border: 1px solid #C43838;
    border-right: 4px solid #C43838;
    border-radius: 10px; padding: 14px 18px;
    margin: 0 auto 16px; max-width: 640px;
    color: #7C1F1F; font-size: 14px;
}
/* Honeypot — keep it visible to scrapers but hidden from real users.
   Don't use display:none (some bots skip those); push it far off-screen instead. */
.pm-cf-hp {
    position: absolute !important;
    left: -10000px !important;
    top: auto !important;
    width: 1px !important;
    height: 1px !important;
    overflow: hidden !important;
}
</style>
    <?php
});
