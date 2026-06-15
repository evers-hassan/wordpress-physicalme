<?php
/**
 * Plugin Name: PhysicalMe — Block Google Fonts (Iran filter)
 * Description: حذف لینک‌های fonts.googleapis.com که در ایران بلاکن و باعث می‌شن Vazirmatn self-hosted بعد از timeout swap بشه
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

add_action('wp_print_styles', function () {
    global $wp_styles;
    if (!isset($wp_styles->registered)) return;
    foreach ($wp_styles->registered as $handle => $obj) {
        if (empty($obj->src)) continue;
        if (strpos($obj->src, 'fonts.googleapis.com') !== false ||
            strpos($obj->src, 'fonts.gstatic.com') !== false) {
            wp_dequeue_style($handle);
            wp_deregister_style($handle);
        }
    }
}, 100);

// Also strip any <link> tag pointing at fonts.googleapis.com that the theme/plugin
// emits directly via wp_head (bypassing the enqueue system).
add_action('wp_head', function () {
    ob_start(function ($html) {
        return preg_replace(
            '#<link[^>]+(fonts\.googleapis\.com|fonts\.gstatic\.com)[^>]*>#i',
            '',
            $html
        );
    });
}, 0);
add_action('wp_print_footer_scripts', function () {
    if (ob_get_level() > 0) @ob_end_flush();
}, 999);
