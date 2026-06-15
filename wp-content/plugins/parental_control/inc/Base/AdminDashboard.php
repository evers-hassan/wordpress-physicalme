<?php

namespace HBVSoft\Pcpc\Inc\Base;

use HBVSoft\Pcpc\Inc\I18n;

class AdminDashboard extends BaseController {

    public function register() {
        add_action('admin_menu', [$this, 'add_dashboard_menu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_dashboard_styles']);
    }

    public function add_dashboard_menu() {
        add_menu_page(
            I18n::text('Parental Control Dashboard'),
            I18n::text('Parental Control'),
            'manage_options',
            'pcpc_dashboard',
            [$this, 'render_dashboard'],
            'dashicons-family',
            25
        );
    }

    public function enqueue_dashboard_styles() {
        if (!isset($_GET['page']) || $_GET['page'] !== 'pcpc_dashboard') {
            return;
        }

        wp_enqueue_style(
            'pcpc-dashboard-style',
            $this->plugin_url . 'assets/dashboard.css',
            [],
            '1.0'
        );
    }

    public function render_dashboard() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have permission to access this page', 'parental-customer-plugin'));
        }

        $stats = $this->get_statistics();
        ?>
        <div class="wrap pcpc-dashboard">
            <h1><?php _e('Parental Control Dashboard', 'parental-customer-plugin'); ?></h1>

            <div class="pcpc-dashboard-grid">
                <!-- Statistics Cards -->
                <div class="pcpc-stats-container">
                    <div class="pcpc-stat-card">
                        <div class="pcpc-stat-number"><?php echo $stats['total_parents']; ?></div>
                        <div class="pcpc-stat-label"><?php _e('Parents', 'parental-customer-plugin'); ?></div>
                        <div class="pcpc-stat-icon">👨‍💼</div>
                    </div>

                    <div class="pcpc-stat-card">
                        <div class="pcpc-stat-number"><?php echo $stats['total_children']; ?></div>
                        <div class="pcpc-stat-label"><?php _e('Children', 'parental-customer-plugin'); ?></div>
                        <div class="pcpc-stat-icon">👧‍🦱</div>
                    </div>

                    <div class="pcpc-stat-card">
                        <div class="pcpc-stat-number"><?php echo $stats['total_posts']; ?></div>
                        <div class="pcpc-stat-label"><?php _e('Content Items', 'parental-customer-plugin'); ?></div>
                        <div class="pcpc-stat-icon">📚</div>
                    </div>

                    <div class="pcpc-stat-card">
                        <div class="pcpc-stat-number"><?php echo $stats['configured_children']; ?></div>
                        <div class="pcpc-stat-label"><?php _e('Configured', 'parental-customer-plugin'); ?></div>
                        <div class="pcpc-stat-icon">✅</div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="pcpc-quick-actions">
                    <h2><?php _e('Quick Actions', 'parental-customer-plugin'); ?></h2>
                    <ul>
                        <li>
                            <a href="<?php echo admin_url('edit-tags.php?taxonomy=pcpc_age_group'); ?>" class="button button-secondary">
                                <?php _e('Manage Age Groups', 'parental-customer-plugin'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('edit-tags.php?taxonomy=pcpc_genre'); ?>" class="button button-secondary">
                                <?php _e('Manage Genres', 'parental-customer-plugin'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('edit-tags.php?taxonomy=pcpc_content_warning'); ?>" class="button button-secondary">
                                <?php _e('Manage Warnings', 'parental-customer-plugin'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('options-general.php?page=pcpc_settings'); ?>" class="button button-secondary">
                                <?php _e('Plugin Settings', 'parental-customer-plugin'); ?>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Recent Parents -->
                <div class="pcpc-recent-section">
                    <h2><?php _e('Recent Parents', 'parental-customer-plugin'); ?></h2>
                    <?php $this->render_recent_parents(); ?>
                </div>

                <!-- Recent Children -->
                <div class="pcpc-recent-section">
                    <h2><?php _e('Recent Children', 'parental-customer-plugin'); ?></h2>
                    <?php $this->render_recent_children(); ?>
                </div>
            </div>

            <!-- System Status -->
            <div class="pcpc-system-status">
                <h2><?php _e('System Status', 'parental-customer-plugin'); ?></h2>
                <table class="widefat">
                    <tbody>
                        <tr>
                            <td><?php _e('Parent Role', 'parental-customer-plugin'); ?></td>
                            <td><?php echo $this->check_role('pcpc_parent') ? '✓ ' . __('Active', 'parental-customer-plugin') : '✗ ' . __('Missing', 'parental-customer-plugin'); ?></td>
                        </tr>
                        <tr>
                            <td><?php _e('Child Role', 'parental-customer-plugin'); ?></td>
                            <td><?php echo $this->check_role('pcpc_child') ? '✓ ' . __('Active', 'parental-customer-plugin') : '✗ ' . __('Missing', 'parental-customer-plugin'); ?></td>
                        </tr>
                        <tr>
                            <td><?php _e('Age Groups Taxonomy', 'parental-customer-plugin'); ?></td>
                            <td><?php echo $this->check_taxonomy('pcpc_age_group') ? '✓ ' . __('Active', 'parental-customer-plugin') : '✗ ' . __('Missing', 'parental-customer-plugin'); ?></td>
                        </tr>
                        <tr>
                            <td><?php _e('Genres Taxonomy', 'parental-customer-plugin'); ?></td>
                            <td><?php echo $this->check_taxonomy('pcpc_genre') ? '✓ ' . __('Active', 'parental-customer-plugin') : '✗ ' . __('Missing', 'parental-customer-plugin'); ?></td>
                        </tr>
                        <tr>
                            <td><?php _e('Content Warnings Taxonomy', 'parental-customer-plugin'); ?></td>
                            <td><?php echo $this->check_taxonomy('pcpc_content_warning') ? '✓ ' . __('Active', 'parental-customer-plugin') : '✗ ' . __('Missing', 'parental-customer-plugin'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }

    private function get_statistics() {
        $parents = get_users(['role' => 'pcpc_parent', 'count_total' => true]);
        $children = get_users(['role' => 'pcpc_child', 'count_total' => true]);
        $posts = wp_count_posts('post');

        // Count children with permissions configured
        $configured = 0;
        $all_children = get_users(['role' => 'pcpc_child']);
        foreach ($all_children as $child) {
            $perms = get_user_meta($child->ID, 'pcpc_allowed_age_groups', true);
            if (!empty($perms)) {
                $configured++;
            }
        }

        return [
            'total_parents' => count($parents),
            'total_children' => count($children),
            'total_posts' => $posts->publish ?? 0,
            'configured_children' => $configured,
        ];
    }

    private function render_recent_parents() {
        $parents = get_users([
            'role' => 'pcpc_parent',
            'orderby' => 'user_registered',
            'order' => 'DESC',
            'number' => 5,
        ]);

        if (empty($parents)) {
            echo '<p>' . __('No parents yet', 'parental-customer-plugin') . '</p>';
            return;
        }

        echo '<table class="widefat"><tbody>';
        foreach ($parents as $parent) {
            $children = get_users([
                'meta_key' => 'parent_id',
                'meta_value' => $parent->ID,
                'count_total' => true,
            ]);
            echo '<tr>';
            echo '<td>' . esc_html($parent->display_name) . '</td>';
            echo '<td>' . esc_html($parent->user_email) . '</td>';
            echo '<td style="text-align: center;">' . count($children) . ' ' . __('children', 'parental-customer-plugin') . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }

    private function render_recent_children() {
        $children = get_users([
            'role' => 'pcpc_child',
            'orderby' => 'user_registered',
            'order' => 'DESC',
            'number' => 5,
        ]);

        if (empty($children)) {
            echo '<p>' . __('No children yet', 'parental-customer-plugin') . '</p>';
            return;
        }

        echo '<table class="widefat"><tbody>';
        foreach ($children as $child) {
            $parent_id = get_user_meta($child->ID, 'parent_id', true);
            $parent = get_userdata($parent_id);
            $perms = get_user_meta($child->ID, 'pcpc_allowed_age_groups', true);
            $status = !empty($perms) ? '✓ ' . __('Configured', 'parental-customer-plugin') : '○ ' . __('Pending', 'parental-customer-plugin');

            echo '<tr>';
            echo '<td>' . esc_html($child->display_name) . '</td>';
            echo '<td>' . ($parent ? esc_html($parent->display_name) : '—') . '</td>';
            echo '<td>' . $status . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }

    private function check_role($role) {
        $wp_roles = wp_roles();
        return isset($wp_roles->roles[$role]);
    }

    private function check_taxonomy($taxonomy) {
        return taxonomy_exists($taxonomy);
    }
}
