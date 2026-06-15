<?php
/**
 * Plugin Name: PhysicalMe — IndexNow ping
 * Description: Pings IndexNow whenever an article/page is published or updated.
 *              Bing/Yandex/Seznam pick up the URL within minutes instead of weeks.
 *              Google does NOT participate in IndexNow — Search Console still
 *              owns Google indexing. This is purely supplementary.
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

const PM_INDEXNOW_KEY = '101004da6e3cb1ad39cd3783a7139c7e';

function pm_indexnow_submit_urls(array $urls): void {
    if (empty($urls)) return;
    // De-dupe & cap (IndexNow allows up to 10 000 per call; we'll only ever
    // ship a small batch here).
    $urls = array_values(array_unique($urls));
    $host = parse_url(home_url(), PHP_URL_HOST);
    $payload = [
        'host'        => $host,
        'key'         => PM_INDEXNOW_KEY,
        'keyLocation' => home_url('/' . PM_INDEXNOW_KEY . '.txt'),
        'urlList'     => $urls,
    ];
    $args = [
        'method'  => 'POST',
        'headers' => ['Content-Type' => 'application/json; charset=utf-8'],
        'body'    => wp_json_encode($payload),
        'timeout' => 8,
        'blocking'=> false,    // fire-and-forget so the editor save isn't slowed
    ];
    // Ping the two endpoints that propagate to the rest of the consortium.
    wp_remote_post('https://api.indexnow.org/IndexNow', $args);
    wp_remote_post('https://www.bing.com/indexnow', $args);
}

add_action('transition_post_status', function ($new, $old, $post) {
    if (!in_array($post->post_type, ['article','video','post','page'], true)) return;
    if ($new !== 'publish' && $old !== 'publish') return;
    $url = get_permalink($post->ID);
    if (!$url) return;
    pm_indexnow_submit_urls([$url]);
}, 10, 3);

// Fallback: when a post is updated without status change (e.g. content edit).
add_action('post_updated', function ($post_id, $post_after, $post_before) {
    if ($post_after->post_status !== 'publish') return;
    if (!in_array($post_after->post_type, ['article','video','post','page'], true)) return;
    // Skip noise: revisions, autosaves
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) return;
    // Skip if WP just toggled status — that path is handled above
    if ($post_after->post_status !== $post_before->post_status) return;
    pm_indexnow_submit_urls([get_permalink($post_id)]);
}, 10, 3);

/**
 * Admin tool: WP-CLI command + admin-init action to batch-submit ALL existing
 * articles once. Run via:
 *
 *     wp eval 'pm_indexnow_submit_all();'
 *
 * Or open the admin URL: /wp-admin/?pm_indexnow_submit_all=1 (logged in as admin).
 */
function pm_indexnow_submit_all(): int {
    $q = new WP_Query([
        'post_type'      => ['article', 'page'],
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ]);
    $urls = array_map('get_permalink', $q->posts);
    $urls = array_filter($urls);
    pm_indexnow_submit_urls($urls);
    return count($urls);
}

add_action('admin_init', function () {
    if (!current_user_can('manage_options')) return;
    if (empty($_GET['pm_indexnow_submit_all'])) return;
    $n = pm_indexnow_submit_all();
    wp_die("IndexNow: queued {$n} URLs.", 'IndexNow', ['response' => 200]);
});
