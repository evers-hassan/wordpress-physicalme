<?php

namespace HBVSoft\Pcpc\Inc\Base;

class ContentFilter extends BaseController {

    public function register() {
        add_filter('posts_where', [$this, 'filter_content_by_tags']);
    }

    /**
     * Check if current user (child) can access this post based on tag permissions
     */
    public static function can_user_access_post($post_id, $user_id = null) {
        if (!$user_id) {
            $user_id = get_current_user_id();
        }

        $user = get_userdata($user_id);

        // If not a child role, allow access
        if (!$user || !in_array('pcpc_child', (array) $user->roles)) {
            return true;
        }

        // Get child's allowed tags
        $allowed_age_groups = get_user_meta($user_id, 'pcpc_allowed_age_groups', true) ?: [];
        $allowed_genres = get_user_meta($user_id, 'pcpc_allowed_genres', true) ?: [];
        $blocked_warnings = get_user_meta($user_id, 'pcpc_blocked_warnings', true) ?: [];

        // If no permissions set, deny access (fail-safe)
        if (empty($allowed_age_groups) && empty($allowed_genres) && empty($blocked_warnings)) {
            return true; // No restrictions set
        }

        // Get post's tags
        $post_age_groups = wp_get_post_terms($post_id, 'pcpc_age_group', ['fields' => 'ids']);
        $post_genres = wp_get_post_terms($post_id, 'pcpc_genre', ['fields' => 'ids']);
        $post_warnings = wp_get_post_terms($post_id, 'pcpc_content_warning', ['fields' => 'ids']);

        // Check age groups (must have at least one allowed age group)
        if (!empty($allowed_age_groups) && !empty($post_age_groups)) {
            $age_group_allowed = array_intersect($post_age_groups, $allowed_age_groups);
            if (empty($age_group_allowed)) {
                return false; // Post has age group not allowed for this child
            }
        }

        // Check genres (must have at least one allowed genre)
        if (!empty($allowed_genres) && !empty($post_genres)) {
            $genre_allowed = array_intersect($post_genres, $allowed_genres);
            if (empty($genre_allowed)) {
                return false; // Post has genre not allowed for this child
            }
        }

        // Check blocked warnings (must not have any blocked warning)
        if (!empty($blocked_warnings) && !empty($post_warnings)) {
            $warning_blocked = array_intersect($post_warnings, $blocked_warnings);
            if (!empty($warning_blocked)) {
                return false; // Post has blocked warning
            }
        }

        return true; // Post is accessible
    }

    /**
     * Filter posts in queries based on child permissions
     */
    public function filter_content_by_tags($where) {
        global $wpdb;

        $user_id = get_current_user_id();
        if (!$user_id) {
            return $where;
        }

        $user = get_userdata($user_id);
        if (!$user || !in_array('pcpc_child', (array) $user->roles)) {
            return $where; // Not a child, don't filter
        }

        // Get child's allowed tags
        $allowed_age_groups = get_user_meta($user_id, 'pcpc_allowed_age_groups', true) ?: [];
        $allowed_genres = get_user_meta($user_id, 'pcpc_allowed_genres', true) ?: [];
        $blocked_warnings = get_user_meta($user_id, 'pcpc_blocked_warnings', true) ?: [];

        // If no permissions set, allow all
        if (empty($allowed_age_groups) && empty($allowed_genres) && empty($blocked_warnings)) {
            return $where;
        }

        // Build restriction logic
        $restrictions = [];

        // Age group restriction: post MUST have an allowed age group
        if (!empty($allowed_age_groups)) {
            $age_group_ids = implode(',', array_map('intval', $allowed_age_groups));
            $restrictions[] = "({$wpdb->posts}.ID IN (
                SELECT object_id FROM {$wpdb->term_relationships}
                WHERE term_taxonomy_id IN (
                    SELECT term_taxonomy_id FROM {$wpdb->term_taxonomy}
                    WHERE taxonomy = 'pcpc_age_group'
                    AND term_id IN ({$age_group_ids})
                )
            ))";
        }

        // Genre restriction: post MUST have an allowed genre
        if (!empty($allowed_genres)) {
            $genre_ids = implode(',', array_map('intval', $allowed_genres));
            $restrictions[] = "({$wpdb->posts}.ID IN (
                SELECT object_id FROM {$wpdb->term_relationships}
                WHERE term_taxonomy_id IN (
                    SELECT term_taxonomy_id FROM {$wpdb->term_taxonomy}
                    WHERE taxonomy = 'pcpc_genre'
                    AND term_id IN ({$genre_ids})
                )
            ))";
        }

        // Warning restriction: post MUST NOT have a blocked warning
        if (!empty($blocked_warnings)) {
            $warning_ids = implode(',', array_map('intval', $blocked_warnings));
            $restrictions[] = "({$wpdb->posts}.ID NOT IN (
                SELECT object_id FROM {$wpdb->term_relationships}
                WHERE term_taxonomy_id IN (
                    SELECT term_taxonomy_id FROM {$wpdb->term_taxonomy}
                    WHERE taxonomy = 'pcpc_content_warning'
                    AND term_id IN ({$warning_ids})
                )
            ))";
        }

        // Combine restrictions with AND
        if (!empty($restrictions)) {
            $restriction_where = implode(' AND ', $restrictions);
            $where .= " AND ({$restriction_where})";
        }

        return $where;
    }

    /**
     * Get content restrictions summary for display
     */
    public static function get_child_restrictions_summary($user_id) {
        $allowed_age_groups = get_user_meta($user_id, 'pcpc_allowed_age_groups', true) ?: [];
        $allowed_genres = get_user_meta($user_id, 'pcpc_allowed_genres', true) ?: [];
        $blocked_warnings = get_user_meta($user_id, 'pcpc_blocked_warnings', true) ?: [];

        $summary = [];

        if (!empty($allowed_age_groups)) {
            $age_terms = get_terms([
                'taxonomy' => 'pcpc_age_group',
                'include' => $allowed_age_groups,
            ]);
            $age_names = wp_list_pluck($age_terms, 'name');
            $summary['age_groups'] = implode(', ', $age_names);
        }

        if (!empty($allowed_genres)) {
            $genre_terms = get_terms([
                'taxonomy' => 'pcpc_genre',
                'include' => $allowed_genres,
            ]);
            $genre_names = wp_list_pluck($genre_terms, 'name');
            $summary['genres'] = implode(', ', $genre_names);
        }

        if (!empty($blocked_warnings)) {
            $warning_terms = get_terms([
                'taxonomy' => 'pcpc_content_warning',
                'include' => $blocked_warnings,
            ]);
            $warning_names = wp_list_pluck($warning_terms, 'name');
            $summary['blocked_warnings'] = implode(', ', $warning_names);
        }

        return $summary;
    }
}
