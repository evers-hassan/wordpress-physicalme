<?php

namespace HBVSoft\Pcpc\Inc\Base;

use HBVSoft\Pcpc\Inc\I18n;

class PermissionController extends BaseController {

    public function register() {
        add_action('wp_ajax_pcpc_get_child_permissions', [$this, 'get_child_permissions']);
        add_action('wp_ajax_pcpc_save_child_permissions', [$this, 'save_child_permissions']);
        add_action('wp_ajax_pcpc_save_tag_permissions', [$this, 'save_tag_permissions']);
    }

    /**
     * Get all permissions for a specific child
     */
    public function get_child_permissions() {
        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_send_json_error(__('Unauthorized', 'parental-customer-plugin'));
            wp_die();
        }

        $child_id = intval(sanitize_text_field($_POST['child_id']));
        $parent_id = get_current_user_id();

        // Verify parent owns this child
        $child_parent = get_user_meta($child_id, 'parent_id', true);
        if (intval($child_parent) !== $parent_id) {
            wp_send_json_error(__('Child not found', 'parental-customer-plugin'));
            wp_die();
        }

        $permissions = [
            'age_groups' => get_user_meta($child_id, 'pcpc_allowed_age_groups', true) ?: [],
            'genres' => get_user_meta($child_id, 'pcpc_allowed_genres', true) ?: [],
            'content_warnings' => get_user_meta($child_id, 'pcpc_blocked_warnings', true) ?: [],
        ];

