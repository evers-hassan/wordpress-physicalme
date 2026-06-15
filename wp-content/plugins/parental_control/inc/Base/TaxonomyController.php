<?php

namespace HBVSoft\Pcpc\Inc\Base;

use HBVSoft\Pcpc\Inc\I18n;

class TaxonomyController extends BaseController {

    public function register() {
        add_action('init', [$this, 'register_taxonomies']);
        add_action('admin_menu', [$this, 'add_taxonomy_admin_page']);
        add_action('admin_init', [$this, 'register_taxonomy_settings']);
    }

    public function register_taxonomies() {
        // Age Groups Taxonomy
        register_taxonomy('pcpc_age_group', 'post', [
            'labels' => [
                'name' => I18n::text('Age Groups'),
                'singular_name' => I18n::text('Age Group'),
            ],
            'public' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => false,
            'rewrite' => ['slug' => 'age-group'],
            'description' => I18n::text('Age group classification for content'),
        ]);

        // Genres Taxonomy
        register_taxonomy('pcpc_genre', 'post', [
            'labels' => [
                'name' => I18n::text('Genres'),
                'singular_name' => I18n::text('Genre'),
            ],
            'public' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => false,
            'rewrite' => ['slug' => 'genre'],
            'description' => I18n::text('Content genre classification'),
        ]);

        // Content Warnings Taxonomy
        register_taxonomy('pcpc_content_warning', 'post', [
            'labels' => [
                'name' => I18n::text('Content Warnings'),
                'singular_name' => I18n::text('Content Warning'),
            ],
            'public' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical' => false,
            'rewrite' => ['slug' => 'content-warning'],
            'description' => I18n::text('Content warning tags'),
        ]);
    }

    public function add_taxonomy_admin_page() {
        add_submenu_page(
            'options-general.php',
            I18n::text('Parental Control Tag Categories'),
            I18n::text('PCPC Tags'),
            'manage_options',
            'pcpc_tag_categories',
            [$this, 'render_tag_categories_page']
        );
    }

    public function register_taxonomy_settings() {
        // Age Groups default settings
        $this->register_default_terms('pcpc_age_group', [
            'age-3plus' => ['name' => '3+', 'description' => I18n::text('Suitable for ages 3 and up')],
            'age-5plus' => ['name' => '5+', 'description' => I18n::text('Suitable for ages 5 and up')],
            'age-13plus' => ['name' => '13+', 'description' => I18n::text('Suitable for ages 13 and up')],
            'age-18plus' => ['name' => '18+', 'description' => I18n::text('Suitable for ages 18 and up')],
        ]);

        // Genres default settings
        $this->register_default_terms('pcpc_genre', [
            'sci-fi' => ['name' => I18n::text('Science Fiction'), 'description' => I18n::text('Science fiction content')],
            'educational' => ['name' => I18n::text('Educational'), 'description' => I18n::text('Educational content')],
            'horror' => ['name' => I18n::text('Horror'), 'description' => I18n::text('Horror content')],
            'comedy' => ['name' => I18n::text('Comedy'), 'description' => I18n::text('Comedy content')],
            'drama' => ['name' => I18n::text('Drama'), 'description' => I18n::text('Drama content')],
            'adventure' => ['name' => I18n::text('Adventure'), 'description' => I18n::text('Adventure content')],
            'documentary' => ['name' => I18n::text('Documentary'), 'description' => I18n::text('Documentary content')],
            'animation' => ['name' => I18n::text('Animation'), 'description' => I18n::text('Animated content')],
        ]);

        // Content Warnings default settings
        $this->register_default_terms('pcpc_content_warning', [
            'violence' => ['name' => I18n::text('Violence'), 'description' => I18n::text('Contains violent content')],
            'language' => ['name' => I18n::text('Language'), 'description' => I18n::text('Contains strong language')],
            'sexual' => ['name' => I18n::text('Sexual Content'), 'description' => I18n::text('Contains sexual content')],
            'drugs' => ['name' => I18n::text('Drug Use'), 'description' => I18n::text('Contains drug-related content')],
            'scary' => ['name' => I18n::text('Scary/Intense'), 'description' => I18n::text('Scary or intense scenes')],
        ]);
    }

