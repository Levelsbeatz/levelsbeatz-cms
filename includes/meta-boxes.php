<?php

if (!defined('ABSPATH')) {
    exit;
}

function lb_add_song_meta_boxes() {

    add_meta_box(
        'lb_song_details',
        'Song Details',
        'lb_song_details_callback',
        'song',
        'normal',
        'high'
    );

}

add_action('add_meta_boxes', 'lb_add_song_meta_boxes');

function lb_song_details_callback($post) {

    wp_nonce_field('lb_song_nonce', 'lb_song_nonce_field');

    $artist = get_post_meta($post->ID, '_lb_artist', true);
    $audio  = get_post_meta($post->ID, '_lb_audio', true);
    $lyrics = get_post_meta($post->ID, '_lb_lyrics', true);

    ?>

    <p>
        <label><strong>Artist</strong></label><br>
        <input type="text" name="lb_artist" value="<?php echo esc_attr($artist); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Audio URL</strong></label><br>
        <input type="text" name="lb_audio" value="<?php echo esc_attr($audio); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Lyrics</strong></label><br>
        <textarea name="lb_lyrics" rows="10" style="width:100%;"><?php echo esc_textarea($lyrics); ?></textarea>
    </p>

    <?php
}