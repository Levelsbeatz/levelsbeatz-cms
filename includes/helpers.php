<?php

if (!defined('ABSPATH')) {
    exit;
}

function lb_save_song_meta($post_id) {

    if (!isset($_POST['lb_song_nonce_field'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['lb_song_nonce_field'], 'lb_song_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['lb_artist'])) {
        update_post_meta($post_id, '_lb_artist', sanitize_text_field($_POST['lb_artist']));
    }

    if (isset($_POST['lb_audio'])) {
        update_post_meta($post_id, '_lb_audio', esc_url_raw($_POST['lb_audio']));
    }

    if (isset($_POST['lb_lyrics'])) {
        update_post_meta($post_id, '_lb_lyrics', wp_kses_post($_POST['lb_lyrics']));
    }

}

add_action('save_post_song', 'lb_save_song_meta');