        wp_send_json_success($permissions);
        wp_die();
    }

    /**
     * Save tag-based permissions for a child
     */
    public function save_tag_permissions() {
        check_ajax_referer('pcpc_plugin_register_nonce', 'form_nonce');

        if (!is_user_logged_in() || !current_user_can('pcpc_parent')) {
            wp_send_json_error(__('Unauthorized', 'parental-customer-plugin'));
            wp_die();
        }

        $child_id = intval(sanitize_text_field($_POST['child_id']));
        $parent_id = get_current_user_id();

        // Verify parent owns this child
        $child_parent = get_user_meta($child_id, 'parent_id', true);
        if (intval($child_parent) !== $parent_id) {
            wp_send_json_error(__('Child not found', 'parental-customer-plugin'));
            wp_die();
        }

        // Save allowed age groups
        if (isset($_POST['allowed_age_groups'])) {
            $age_groups = array_map('intval', (array) $_POST['allowed_age_groups']);
            update_user_meta($child_id, 'pcpc_allowed_age_groups', $age_groups);
        } else {
            delete_user_meta($child_id, 'pcpc_allowed_age_groups');
        }

        // Save allowed genres
        if (isset($_POST['allowed_genres'])) {
            $genres = array_map('intval', (array) $_POST['allowed_genres']);
            update_user_meta($child_id, 'pcpc_allowed_genres', $genres);
        } else {
            delete_user_meta($child_id, 'pcpc_allowed_genres');
        }

        // Save blocked warnings
        if (isset($_POST['blocked_warnings'])) {
            $warnings = array_map('intval', (array) $_POST['blocked_warnings']);
            update_user_meta($child_id, 'pcpc_blocked_warnings', $warnings);
        } else {
            delete_user_meta($child_id, 'pcpc_blocked_warnings');
        }

        wp_send_json_success(__('Permissions saved successfully', 'parental-customer-plugin'));
        wp_die();
    }

    /**
     * Get all available tags for selection UI
     */
    public static function get_available_tags() {
        return [
            'age_groups' => get_terms(['taxonomy' => 'pcpc_age_group', 'hide_empty' => false]),
            'genres' => get_terms(['taxonomy' => 'pcpc_genre', 'hide_empty' => false]),
            'content_warnings' => get_terms(['taxonomy' => 'pcpc_content_warning', 'hide_empty' => false]),
        ];
    }

    /**
     * Render permission management UI for a child
     */
    public static function render_child_permission_ui($child_id) {
        $parent_id = get_current_user_id();

        // Verify parent owns this child
        $child_parent = get_user_meta($child_id, 'parent_id', true);
        if (intval($child_parent) !== $parent_id) {
            return '';
        }

        $allowed_age_groups = get_user_meta($child_id, 'pcpc_allowed_age_groups', true) ?: [];
        $allowed_genres = get_user_meta($child_id, 'pcpc_allowed_genres', true) ?: [];
        $blocked_warnings = get_user_meta($child_id, 'pcpc_blocked_warnings', true) ?: [];

        $tags = self::get_available_tags();

        ob_start();
        ?>
        <div class="pcpc-permission-ui">
            <h3><?php _e('Content Access Permissions', 'parental-customer-plugin'); ?></h3>

            <div class="pcpc-permission-section">
                <h4><?php _e('Allowed Age Groups', 'parental-customer-plugin'); ?></h4>
                <p style="font-size: 12px; color: #666;">
                    <?php _e('Select which age groups this child can access', 'parental-customer-plugin'); ?>
                </p>
                <div class="pcpc-tags-group">
                    <?php foreach ($tags['age_groups'] as $term) : ?>
                        <label style="display: inline-block; margin-right: 15px; margin-bottom: 10px;">
                            <input type="checkbox"
                                   name="pcpc_permission_age_group"
                                   value="<?php echo esc_attr($term->term_id); ?>"
                                   <?php checked(in_array($term->term_id, $allowed_age_groups)); ?> />
                            <?php echo esc_html($term->name); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="pcpc-permission-section" style="margin-top: 20px;">
                <h4><?php _e('Allowed Genres', 'parental-customer-plugin'); ?></h4>
                <p style="font-size: 12px; color: #666;">
                    <?php _e('Select which genres this child can access', 'parental-customer-plugin'); ?>
                </p>
                <div class="pcpc-tags-group">
                    <?php foreach ($tags['genres'] as $term) : ?>
                        <label style="display: inline-block; margin-right: 15px; margin-bottom: 10px;">
                            <input type="checkbox"
                                   name="pcpc_permission_genre"
                                   value="<?php echo esc_attr($term->term_id); ?>"
                                   <?php checked(in_array($term->term_id, $allowed_genres)); ?> />
                            <?php echo esc_html($term->name); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="pcpc-permission-section" style="margin-top: 20px;">
                <h4><?php _e('Blocked Content Warnings', 'parental-customer-plugin'); ?></h4>
                <p style="font-size: 12px; color: #666;">
                    <?php _e('Select content warnings to block (e.g., Violence, Language)', 'parental-customer-plugin'); ?>
                </p>
                <div class="pcpc-tags-group">
                    <?php foreach ($tags['content_warnings'] as $term) : ?>
                        <label style="display: inline-block; margin-right: 15px; margin-bottom: 10px;">
                            <input type="checkbox"
                                   name="pcpc_permission_warning"
                                   value="<?php echo esc_attr($term->term_id); ?>"
                                   <?php checked(in_array($term->term_id, $blocked_warnings)); ?> />
                            <?php echo esc_html($term->name); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <button type="button"
                        class="button button-primary pcpc-save-permissions"
                        data-child-id="<?php echo esc_attr($child_id); ?>">
                    <?php _e('Save Permissions', 'parental-customer-plugin'); ?>
                </button>
                <span class="pcpc-permission-message" style="display: none; margin-left: 10px;"></span>
            </div>
        </div>

        <style>
            .pcpc-permission-ui {
                background: #f9f9f9;
                border: 1px solid #ddd;
                border-radius: 5px;
                padding: 20px;
                margin: 20px 0;
            }
            .pcpc-permission-section {
                margin-bottom: 20px;
            }
            .pcpc-tags-group {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }
            .pcpc-tags-group label {
                background: white;
                border: 1px solid #ddd;
                border-radius: 3px;
                padding: 8px 12px;
                cursor: pointer;
                transition: all 0.2s;
            }
            .pcpc-tags-group label:hover {
                border-color: #999;
                background: #f5f5f5;
            }
            .pcpc-tags-group input[type="checkbox"] {
                margin-right: 5px;
            }
        </style>

        <script>
        jQuery(document).ready(function($) {
            $('.pcpc-save-permissions').on('click', function() {
                var childId = $(this).data('child-id');
                var $message = $(this).siblings('.pcpc-permission-message');

                var allowedAgeGroups = $('input[name="pcpc_permission_age_group"]:checked').map(function() {
                    return $(this).val();
                }).get();

                var allowedGenres = $('input[name="pcpc_permission_genre"]:checked').map(function() {
                    return $(this).val();
                }).get();

                var blockedWarnings = $('input[name="pcpc_permission_warning"]:checked').map(function() {
                    return $(this).val();
                }).get();

                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'pcpc_save_tag_permissions',
                        form_nonce: my_ajax_object.form_nonce,
                        child_id: childId,
                        allowed_age_groups: allowedAgeGroups,
                        allowed_genres: allowedGenres,
                        blocked_warnings: blockedWarnings
                    },
                    success: function(response) {
                        if (response.success) {
                            $message.text('✓ ' + response.data).css('color', '#28a745').show();
                            setTimeout(function() {
                                $message.fadeOut();
                            }, 3000);
                        } else {
                            $message.text('✗ Error: ' + response.data).css('color', '#dc3545').show();
                        }
                    },
                    error: function() {
                        $message.text('✗ Request failed').css('color', '#dc3545').show();
                    }
                });
            });
        });
        </script>
        <?php
        return ob_get_clean();
    }
}
