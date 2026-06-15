<?php
/**
 * Script to create test posts with parental control tags
 * Run from WordPress root: wp-cli shell < wp-content/plugins/parental_control/create-test-posts.php
 * Or manually in admin area by including this file
 */

// Prevent direct execution
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/../../../');
    require_once(ABSPATH . 'wp-load.php');
}

// Check if user is admin
if (!current_user_can('manage_options')) {
    die('You do not have permission to run this script.');
}

// Define test posts
$test_posts = [
    [
        'title'       => 'Learning ABC - For Toddlers',
        'content'     => 'A simple educational content for toddlers learning the alphabet.',
        'age_groups'  => ['3+'],
        'genres'      => ['Educational'],
        'warnings'    => [],
    ],
    [
        'title'       => 'Space Adventure - For Kids',
        'content'     => 'An exciting science fiction story about exploring the moon. Perfect for ages 5 and up.',
        'age_groups'  => ['5+'],
        'genres'      => ['Science Fiction', 'Adventure'],
        'warnings'    => [],
    ],
    [
        'title'       => 'Mystery in the Dark - For Teens',
        'content'     => 'A thrilling mystery story with some mildly scary moments. Recommended for teens 13 and older.',
        'age_groups'  => ['13+'],
        'genres'      => ['Drama', 'Adventure'],
        'warnings'    => ['Scary/Intense'],
    ],
    [
        'title'       => 'Horror Movie Review - Mature Content',
        'content'     => 'A detailed review of classic horror films. Contains discussions of violence and scary content.',
        'age_groups'  => ['18+'],
        'genres'      => ['Horror', 'Drama'],
        'warnings'    => ['Violence', 'Scary/Intense', 'Language'],
    ],
    [
        'title'       => 'Action Packed Documentary',
        'content'     => 'A documentary about action sports. Some scenes contain intense moments but no warnings.',
        'age_groups'  => ['13+'],
        'genres'      => ['Documentary'],
        'warnings'    => [],
    ],
    [
        'title'       => 'Comedy Show Transcript',
        'content'     => 'Transcript from a comedy show. Contains mature language and adult humor.',
        'age_groups'  => ['18+'],
        'genres'      => ['Comedy', 'Drama'],
        'warnings'    => ['Language'],
    ],
    [
        'title'       => 'Animated Film Review',
        'content'     => 'A review of popular animated films suitable for all ages.',
        'age_groups'  => ['3+', '5+', '13+', '18+'],
        'genres'      => ['Animation', 'Adventure'],
        'warnings'    => [],
    ],
];

// Create posts
$created_count = 0;
foreach ($test_posts as $post_data) {
    // Create post
    $post_id = wp_insert_post([
        'post_title'   => $post_data['title'],
        'post_content' => $post_data['content'],
        'post_type'    => 'post',
        'post_status'  => 'publish',
    ]);

    if (is_wp_error($post_id)) {
        echo "Error creating post: " . $post_id->get_error_message() . "\n";
        continue;
    }

    // Assign age groups
    if (!empty($post_data['age_groups'])) {
        $age_terms = [];
        foreach ($post_data['age_groups'] as $age_name) {
            $term = get_term_by('name', $age_name, 'pcpc_age_group');
            if ($term) {
                $age_terms[] = $term->term_id;
            }
        }
        if (!empty($age_terms)) {
            wp_set_post_terms($post_id, $age_terms, 'pcpc_age_group');
        }
    }

    // Assign genres
    if (!empty($post_data['genres'])) {
        $genre_terms = [];
        foreach ($post_data['genres'] as $genre_name) {
            $term = get_term_by('name', $genre_name, 'pcpc_genre');
            if ($term) {
                $genre_terms[] = $term->term_id;
            }
        }
        if (!empty($genre_terms)) {
            wp_set_post_terms($post_id, $genre_terms, 'pcpc_genre');
        }
    }

    // Assign warnings
    if (!empty($post_data['warnings'])) {
        $warning_terms = [];
        foreach ($post_data['warnings'] as $warning_name) {
            $term = get_term_by('name', $warning_name, 'pcpc_content_warning');
            if ($term) {
                $warning_terms[] = $term->term_id;
            }
        }
        if (!empty($warning_terms)) {
            wp_set_post_terms($post_id, $warning_terms, 'pcpc_content_warning');
        }
    }

    echo "✓ Created post: " . $post_data['title'] . " (ID: {$post_id})\n";
    $created_count++;
}

echo "\n" . $created_count . " test posts created successfully!\n";
?>