    private function register_default_terms($taxonomy, $terms) {
        foreach ($terms as $slug => $term_data) {
            $existing = get_term_by('slug', $slug, $taxonomy);
            if (!$existing) {
                wp_insert_term(
                    $term_data['name'],
                    $taxonomy,
                    [
                        'slug' => $slug,
                        'description' => $term_data['description'] ?? '',
                    ]
                );
            }
        }
    }

    public function render_tag_categories_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have permission to access this page', 'parental-customer-plugin'));
        }
        ?>
        <div class="wrap">
            <h1><?php _e('Parental Control Tag Categories', 'parental-customer-plugin'); ?></h1>

            <div style="margin: 20px 0;">
                <p><?php _e('Manage content categorization tags for age groups, genres, and content warnings.', 'parental-customer-plugin'); ?></p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 20px;">
                <div style="border: 1px solid #ddd; padding: 20px; border-radius: 5px;">
                    <h2><?php _e('Age Groups', 'parental-customer-plugin'); ?></h2>
                    <p style="color: #666; font-size: 13px;"><?php _e('Define age-appropriate classifications', 'parental-customer-plugin'); ?></p>
                    <p><a href="<?php echo admin_url('edit-tags.php?taxonomy=pcpc_age_group'); ?>" class="button button-primary">
                        <?php _e('Manage Age Groups', 'parental-customer-plugin'); ?>
                    </a></p>
                </div>

                <div style="border: 1px solid #ddd; padding: 20px; border-radius: 5px;">
                    <h2><?php _e('Genres', 'parental-customer-plugin'); ?></h2>
                    <p style="color: #666; font-size: 13px;"><?php _e('Define content genres (sci-fi, educational, etc.)', 'parental-customer-plugin'); ?></p>
                    <p><a href="<?php echo admin_url('edit-tags.php?taxonomy=pcpc_genre'); ?>" class="button button-primary">
                        <?php _e('Manage Genres', 'parental-customer-plugin'); ?>
                    </a></p>
                </div>

                <div style="border: 1px solid #ddd; padding: 20px; border-radius: 5px;">
                    <h2><?php _e('Content Warnings', 'parental-customer-plugin'); ?></h2>
                    <p style="color: #666; font-size: 13px;"><?php _e('Define content warning tags', 'parental-customer-plugin'); ?></p>
                    <p><a href="<?php echo admin_url('edit-tags.php?taxonomy=pcpc_content_warning'); ?>" class="button button-primary">
                        <?php _e('Manage Warnings', 'parental-customer-plugin'); ?>
                    </a></p>
                </div>
            </div>

            <hr style="margin-top: 30px;" />

            <h2><?php _e('Default Tags', 'parental-customer-plugin'); ?></h2>
            <p><?php _e('The following default tags have been created:', 'parental-customer-plugin'); ?></p>

            <h3><?php _e('Age Groups', 'parental-customer-plugin'); ?></h3>
            <ul style="margin-left: 20px;">
                <li>3+ - <?php _e('Suitable for ages 3 and up', 'parental-customer-plugin'); ?></li>
                <li>5+ - <?php _e('Suitable for ages 5 and up', 'parental-customer-plugin'); ?></li>
                <li>13+ - <?php _e('Suitable for ages 13 and up', 'parental-customer-plugin'); ?></li>
                <li>18+ - <?php _e('Suitable for ages 18 and up', 'parental-customer-plugin'); ?></li>
            </ul>

            <h3><?php _e('Genres', 'parental-customer-plugin'); ?></h3>
            <ul style="margin-left: 20px;">
                <li><?php _e('Science Fiction, Educational, Horror, Comedy, Drama, Adventure, Documentary, Animation', 'parental-customer-plugin'); ?></li>
            </ul>

            <h3><?php _e('Content Warnings', 'parental-customer-plugin'); ?></h3>
            <ul style="margin-left: 20px;">
                <li><?php _e('Violence, Language, Sexual Content, Drug Use, Scary/Intense', 'parental-customer-plugin'); ?></li>
            </ul>
        </div>
        <?php
    }
}
