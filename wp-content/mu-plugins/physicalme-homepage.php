<?php
/**
 * Plugin Name: PhysicalMe — Homepage Hero + Article Carousel
 * Description: Provides two shortcodes for Elementor: [pm_hero] (Lockhart-Einstein
 *              hero with dual-language wordmark) and [pm_articles_carousel] (auto-
 *              rotating mixed-book article carousel — 6 desktop / 1 mobile).
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

/* ─────────── 1. Load Caveat (Eng. script) + Lalezar (Persian display) for the
 *               wordmark + taglines; preload the hero image on the homepage so
 *               it becomes the LCP element as early as possible. ─────────── */
add_action('wp_head', function () {
    $hero_webp    = content_url('uploads/2026/06/lockhart-hero.webp');
    $hero_webp_sm = content_url('uploads/2026/06/lockhart-hero-sm.webp');
    ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;700&family=Aref+Ruqaa:wght@400;700&family=Mirza:wght@400;500;600&display=swap" rel="stylesheet">
    <?php if (is_front_page() || is_page('homepage-preview')): ?>
<link rel="preload" as="image"
      imagesrcset="<?php echo esc_url($hero_webp_sm); ?> 480w, <?php echo esc_url($hero_webp); ?> 800w"
      imagesizes="(max-width: 720px) 340px, 480px"
      href="<?php echo esc_url($hero_webp); ?>"
      type="image/webp" fetchpriority="high">
    <?php endif;
}, 5);

