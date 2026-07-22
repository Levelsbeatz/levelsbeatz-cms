<?php
/**
 * Save Artist Basic Information
 *
 * @package LevelsBeatz_Core
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Save Artist Details
 */
function lb_save_artist_details($post_id)
{
    // Verify nonce
    if (
        !isset($_POST['lb_artist_nonce']) ||
        !wp_verify_nonce($_POST['lb_artist_nonce'], 'lb_save_artist_details')
    ) {
        return;
    }

    // Prevent autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Make sure this is an Artist post
    if (get_post_type($post_id) !== 'artist') {
        return;
    }

    // Fields to save
    $fields = array(
        'lb_stage_name'   => '_lb_stage_name',
        'lb_real_name'    => '_lb_real_name',
        'lb_country'      => '_lb_country',
        'lb_state'        => '_lb_state',
        'lb_record_label' => '_lb_record_label',
        'lb_genre'        => '_lb_genre',
    );

    foreach ($fields as $field => $meta_key) {

        if (isset($_POST[$field])) {

            update_post_meta(
                $post_id,
                $meta_key,
                sanitize_text_field($_POST[$field])
            );

        }

    }
}

add_action('save_post_artist', 'lb_save_artist_details');