<?php

namespace HBVSoft\Pcpc\Inc\Base;

use HBVSoft\Pcpc\Inc\Base\BaseController;
use HBVSoft\Pcpc\Inc\I18n;

class SettingsController extends BaseController {

    public function register() {
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function add_admin_menu() {
        add_options_page(
            I18n::text( 'Parental Control Settings' ),
            I18n::text( 'Parental Control' ),
            'manage_options',
            'pcpc_settings',
            [$this, 'render_settings_page']
        );
    }

    public function register_settings() {
        register_setting('pcpc_settings_group', 'pcpc_max_children', [
            'sanitize_callback' => 'intval',
            'default' => 3,
        ]);

        register_setting('pcpc_settings_group', 'pcpc_parent_login_redirect', [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '/pcpc_parent_profile/',
        ]);

        register_setting('pcpc_settings_group', 'pcpc_child_login_redirect', [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '/',
        ]);

        register_setting('pcpc_settings_group', 'pcpc_child_profile_url', [
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
        ]);

        register_setting('pcpc_settings_group', 'pcpc_child_change_password_url', [
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
        ]);

        register_setting('pcpc_settings_group', 'pcpc_child_register_url', [
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
        ]);

        add_settings_section(
            'pcpc_main_section',
            I18n::text( 'General Settings' ),
            [$this, 'render_section_callback'],
            'pcpc_settings'
        );

        add_settings_field(
            'pcpc_max_children',
            I18n::text( 'Maximum Children per Parent' ),
            [$this, 'render_max_children_field'],
            'pcpc_settings',
            'pcpc_main_section'
        );

        add_settings_field(
            'pcpc_parent_login_redirect',
            I18n::text( 'Parent Login Redirect URL' ),
            [$this, 'render_parent_redirect_field'],
            'pcpc_settings',
            'pcpc_main_section'
        );

        add_settings_field(
            'pcpc_child_login_redirect',
            I18n::text( 'Child Login Redirect URL' ),
            [$this, 'render_child_redirect_field'],
            'pcpc_settings',
            'pcpc_main_section'
        );

        add_settings_section(
            'pcpc_pages_section',
            I18n::text( 'Plugin Pages' ),
            [$this, 'render_pages_section_callback'],
            'pcpc_settings'
        );

        add_settings_field(
            'pcpc_child_register_url',
            I18n::text( 'Child Registration Page' ),
            [$this, 'render_child_register_field'],
            'pcpc_settings',
            'pcpc_pages_section'
        );

        add_settings_field(
            'pcpc_child_profile_url',
            I18n::text( 'Child Profile Page' ),
            [$this, 'render_child_profile_field'],
            'pcpc_settings',
            'pcpc_pages_section'
        );

        add_settings_field(
            'pcpc_child_change_password_url',
            I18n::text( 'Child Change Password Page' ),
            [$this, 'render_child_change_password_field'],
            'pcpc_settings',
            'pcpc_pages_section'
        );
    }

    public function render_pages_section_callback() {
        _e( 'URLs to plugin pages (auto-detected from plugin pages)', 'parental-customer-plugin' );
    }

    public function render_section_callback() {
        _e( 'Configure plugin behavior and limits', 'parental-customer-plugin' );
    }

    public function render_max_children_field() {
        $value = intval(get_option('pcpc_max_children', 3));
        ?>
        <input type="number" name="pcpc_max_children" value="<?php echo esc_attr($value); ?>" min="1" max="20" />
        <p class="description"><?php _e( 'Maximum number of children each parent account can create', 'parental-customer-plugin' ); ?></p>
        <?php
    }

    public function render_parent_redirect_field() {
        $value = get_option('pcpc_parent_login_redirect', '/pcpc_parent_profile/');
        $pages = $this->get_plugin_pages();
        ?>
        <input type="text" name="pcpc_parent_login_redirect" value="<?php echo esc_attr($value); ?>" class="regular-text" />
        <p class="description"><?php _e( 'URL where parents are redirected after login', 'parental-customer-plugin' ); ?></p>
        <?php if (!empty($pages)) : ?>
            <p style="margin-top: 10px;">
<strong><?php _e( 'Quick links:', 'parental-customer-plugin' ); ?></strong>
                <?php foreach ($pages as $slug => $title) : ?>
                    <a href="javascript:void(0)" onclick="document.querySelector('input[name=\"pcpc_parent_login_redirect\"]').value='<?php echo esc_url($slug); ?>';" style="margin-right: 10px; text-decoration: none; color: #0073aa;">
                        → <?php echo esc_html($title); ?>
                    </a>
                <?php endforeach; ?>
            </p>
        <?php endif; ?>
        <?php
    }

    public function render_child_redirect_field() {
        $value = get_option('pcpc_child_login_redirect', '/');
        $pages = $this->get_plugin_pages();
        ?>
        <input type="text" name="pcpc_child_login_redirect" value="<?php echo esc_attr($value); ?>" class="regular-text" />
        <p class="description"><?php _e( 'URL where children are redirected after login', 'parental-customer-plugin' ); ?></p>
        <?php if (!empty($pages)) : ?>
            <p style="margin-top: 10px;">
<strong><?php _e( 'Quick links:', 'parental-customer-plugin' ); ?></strong>
                <?php foreach ($pages as $slug => $title) : ?>
                    <a href="javascript:void(0)" onclick="document.querySelector('input[name=\"pcpc_child_login_redirect\"]').value='<?php echo esc_url($slug); ?>';" style="margin-right: 10px; text-decoration: none; color: #0073aa;">
                        → <?php echo esc_html($title); ?>
                    </a>
                <?php endforeach; ?>
            </p>
        <?php endif; ?>
        <?php
    }

    public function render_child_register_field() {
        $value = get_option('pcpc_child_register_url', '');
        $pages = $this->get_plugin_pages();
        $child_register_page = $this->get_plugin_page_by_slug('pcpc_register_child');
        ?>
        <input type="text" name="pcpc_child_register_url" value="<?php echo esc_attr($value); ?>" class="regular-text" />
        <p class="description"><?php _e( 'URL to the child registration page', 'parental-customer-plugin' ); ?></p>
        <?php if ($child_register_page) : ?>
            <p style="margin-top: 10px;">
                <a href="javascript:void(0)" onclick="document.querySelector('input[name=\"pcpc_child_register_url\"]').value='<?php echo esc_url($child_register_page); ?>';" style="text-decoration: none; color: #0073aa;">
<?php _e( '✓ Auto-fill from plugin page', 'parental-customer-plugin' ); ?>
                </a>
            </p>
        <?php endif; ?>
        <?php
    }

    public function render_child_profile_field() {
        $value = get_option('pcpc_child_profile_url', '');
        $child_profile_page = $this->get_plugin_page_by_slug('pcpc_child_profile');
        ?>
        <input type="text" name="pcpc_child_profile_url" value="<?php echo esc_attr($value); ?>" class="regular-text" />
        <p class="description"><?php _e( 'URL to the child profile page', 'parental-customer-plugin' ); ?></p>
        <?php if ($child_profile_page) : ?>
            <p style="margin-top: 10px;">
                <a href="javascript:void(0)" onclick="document.querySelector('input[name=\"pcpc_child_profile_url\"]').value='<?php echo esc_url($child_profile_page); ?>';" style="text-decoration: none; color: #0073aa;">
<?php _e( '✓ Auto-fill from plugin page', 'parental-customer-plugin' ); ?>
                </a>
            </p>
        <?php endif; ?>
        <?php
    }

    public function render_child_change_password_field() {
        $value = get_option('pcpc_child_change_password_url', '');
        $child_change_pass_page = $this->get_plugin_page_by_slug('pcpc_child_change_password');
        ?>
        <input type="text" name="pcpc_child_change_password_url" value="<?php echo esc_attr($value); ?>" class="regular-text" />
        <p class="description"><?php _e( 'URL to the child change password page', 'parental-customer-plugin' ); ?></p>
        <?php if ($child_change_pass_page) : ?>
            <p style="margin-top: 10px;">
                <a href="javascript:void(0)" onclick="document.querySelector('input[name=\"pcpc_child_change_password_url\"]').value='<?php echo esc_url($child_change_pass_page); ?>';" style="text-decoration: none; color: #0073aa;">
<?php _e( '✓ Auto-fill from plugin page', 'parental-customer-plugin' ); ?>
                </a>
            </p>
        <?php endif; ?>
        <?php
    }

    public function render_settings_page() {
        if (!current_user_can('manage_options')) {
            wp_die( __( 'You do not have permission to access this page', 'parental-customer-plugin' ) );
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="POST">
                <?php
                settings_fields('pcpc_settings_group');
                do_settings_sections('pcpc_settings');
                submit_button();
                ?>
            </form>

            <hr style="margin-top: 40px;" />

            <h2><?php _e( 'Plugin Pages', 'parental-customer-plugin' ); ?></h2>
            <p><?php _e( 'The following pages have been automatically created for the plugin:', 'parental-customer-plugin' ); ?></p>
            <table class="widefat">
                <thead>
                    <tr>
                        <th><?php _e( 'Page Name', 'parental-customer-plugin' ); ?></th>
                        <th><?php _e( 'Shortcode', 'parental-customer-plugin' ); ?></th>
                        <th><?php _e( 'Link', 'parental-customer-plugin' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $this->render_pages_info(); ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    private function get_plugin_pages() {
        $pages = get_posts([
            'post_type' => 'page',
            'posts_per_page' => -1,
            'meta_query' => [
                [
                    'key' => '_pcpc_plugin_page',
                    'compare' => 'EXISTS',
                ],
            ],
        ]);

        $result = [];
        foreach ($pages as $page) {
            $slug = get_post_meta($page->ID, '_pcpc_plugin_page', true);
            $result[get_permalink($page->ID)] = $page->post_title;
        }

        return $result;
    }

    private function get_plugin_page_by_slug($slug) {
        $pages = get_posts([
            'post_type' => 'page',
            'posts_per_page' => -1,
            'meta_key' => '_pcpc_plugin_page',
            'meta_value' => $slug,
        ]);

        if (!empty($pages)) {
            return get_permalink($pages[0]->ID);
        }

        return null;
    }

    private function render_pages_info() {
        $pages = get_posts([
            'post_type' => 'page',
            'posts_per_page' => -1,
            'meta_query' => [
                [
                    'key' => '_pcpc_plugin_page',
                    'compare' => 'EXISTS',
                ],
            ],
        ]);

        if (empty($pages)) {
            echo '<tr><td colspan="3">' . esc_html__( 'No plugin pages found', 'parental-customer-plugin' ) . '</td></tr>';
            return;
        }

        foreach ($pages as $page) {
            $slug = get_post_meta($page->ID, '_pcpc_plugin_page', true);
            $permalink = get_permalink($page->ID);
            echo '<tr>';
            echo '<td>' . esc_html($page->post_title) . '</td>';
            echo '<td><code>[' . esc_html($slug) . ']</code></td>';
            echo '<td><a href="' . esc_url($permalink) . '" target="_blank">' . esc_html__( 'View', 'parental-customer-plugin' ) . '</a></td>';
            echo '</tr>';
        }
    }
}
