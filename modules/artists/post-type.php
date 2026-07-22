<?php
/**
 * Artists Custom Post Type
 *
 * @package LevelsBeatz_Core
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Artist Custom Post Type
 */
function lb_register_artist_post_type() {

    $labels = array(
        'name'                  => __('Artists', 'levelsbeatz'),
        'singular_name'         => __('Artist', 'levelsbeatz'),
        'menu_name'             => __('Artists', 'levelsbeatz'),
        'name_admin_bar'        => __('Artist', 'levelsbeatz'),
        'add_new'               => __('Add New', 'levelsbeatz'),
        'add_new_item'          => __('Add New Artist', 'levelsbeatz'),
        'edit_item'             => __('Edit Artist', 'levelsbeatz'),
        'new_item'              => __('New Artist', 'levelsbeatz'),
        'view_item'             => __('View Artist', 'levelsbeatz'),
        'view_items'            => __('View Artists', 'levelsbeatz'),
        'search_items'          => __('Search Artists', 'levelsbeatz'),
        'not_found'             => __('No artists found.', 'levelsbeatz'),
        'not_found_in_trash'    => __('No artists found in Trash.', 'levelsbeatz'),
        'all_items'             => __('All Artists', 'levelsbeatz'),
        'archives'              => __('Artist Archives', 'levelsbeatz'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-microphone',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions'
        ),
        'has_archive'        => true,
        'rewrite'            => array(
            'slug' => 'artists',
            'with_front' => false,
        ),
        'show_in_rest'       => true,
        'menu_position'      => 5,
        'publicly_queryable' => true,
        'query_var'          => true,
    );

    register_post_type('artist', $args);
}

add_action('init', 'lb_register_artist_post_type');