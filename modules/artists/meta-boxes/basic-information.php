<?php
/**
 * Artist Basic Information Meta Box
 *
 * @package LevelsBeatz_Core
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Artist Meta Box
 */
function lb_artist_add_meta_boxes()
{
    add_meta_box(
        'lb_artist_details',
        __('Artist Information', 'levelsbeatz'),
        'lb_artist_details_callback',
        'artist',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'lb_artist_add_meta_boxes');

/**
 * Artist Meta Box Callback
 */
function lb_artist_details_callback($post)
{
    wp_nonce_field('lb_save_artist_details', 'lb_artist_nonce');

    $stage_name   = get_post_meta($post->ID, '_lb_stage_name', true);
    $real_name    = get_post_meta($post->ID, '_lb_real_name', true);
    $country      = get_post_meta($post->ID, '_lb_country', true);
    $state        = get_post_meta($post->ID, '_lb_state', true);
    $record_label = get_post_meta($post->ID, '_lb_record_label', true);
    $genre        = get_post_meta($post->ID, '_lb_genre', true);
    ?>

    <table class="form-table">

        <tr>
            <th><label for="lb_stage_name">Stage Name</label></th>
            <td>
                <input
                    type="text"
                    id="lb_stage_name"
                    name="lb_stage_name"
                    value="<?php echo esc_attr($stage_name); ?>"
                    class="regular-text">
            </td>
        </tr>

        <tr>
            <th><label for="lb_real_name">Real Name</label></th>
            <td>
                <input
                    type="text"
                    id="lb_real_name"
                    name="lb_real_name"
                    value="<?php echo esc_attr($real_name); ?>"
                    class="regular-text">
            </td>
        </tr>

        <tr>
            <th><label for="lb_country">Country</label></th>
            <td>
                <input
                    type="text"
                    id="lb_country"
                    name="lb_country"
                    value="<?php echo esc_attr($country); ?>"
                    class="regular-text">
            </td>
        </tr>

        <tr>
            <th><label for="lb_state">State</label></th>
            <td>
                <input
                    type="text"
                    id="lb_state"
                    name="lb_state"
                    value="<?php echo esc_attr($state); ?>"
                    class="regular-text">
            </td>
        </tr>

        <tr>
            <th><label for="lb_record_label">Record Label</label></th>
            <td>
                <input
                    type="text"
                    id="lb_record_label"
                    name="lb_record_label"
                    value="<?php echo esc_attr($record_label); ?>"
                    class="regular-text">
            </td>
        </tr>

        <tr>
            <th><label for="lb_genre">Genre</label></th>
            <td>
                <input
                    type="text"
                    id="lb_genre"
                    name="lb_genre"
                    value="<?php echo esc_attr($genre); ?>"
                    class="regular-text">
            </td>
        </tr>

    </table>

    <?php
}