/* ─────────── 2. [pm_hero] — Einstein/Lockhart image + dual wordmark ─────────── */
add_shortcode('pm_hero', function ($atts) {
    $a = shortcode_atts([
        'image'      => content_url('uploads/2026/06/lockhart-hero.jpg'),
        'fa_title'   => 'منِ فیزیکی',
        'en_title'   => 'Physical me',
        'fa_tag'     => 'لذتِ یادگیری',
        'en_tag'     => 'Enjoy Learning',
        'cta1'       => 'از اول کتاب شروع کن →|/articles/scalars-and-vectors-tajrobi/',
        'cta2'       => 'همه‌ی کتاب‌ها|/chapter/dahom-ram/',
    ], $atts);

    [$cta1_label, $cta1_url] = array_pad(explode('|', $a['cta1'], 2), 2, '#');
    [$cta2_label, $cta2_url] = array_pad(explode('|', $a['cta2'], 2), 2, '#');

    ob_start();
    ?>
<div class="pm-hero">
    <div class="pm-hero-inner">
        <div class="pm-hero-wordmark">
            <h1 class="pm-hero-fa-title"><?php echo esc_html($a['fa_title']); ?></h1>
            <div class="pm-hero-en-title"><?php echo esc_html($a['en_title']); ?></div>
        </div>
        <div class="pm-hero-image-wrap">
            <picture>
                <source type="image/webp"
                        srcset="<?php echo esc_url(content_url('uploads/2026/06/lockhart-hero-sm.webp')); ?> 480w,
                                <?php echo esc_url(content_url('uploads/2026/06/lockhart-hero.webp')); ?> 800w"
                        sizes="(max-width: 720px) 340px, 480px">
                <img src="<?php echo esc_url($a['image']); ?>"
                     alt="<?php echo esc_attr($a['fa_title'] . ' — ' . $a['en_title']); ?>"
                     class="pm-hero-image"
                     width="960" height="1280"
                     loading="eager" fetchpriority="high" decoding="async" />
            </picture>
            <div class="pm-hero-glow"></div>
        </div>
        <div class="pm-hero-tagline-block">
            <div class="pm-hero-fa-tag"><?php echo esc_html($a['fa_tag']); ?></div>
            <div class="pm-hero-en-tag"><?php echo esc_html($a['en_tag']); ?></div>
        </div>
        <div class="pm-hero-ctas">
            <a class="pm-hero-cta pm-hero-cta-primary" href="<?php echo esc_url($cta1_url); ?>"><?php echo esc_html($cta1_label); ?></a>
            <a class="pm-hero-cta pm-hero-cta-secondary" href="<?php echo esc_url($cta2_url); ?>"><?php echo esc_html($cta2_label); ?></a>
        </div>
    </div>
</div>
<style>
/* Hero spans the full viewport even when placed inside a constrained column. */
.pm-hero {
    background: linear-gradient(180deg, #FBF6E3 0%, #F8F0CC 100%);
    padding: 32px 16px 44px;
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
    width: 100vw;
    overflow-x: hidden;
    border-block: 1px solid rgba(180, 140, 40, 0.18);
}
.pm-hero-inner {
    max-width: 880px;
    margin: 0 auto;
    text-align: center;
}
.pm-hero-wordmark {
    margin-bottom: 6px;
}
.pm-hero-fa-title {
    font-family: 'Aref Ruqaa', 'Mirza', 'Vazirmatn', Tahoma, sans-serif !important;
    font-size: 72px !important;
    font-weight: 400 !important;
    color: #1F2421 !important;
    line-height: 1.15 !important;
    margin: 0 0 4px !important;
    text-align: center !important;
    letter-spacing: 0;
    text-shadow: 2px 2px 0 rgba(255, 255, 255, 0.45);
}
.pm-hero-image-wrap {
    position: relative;
    display: inline-block;
    margin: 4px 0 4px;
    max-width: 480px;
    width: 100%;
}
.pm-hero-image {
    display: block;
    width: 100%;
    height: auto;
    max-height: 540px;
    object-fit: contain;
    position: relative;
    z-index: 2;
    filter: drop-shadow(0 12px 30px rgba(180, 140, 40, 0.35));
}
.pm-hero-glow {
    position: absolute;
    inset: 8% -4% -4% -4%;
    background: radial-gradient(ellipse at center, rgba(212, 168, 71, 0.35) 0%, transparent 65%);
    z-index: 1;
    pointer-events: none;
}
.pm-hero-en-title {
    font-family: 'Caveat', 'Pacifico', cursive !important;
    font-size: 56px;
    font-weight: 700;
    color: #5B6E32;
    line-height: 1;
    margin: 0 0 8px;
    transform: rotate(-2deg);
    display: inline-block;
}
.pm-hero-tagline-block {
    margin: 14px 0 20px;
}
.pm-hero-fa-tag {
    font-family: 'Aref Ruqaa', 'Mirza', 'Vazirmatn', Tahoma, sans-serif;
    font-size: 36px;
    font-weight: 400;
    color: #3D4548;
    line-height: 1.2;
    margin-bottom: 2px;
    letter-spacing: 0;
}
.pm-hero-en-tag {
    font-family: 'Caveat', cursive;
    font-size: 38px;
    font-weight: 700;
    color: #B5912E;
    line-height: 1;
    transform: rotate(-1.5deg);
    display: inline-block;
}
.pm-hero-ctas {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 6px;
}
.pm-hero .pm-hero-cta {
    display: inline-block !important;
    padding: 14px 28px !important;
    border-radius: 8px !important;
    font-family: 'Vazirmatn', Tahoma, sans-serif !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    transition: transform .15s, box-shadow .15s, background .15s, color .15s !important;
    line-height: 1.4 !important;
}
.pm-hero .pm-hero-cta-primary,
.pm-hero a.pm-hero-cta-primary,
.pm-hero a.pm-hero-cta-primary:link,
.pm-hero a.pm-hero-cta-primary:visited {
    background: #5B6E32 !important;
    color: #FFFFFF !important;
    box-shadow: 0 4px 12px rgba(91, 110, 50, 0.35) !important;
    border: 2px solid #5B6E32 !important;
}
.pm-hero a.pm-hero-cta-primary:hover {
    background: #4A5828 !important;
    color: #FFFFFF !important;
    transform: translateY(-1px) !important;
    box-shadow: 0 6px 16px rgba(91, 110, 50, 0.45) !important;
    border-color: #4A5828 !important;
}
.pm-hero .pm-hero-cta-secondary,
.pm-hero a.pm-hero-cta-secondary,
.pm-hero a.pm-hero-cta-secondary:link,
.pm-hero a.pm-hero-cta-secondary:visited {
    background: transparent !important;
    color: #3D4548 !important;
    border: 2px solid #3D4548 !important;
}
.pm-hero a.pm-hero-cta-secondary:hover {
    background: #3D4548 !important;
    color: #FFFFFF !important;
    transform: translateY(-1px) !important;
}
@media (max-width: 720px) {
    .pm-hero { padding: 20px 12px 28px; }
    .pm-hero-fa-title { font-size: 52px !important; }
    .pm-hero-en-title { font-size: 38px; margin: 0 0 4px; }
    .pm-hero-fa-tag { font-size: 26px; }
    .pm-hero-en-tag { font-size: 28px; }
    .pm-hero-tagline-block { margin: 10px 0 16px; }
    .pm-hero-image-wrap { max-width: 300px; }
    .pm-hero-cta { padding: 12px 22px; font-size: 14px; }
}
</style>
    <?php
    return ob_get_clean();
});

/* ─────────── 3. [pm_articles_carousel] — auto-rotating article carousel ─────────── */
add_shortcode('pm_articles_carousel', function ($atts) {
    $a = shortcode_atts([
        'count'      => 18,    // total articles in the carousel
        'desktop'    => 6,     // visible cards on desktop
        'mobile'     => 1,     // visible cards on mobile
        'interval'   => 4000,  // autoplay ms
        'title'      => 'مقالات از کتاب‌های مختلف',
        'subtitle'   => 'یه نگاهِ سریع به تنوعِ محتوا — دهم، یازدهم، دوازدهم، ریاضی و تجربی',
    ], $atts);

    // Random sample, cached 1h
    $cache_key = 'pm_carousel_' . $a['count'];
    $posts = get_transient($cache_key);
    if (!$posts) {
        $q = new WP_Query([
            'post_type'      => 'article',
            'post_status'    => 'publish',
            'posts_per_page' => (int)$a['count'],
            'orderby'        => 'rand',
            'meta_query'     => [
                ['key' => '_yoast_wpseo_meta-robots-noindex', 'value' => '0', 'compare' => '='],
                ['key' => '_yoast_wpseo_meta-robots-noindex', 'compare' => 'NOT EXISTS'],
                'relation' => 'OR',
            ],
        ]);
        $posts = [];
        foreach ($q->posts as $p) {
            $chapter = '';
            $terms = wp_get_post_terms($p->ID, 'chapter', ['fields' => 'all', 'orderby' => 'parent']);
            if ($terms && !is_wp_error($terms)) {
                $chapter = $terms[0]->name;
            }
            $thumb_id = get_post_thumbnail_id($p->ID);
            $thumb = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'medium') : '';
            if (!$thumb) {
                // fall back to the auto-generated SVG thumbnail used elsewhere
                $thumb = content_url('uploads/auto-thumbs/post-' . $p->ID . '.svg');
            }
            $posts[] = [
                'title'   => get_the_title($p),
                'url'     => get_permalink($p),
                'thumb'   => $thumb,
                'chapter' => $chapter,
            ];
        }
        set_transient($cache_key, $posts, HOUR_IN_SECONDS);
    }

    if (empty($posts)) return '';

    ob_start();
    ?>
<section class="pm-carousel-section">
    <div class="pm-carousel-header">
        <h2 class="pm-carousel-title"><?php echo esc_html($a['title']); ?></h2>
        <p class="pm-carousel-subtitle"><?php echo esc_html($a['subtitle']); ?></p>
    </div>
    <div class="pm-carousel"
         data-desktop="<?php echo (int)$a['desktop']; ?>"
         data-mobile="<?php echo (int)$a['mobile']; ?>"
         data-interval="<?php echo (int)$a['interval']; ?>">
        <button class="pm-carousel-arrow pm-carousel-prev" aria-label="قبلی">‹</button>
        <div class="pm-carousel-viewport">
            <div class="pm-carousel-track">
                <?php foreach ($posts as $post): ?>
                <a class="pm-carousel-card" href="<?php echo esc_url($post['url']); ?>">
                    <div class="pm-card-thumb">
                        <img src="<?php echo esc_url($post['thumb']); ?>" alt="" loading="lazy" />
                    </div>
                    <div class="pm-card-body">
                        <?php if ($post['chapter']): ?>
                        <div class="pm-card-chapter"><?php echo esc_html($post['chapter']); ?></div>
                        <?php endif; ?>
                        <h3 class="pm-card-title"><?php echo esc_html($post['title']); ?></h3>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <button class="pm-carousel-arrow pm-carousel-next" aria-label="بعدی">›</button>
        <div class="pm-carousel-dots"></div>
    </div>
</section>
<style>
.pm-carousel-section {
    background: #FFFFFF;
    padding: 48px 24px 40px;
    max-width: 1280px;
    margin: 0 auto;
}
.pm-carousel-header {
    text-align: center;
    margin-bottom: 28px;
}
.pm-carousel-title {
    font-family: 'Vazirmatn', Tahoma, sans-serif !important;
    font-size: 32px !important;
    font-weight: 800 !important;
    color: #1F2421 !important;
    margin: 0 0 8px !important;
    line-height: 1.4 !important;
}
.pm-carousel-subtitle {
    font-family: 'Vazirmatn', Tahoma, sans-serif;
    font-size: 15px;
    color: #5B6E32;
    margin: 0;
}
.pm-carousel {
    position: relative;
    display: flex;
    align-items: center;
    gap: 6px;
}
.pm-carousel-viewport {
    flex: 1;
    overflow: hidden;
    border-radius: 14px;
}
.pm-carousel-track {
    display: flex;
    gap: 14px;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
}
.pm-carousel-card {
    flex: 0 0 auto;
    width: calc((100% - 14px * 5) / 6); /* default desktop = 6 cards */
    background: #FBF6E3;
    border: 1px solid #E8E2CC;
    border-radius: 12px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    transition: transform .25s, box-shadow .25s;
    display: flex;
    flex-direction: column;
}
.pm-carousel-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 24px rgba(60, 50, 30, 0.18);
    border-color: #D4A847;
}
.pm-card-thumb {
    aspect-ratio: 16/10;
    background: #E8E2CC;
    overflow: hidden;
}
.pm-card-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.pm-card-body {
    padding: 12px 14px 14px;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.pm-card-chapter {
    font-family: 'Vazirmatn', Tahoma, sans-serif;
    font-size: 11px;
    font-weight: 700;
    color: #B5912E;
    letter-spacing: 0.5px;
    text-transform: none;
}
.pm-card-title {
    font-family: 'Vazirmatn', Tahoma, sans-serif !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    color: #1F2421 !important;
    line-height: 1.6 !important;
    margin: 0 !important;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.pm-carousel-arrow {
    background: rgba(91, 110, 50, 0.9);
    color: #FFFFFF;
    border: none;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    font-size: 22px;
    cursor: pointer;
    flex-shrink: 0;
    transition: background .15s;
    line-height: 1;
}
.pm-carousel-arrow:hover { background: #5B6E32; }
.pm-carousel-dots {
    position: absolute;
    bottom: -28px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 6px;
}
.pm-carousel-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #D4D0BD;
    border: none;
    cursor: pointer;
    transition: background .15s, transform .15s;
}
.pm-carousel-dot.is-active {
    background: #5B6E32;
    transform: scale(1.3);
}
@media (max-width: 720px) {
    .pm-carousel-section { padding: 32px 12px 36px; }
    .pm-carousel-title { font-size: 22px !important; }
    .pm-carousel-subtitle { font-size: 13px; }
    .pm-carousel-arrow { width: 32px; height: 32px; font-size: 18px; }
    .pm-carousel-card { width: 100%; }
    .pm-card-title { font-size: 15px !important; }
    .pm-card-thumb { aspect-ratio: 16/9; }
}
</style>
<script>
(function () {
    function init(el) {
        const track    = el.querySelector('.pm-carousel-track');
        const viewport = el.querySelector('.pm-carousel-viewport');
        const cards    = Array.from(track.children);
        const dots     = el.querySelector('.pm-carousel-dots');
        const prevBtn  = el.querySelector('.pm-carousel-prev');
        const nextBtn  = el.querySelector('.pm-carousel-next');
        const desktopN = parseInt(el.dataset.desktop, 10) || 6;
        const mobileN  = parseInt(el.dataset.mobile, 10)  || 1;
        const interval = parseInt(el.dataset.interval, 10) || 4000;

        let current = 0;
        let visible = window.innerWidth <= 720 ? mobileN : desktopN;
        let timer;

        function computeStep() {
            // total slides = ceil((cards - visible) / visible) + 1
            return Math.max(1, Math.ceil((cards.length - visible) / Math.max(1, visible)) + 1);
        }
        function updateCardWidths() {
            const gap = 14;
            const w = (viewport.clientWidth - gap * (visible - 1)) / visible;
            cards.forEach(c => c.style.width = w + 'px');
        }
        function buildDots() {
            dots.innerHTML = '';
            const steps = computeStep();
            for (let i = 0; i < steps; i++) {
                const b = document.createElement('button');
                b.className = 'pm-carousel-dot' + (i === current ? ' is-active' : '');
                b.setAttribute('aria-label', 'گام ' + (i + 1));
                b.addEventListener('click', () => goTo(i));
                dots.appendChild(b);
            }
        }
        function go() {
            const card = cards[0];
            const w = card.offsetWidth;
            const gap = 14;
            const shift = (w + gap) * visible * current;
            // RTL — slide cards from right to left visually = positive translateX in RTL doc
            track.style.transform = 'translateX(' + shift + 'px)';
            dots.querySelectorAll('.pm-carousel-dot').forEach((d, i) => {
                d.classList.toggle('is-active', i === current);
            });
        }
        function goTo(n) {
            const steps = computeStep();
            current = ((n % steps) + steps) % steps;
            go();
        }
        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }

        function startAuto() {
            stopAuto();
            timer = setInterval(next, interval);
        }
        function stopAuto() {
            if (timer) { clearInterval(timer); timer = null; }
        }

        function onResize() {
            const newVisible = window.innerWidth <= 720 ? mobileN : desktopN;
            if (newVisible !== visible) {
                visible = newVisible;
                current = 0;
                updateCardWidths();
                buildDots();
                go();
            } else {
                updateCardWidths();
                go();
            }
        }

        updateCardWidths();
        buildDots();
        go();
        startAuto();

        el.addEventListener('mouseenter', stopAuto);
        el.addEventListener('mouseleave', startAuto);
        prevBtn.addEventListener('click', () => { prev(); startAuto(); });
        nextBtn.addEventListener('click', () => { next(); startAuto(); });
        window.addEventListener('resize', onResize);

        // Touch swipe
        let touchX = 0;
        track.addEventListener('touchstart', (e) => { touchX = e.touches[0].clientX; stopAuto(); }, {passive: true});
        track.addEventListener('touchend', (e) => {
            const dx = e.changedTouches[0].clientX - touchX;
            if (Math.abs(dx) > 40) (dx < 0 ? next : prev)();
            startAuto();
        }, {passive: true});
    }

    function ready(fn) {
        if (document.readyState !== 'loading') fn();
        else document.addEventListener('DOMContentLoaded', fn);
    }
    ready(() => {
        document.querySelectorAll('.pm-carousel').forEach(init);
    });
})();
</script>
    <?php
    return ob_get_clean();
});

