<?php
/**
 * Plugin Name: PhysicalMe — Related Articles
 * Description: Inject a "مقالات مرتبط" block at the end of every single article.
 *              Picks 4 siblings from the same chapter (excluding the current post).
 *              Massively improves internal-link density and helps Google crawl
 *              orphan articles.
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

function pm_related_articles_block($post_id) {
    // Find the chapter the post belongs to
    $chapters = wp_get_object_terms($post_id, 'chapter');
    if (empty($chapters) || is_wp_error($chapters)) return '';

    // Cache the rendered HTML per post for 6 hours
    $cache_key = 'pm_related_' . $post_id;
    $cached = get_transient($cache_key);
    if ($cached !== false) return $cached;

    // First chapter wins; fall back through them if it's empty
    $siblings = [];
    foreach ($chapters as $ch) {
        $q = new WP_Query([
            'post_type'      => 'article',
            'post_status'    => 'publish',
            'posts_per_page' => 5,                 // 4 we want + 1 in case current shows up
            'post__not_in'   => [$post_id],
            'orderby'        => 'rand',            // a touch of variety so crawlers see different combos
            'tax_query'      => [[
                'taxonomy' => 'chapter',
                'field'    => 'term_id',
                'terms'    => $ch->term_id,
            ]],
        ]);
        if ($q->have_posts()) {
            foreach ($q->posts as $p) {
                if (count($siblings) >= 4) break 2;
                $siblings[$p->ID] = $p;
            }
        }
    }

    if (empty($siblings)) {
        set_transient($cache_key, '', HOUR_IN_SECONDS);
        return '';
    }

    $items = '';
    foreach ($siblings as $p) {
        $url   = get_permalink($p->ID);
        $title = esc_html(get_the_title($p->ID));
        $thumb_id  = get_post_thumbnail_id($p->ID);
        $thumb_url = $thumb_id ? esc_url(wp_get_attachment_image_url($thumb_id, 'medium')) : '';
        $excerpt = wp_strip_all_tags(get_the_excerpt($p->ID));
        if (mb_strlen($excerpt) > 110) $excerpt = mb_substr($excerpt, 0, 110) . '…';

        $thumb_html = $thumb_url
            ? '<img src="'.$thumb_url.'" alt="'.$title.'" loading="lazy" />'
            : '<span class="pm-related-noimg">📄</span>';

        $items .= '<li><a href="'.esc_url($url).'">'
                . '<span class="pm-related-thumb">'.$thumb_html.'</span>'
                . '<span class="pm-related-body">'
                . '<span class="pm-related-title">'.$title.'</span>'
                . ($excerpt ? '<span class="pm-related-excerpt">'.esc_html($excerpt).'</span>' : '')
                . '</span>'
                . '</a></li>';
    }

    $html = '<aside class="pm-related" aria-label="مقالات مرتبط">'
          . '<h2 class="pm-related-heading">📚 مقالات مرتبط</h2>'
          . '<ul class="pm-related-list">' . $items . '</ul>'
          . '</aside>';

    set_transient($cache_key, $html, 6 * HOUR_IN_SECONDS);
    return $html;
}

add_filter('the_content', function ($content) {
    if (!is_singular('article') || !in_the_loop() || !is_main_query()) return $content;
    return $content . pm_related_articles_block(get_the_ID());
});

// Bust the per-post cache when an article is published / edited / deleted.
add_action('save_post_article', function ($post_id) {
    // Bust this post + every sibling in the same chapter (their list might
    // include or exclude this post depending on its new state).
    $chapters = wp_get_object_terms($post_id, 'chapter');
    if (!is_wp_error($chapters)) {
        foreach ($chapters as $ch) {
            $q = new WP_Query([
                'post_type'      => 'article',
                'post_status'    => 'any',
                'posts_per_page' => -1,
                'fields'         => 'ids',
                'tax_query'      => [[
                    'taxonomy' => 'chapter',
                    'field'    => 'term_id',
                    'terms'    => $ch->term_id,
                ]],
            ]);
            foreach ($q->posts as $sib_id) {
                delete_transient('pm_related_' . $sib_id);
            }
        }
    }
    delete_transient('pm_related_' . $post_id);
});

add_action('wp_head', function () {
    if (!is_singular('article')) return;
    ?>
<style id="pm-related-styles">
.pm-related {
    margin: 3em 0 1em;
    padding: 20px 22px 22px;
    background: linear-gradient(180deg, #F8F6F0 0%, #FAF8F0 100%);
    border: 1px solid #E0DCC8;
    border-radius: 14px;
}
.pm-related-heading {
    font-size: 20px !important;
    font-weight: 800 !important;
    color: #1F2421;
    margin: 0 0 14px !important;
    border: none !important;
    padding: 0 !important;
}
.pm-related-list {
    list-style: none !important;
    margin: 0 !important;
    padding: 0 !important;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}
@media (max-width: 600px) {
    .pm-related-list { grid-template-columns: 1fr; }
}
.pm-related-list > li { margin: 0 !important; padding: 0 !important; }
.pm-related-list a {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #FFFFFF;
    border: 1px solid #E0DCC8;
    border-radius: 10px;
    padding: 10px 12px;
    text-decoration: none !important;
    color: #1F2421;
    transition: border-color 0.15s, transform 0.15s;
    height: 100%;
}
.pm-related-list a:hover {
    border-color: #9CAB52;
    transform: translateY(-1px);
}
.pm-related-thumb {
    flex-shrink: 0;
    width: 56px;
    height: 56px;
    background: #F1ECDB;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.pm-related-thumb img {
    width: 100%; height: 100%; object-fit: cover;
}
.pm-related-noimg { font-size: 22px; }
.pm-related-body { min-width: 0; flex: 1; }
.pm-related-title {
    display: block;
    font-weight: 700;
    font-size: 14px;
    line-height: 1.45;
    color: #1F2421;
}
.pm-related-excerpt {
    display: block;
    font-size: 12px;
    color: #5F5E5A;
    margin-top: 4px;
    line-height: 1.55;
}
</style>
    <?php
}, 100);
