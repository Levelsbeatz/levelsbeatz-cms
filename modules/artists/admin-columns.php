<?php
/**
 * Artist Admin Columns
 *
 * @package LevelsBeatz_Core
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Customize Artist Admin Columns
 */
function lb_artist_columns($columns)
{
    return array(
        'cb'         => $columns['cb'],
        'thumbnail'  => __('Photo', 'levelsbeatz'),
        'title'      => __('Artist', 'levelsbeatz'),
        'stage_name' => __('Stage Name', 'levelsbeatz'),
        'country'    => __('Country', 'levelsbeatz'),
        'date'       => __('Date', 'levelsbeatz'),
    );
}

add_filter('manage_artist_posts_columns', 'lb_artist_columns');

/**
 * Display Custom Column Values
 */
function lb_artist_column_content($column, $post_id)
{
    switch ($column) {

        case 'thumbnail':

            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(60,60));
            } else {
                echo '—';
            }

        break;

        case 'stage_name':

            echo esc_html(
                get_post_meta($post_id, '_lb_stage_name', true)
            );

        break;

        case 'country':

            echo esc_html(
                get_post_meta($post_id, '_lb_country', true)
            );

        break;
    }
}

add_action(
    'manage_artist_posts_custom_column',
    'lb_artist_column_content',
    10,
    2
);