/* ─────────── 4. [pm_books_grid] — grid of all books (parent chapters) ─────────── */
add_shortcode('pm_books_grid', function ($atts) {
    $a = shortcode_atts([
        'title'    => 'کتاب‌های ما',
        'subtitle' => 'روی هر کتاب کلیک کن تا فصل‌هاش رو ببینی',
    ], $atts);

    // Books = curated parent-chapter terms in a fixed order.
    // Each row: [term_slug, label, emoji, color1, color2, accent].
    // Each book: [slug, label, emoji, c1, c2, accent, child-slug-prefix].
    // The child-slug-prefix matches the fasl terms that belong to this book
    // (taxonomy is flat — no parent relationships — so we count by slug).
    $books = [
        ['dahom-ram',          'دهم ریاضی و فیزیک',   '📐', '#2C5F8D', '#4A82B5', '#D4A847', 'fasl-'],
        ['yazdahom-ram',       'یازدهم ریاضی و فیزیک','⚡', '#6B4E8C', '#8B6FB0', '#F0CE6B', 'y11-fasl-'],
        ['davazdahom-ram',     'دوازدهم ریاضی و فیزیک','🌌','#8C3A3A', '#A75252', '#FFD27A', 'y12-fasl-'],
        ['dahom-tajrobi',      'دهم تجربی',           '🧪', '#4A7A47', '#6B9E68', '#FFE08A', 'y10t-fasl-'],
        ['yazdahom-tajrobi',   'یازدهم تجربی',        '🩺', '#3A7A78', '#589C9A', '#FFD89E', 'y11t-fasl-'],
        ['davazdahom-tajrobi', 'دوازدهم تجربی',       '☢️', '#C4622D', '#DC8052', '#FFE0B0', 'y12t-fasl-'],
    ];

    // Fetch term info (chapter count via slug match, lesson count via book term itself)
    $cache_key = 'pm_books_grid_v2';
    $data = get_transient($cache_key);
    if (!$data) {
        // pull all chapter terms once
        $all_terms = get_terms([
            'taxonomy'   => 'chapter',
            'hide_empty' => false,
            'fields'     => 'all',
        ]);
        $by_slug = [];
        if (is_array($all_terms)) {
            foreach ($all_terms as $t) $by_slug[$t->slug] = $t;
        }
        $data = [];
        foreach ($books as $b) {
            if (!isset($by_slug[$b[0]])) continue;
            $term = $by_slug[$b[0]];
            $prefix = $b[6];
            // count slugs starting with the prefix (= number of فصل)
            $chapter_count = 0;
            $lesson_count  = (int)$term->count;
            foreach ($by_slug as $slug => $t) {
                if ($slug === $b[0]) continue;
                // For 'fasl-' (dahom ریاضی) avoid matching 'y11-fasl-*' etc.
                if ($prefix === 'fasl-' && !preg_match('/^fasl-\d+$/', $slug)) continue;
                if ($prefix !== 'fasl-' && strpos($slug, $prefix) === 0) {
                    $chapter_count++;
                    $lesson_count += (int)$t->count;
                } elseif ($prefix === 'fasl-' && preg_match('/^fasl-\d+$/', $slug)) {
                    $chapter_count++;
                    $lesson_count += (int)$t->count;
                }
            }
            $data[] = [
                'slug'         => $b[0],
                'label'        => $b[1],
                'emoji'        => $b[2],
                'c1'           => $b[3],
                'c2'           => $b[4],
                'accent'       => $b[5],
                'url'          => get_term_link($term),
                'chapter_count'=> $chapter_count,
                'lesson_count' => $lesson_count,
            ];
        }
        set_transient($cache_key, $data, HOUR_IN_SECONDS);
    }

    if (empty($data)) return '';

    ob_start();
    ?>
<section class="pm-books-section">
    <div class="pm-books-header">
        <h2 class="pm-books-title"><?php echo esc_html($a['title']); ?></h2>
        <p class="pm-books-subtitle"><?php echo esc_html($a['subtitle']); ?></p>
    </div>
    <div class="pm-books-grid">
        <?php foreach ($data as $book): ?>
        <a class="pm-book-card"
           href="<?php echo esc_url($book['url']); ?>"
           style="--c1:<?php echo esc_attr($book['c1']); ?>;--c2:<?php echo esc_attr($book['c2']); ?>;--accent:<?php echo esc_attr($book['accent']); ?>;">
            <div class="pm-book-cover">
                <div class="pm-book-emoji"><?php echo esc_html($book['emoji']); ?></div>
                <div class="pm-book-spine"></div>
            </div>
            <div class="pm-book-info">
                <h3 class="pm-book-title"><?php echo esc_html($book['label']); ?></h3>
                <div class="pm-book-meta">
                    <span><?php echo (int)$book['chapter_count']; ?> فصل</span>
                    <span>•</span>
                    <span><?php echo (int)$book['lesson_count']; ?> درس</span>
                </div>
                <div class="pm-book-cta">شروع کن ←</div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</section>
<style>
.pm-books-section {
    padding: 56px 20px 60px;
    background: #FFFFFF;
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
    width: 100vw;
    overflow-x: hidden;
}
.pm-books-header {
    text-align: center;
    margin-bottom: 36px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}
.pm-books-title {
    font-family: 'Aref Ruqaa', 'Mirza', 'Vazirmatn', Tahoma, sans-serif !important;
    font-size: 48px !important;
    font-weight: 400 !important;
    color: #1F2421 !important;
    margin: 0 0 8px !important;
    line-height: 1.2 !important;
}
.pm-books-subtitle {
    font-family: 'Vazirmatn', Tahoma, sans-serif;
    font-size: 15px;
    color: #5B6E32;
    margin: 0;
}
.pm-books-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 14px;
    max-width: 1280px;
    margin: 0 auto;
}
.pm-book-card {
    position: relative;
    display: flex;
    flex-direction: column;
    background: linear-gradient(160deg, var(--c1) 0%, var(--c2) 100%);
    color: #FFFFFF;
    text-decoration: none;
    border-radius: 12px;
    overflow: hidden;
    aspect-ratio: 2 / 3.2;
    box-shadow: 0 6px 16px rgba(0,0,0,0.12);
    transition: transform .25s ease, box-shadow .25s ease;
}
.pm-book-card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 18px 32px rgba(0,0,0,0.22);
    color: #FFFFFF;
}
.pm-book-cover {
    position: relative;
    flex: 0 0 auto;
    padding: 22px 14px 10px;
    text-align: center;
}
.pm-book-cover::before {
    content: "";
    position: absolute;
    top: -40px; left: -40px;
    width: 120px; height: 120px;
    background: var(--accent);
    opacity: 0.18;
    border-radius: 50%;
}
.pm-book-cover::after {
    content: "";
    position: absolute;
    bottom: -30px; right: -30px;
    width: 100px; height: 100px;
    background: var(--accent);
    opacity: 0.12;
    border-radius: 50%;
}
.pm-book-emoji {
    position: relative;
    font-size: 42px;
    line-height: 1;
    margin-bottom: 2px;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.18));
    z-index: 1;
}
.pm-book-spine {
    position: absolute;
    top: 0;
    right: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, rgba(255,255,255,0.18) 0%, transparent 100%);
}
.pm-book-info {
    flex: 1;
    padding: 4px 12px 16px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 6px;
}
.pm-book-title {
    font-family: 'Vazirmatn', Tahoma, sans-serif !important;
    font-size: 15px !important;
    font-weight: 800 !important;
    color: #FFFFFF !important;
    margin: 0 !important;
    line-height: 1.4 !important;
    padding: 0 2px;
}
.pm-book-meta {
    display: flex;
    gap: 4px;
    font-family: 'Vazirmatn', Tahoma, sans-serif;
    font-size: 11px;
    font-weight: 600;
    color: rgba(255,255,255,0.92);
    background: rgba(0,0,0,0.20);
    padding: 3px 9px;
    border-radius: 100px;
    margin-top: 2px;
    white-space: nowrap;
}
.pm-book-cta {
    margin-top: auto;
    padding-top: 6px;
    font-family: 'Vazirmatn', Tahoma, sans-serif;
    font-size: 12px;
    font-weight: 700;
    color: var(--accent);
    transition: transform .15s;
}
.pm-book-card:hover .pm-book-cta { transform: translateX(-4px); }

