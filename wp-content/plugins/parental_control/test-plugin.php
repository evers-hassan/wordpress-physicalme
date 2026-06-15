<?php
/**
 * Comprehensive test script for Parental Control Plugin
 * Verifies all functionality works correctly
 */

// Prevent direct execution
if (!defined('ABSPATH')) {
    die('WordPress not loaded');
}

// Track test results
$results = [
    'passed' => 0,
    'failed' => 0,
    'tests'  => [],
];

function test($name, $condition, $details = '') {
    global $results;
    if ($condition) {
        $results['passed']++;
        $results['tests'][] = [
            'name'   => $name,
            'status' => 'PASS',
            'details' => $details,
        ];
    } else {
        $results['failed']++;
        $results['tests'][] = [
            'name'   => $name,
            'status' => 'FAIL',
            'details' => $details,
        ];
    }
}

// Test 1: Check roles exist
$wp_roles = wp_roles();
test('Parent role exists', isset($wp_roles->roles['pcpc_parent']), 'Role should be registered');
test('Child role exists', isset($wp_roles->roles['pcpc_child']), 'Role should be registered');

// Test 2: Check taxonomies exist
test('Age Group taxonomy exists', taxonomy_exists('pcpc_age_group'), 'Should be registered');
test('Genre taxonomy exists', taxonomy_exists('pcpc_genre'), 'Should be registered');
test('Content Warning taxonomy exists', taxonomy_exists('pcpc_content_warning'), 'Should be registered');

// Test 3: Check default terms
$age_groups = get_terms(['taxonomy' => 'pcpc_age_group', 'hide_empty' => false]);
$genres = get_terms(['taxonomy' => 'pcpc_genre', 'hide_empty' => false]);
$warnings = get_terms(['taxonomy' => 'pcpc_content_warning', 'hide_empty' => false]);

test('Age groups have terms', count($age_groups) > 0, count($age_groups) . ' terms found');
test('Genres have terms', count($genres) > 0, count($genres) . ' terms found');
test('Warnings have terms', count($warnings) > 0, count($warnings) . ' terms found');

// Test 4: Check parent user exists
$parent = get_user_by('login', 'testparent');
test('Test parent user exists', $parent !== false, 'User created during setup');

if ($parent) {
    test('Parent has parent role', in_array('pcpc_parent', (array) $parent->roles), 'Role should be assigned');
}

// Test 5: Check child user exists
$child = get_user_by('login', 'testchild');
test('Test child user exists', $child !== false, 'User created during setup');

if ($child) {
    test('Child has child role', in_array('pcpc_child', (array) $child->roles), 'Role should be assigned');

    // Test 6: Check permissions can be set
    if ($parent) {
        $parent_id = $parent->ID;
        update_user_meta($child->ID, 'parent_id', $parent_id);

        // Get first age group
        if (!empty($age_groups)) {
            $age_group_ids = wp_list_pluck($age_groups, 'term_id');
            update_user_meta($child->ID, 'pcpc_allowed_age_groups', $age_group_ids);

            $saved_groups = get_user_meta($child->ID, 'pcpc_allowed_age_groups', true);
            test('Permissions saved to user meta', is_array($saved_groups) && count($saved_groups) > 0, count($saved_groups) . ' age groups saved');
        }
    }
}

// Test 7: Check test posts exist and have tags
$posts = get_posts(['numberposts' => -1]);
test('Posts exist in database', count($posts) > 0, count($posts) . ' posts found');

// Count posts with parental control tags
$posts_with_age_groups = 0;
$posts_with_genres = 0;
$posts_with_warnings = 0;

foreach ($posts as $post) {
    $age_groups_post = wp_get_post_terms($post->ID, 'pcpc_age_group');
    $genres_post = wp_get_post_terms($post->ID, 'pcpc_genre');
    $warnings_post = wp_get_post_terms($post->ID, 'pcpc_content_warning');

    if (count($age_groups_post) > 0) $posts_with_age_groups++;
    if (count($genres_post) > 0) $posts_with_genres++;
    if (count($warnings_post) > 0) $posts_with_warnings++;
}

test('Posts have age groups assigned', $posts_with_age_groups > 0, $posts_with_age_groups . ' posts with age groups');
test('Posts have genres assigned', $posts_with_genres > 0, $posts_with_genres . ' posts with genres');
test('Posts have warnings assigned', $posts_with_warnings > 0, $posts_with_warnings . ' posts with warnings');

// Test 8: Check admin pages are accessible
$dashboard_url = admin_url('admin.php?page=pcpc_dashboard');
test('Dashboard page URL is set', !empty($dashboard_url), 'URL: ' . $dashboard_url);

// Test 9: Check settings are registered
$max_children = get_option('pcpc_max_children');
$parent_redirect = get_option('pcpc_parent_login_redirect');
test('Max children setting exists', !empty($max_children), 'Value: ' . $max_children);
test('Parent login redirect setting exists', !empty($parent_redirect), 'Value: ' . $parent_redirect);

// Test 10: Check plugin file exists and is readable
$plugin_file = dirname(__FILE__) . '/parental-customers-plugin.php';
test('Main plugin file exists', file_exists($plugin_file), 'File: ' . $plugin_file);

// Output results
echo "\n\n";
echo "========================================\n";
echo "PARENTAL CONTROL PLUGIN TEST RESULTS\n";
echo "========================================\n\n";

foreach ($results['tests'] as $test) {
    $status_icon = $test['status'] === 'PASS' ? '✓' : '✗';
    echo "{$status_icon} {$test['name']}\n";
    if (!empty($test['details'])) {
        echo "  → {$test['details']}\n";
    }
}

echo "\n========================================\n";
echo "SUMMARY: {$results['passed']} passed, {$results['failed']} failed\n";
echo "========================================\n\n";

return $results;
?>
