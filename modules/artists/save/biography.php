<?php
/**
 * Save Artist Biography
 *
 * @package LevelsBeatz_Core
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Save Biography
 */
function lb_save_artist_biography($post_id)
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

    // Save Biography
    if (isset($_POST['lb_biography'])) {

        update_post_meta(
            $post_id,
            '_lb_biography',
            wp_kses_post(wp_unslash($_POST['lb_biography']))
        );

    } else {

        delete_post_meta($post_id, '_lb_biography');

    }
}

add_action('save_post_artist', 'lb_save_artist_biography');