/* Responsive — collapse from 6 → 3 → 2 → 1 columns */
@media (max-width: 1180px) {
    .pm-books-grid { grid-template-columns: repeat(3, 1fr); gap: 16px; }
}
@media (max-width: 760px) {
    .pm-books-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .pm-book-emoji { font-size: 46px; }
    .pm-book-title { font-size: 16px !important; }
}
@media (max-width: 460px) {
    .pm-books-section { padding: 32px 14px 40px; }
    .pm-books-title { font-size: 32px !important; }
    .pm-books-grid { grid-template-columns: 1fr; gap: 12px; }
    .pm-book-card { aspect-ratio: 5 / 2; }
    .pm-book-cover { padding: 18px 14px 10px; }
    .pm-book-info { padding: 4px 14px 16px; }
}
</style>
    <?php
    return ob_get_clean();
});

/* ─────────── 5. Auto-setup homepage with shortcodes on activation ─────────── */
add_action('wp_loaded', function () {
    if (get_transient('physicalme_homepage_initialized')) return;

    $homepage = get_post(9);
    if ($homepage && !strpos($homepage->post_content, '[pm_hero]')) {
        $shortcodes = '[pm_hero fa_title="منِ فیزیکی" en_title="Physical me" fa_tag="لذتِ یادگیری" en_tag="Enjoy Learning"]

[pm_articles_carousel count="18" desktop="6" mobile="1"]

[pm_books_grid]';

        global $wpdb;
        $wpdb->update(
            $wpdb->posts,
            ['post_content' => $shortcodes],
            ['ID' => 9]
        );

        clean_post_cache(9);
    }
    set_transient('physicalme_homepage_initialized', 1, DAY_IN_SECONDS);
}, 99);

/* ─────────── 6. Cache invalidation hooks ─────────── */
add_action('save_post_article', function () {
    for ($i = 6; $i <= 30; $i++) delete_transient('pm_carousel_' . $i);
    delete_transient('pm_books_grid_v2');
    delete_transient('physicalme_homepage_initialized');
});
add_action('edited_chapter', function () {
    delete_transient('pm_books_grid_v2');
    delete_transient('physicalme_homepage_initialized');
});
add_action('created_chapter', function () {
    delete_transient('pm_books_grid_v2');
    delete_transient('physicalme_homepage_initialized');
});
