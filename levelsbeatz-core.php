<?php
/**
 * Plugin Name: LevelsBeatz Core
 * Plugin URI: https://levelsbeatz.com
 * Description: Core functionality for the LevelsBeatz music platform.
 * Version: 1.0.0
 * Author: LevelsBeatz
 * License: GPL2+
 * Text Domain: levelsbeatz-core
 */

if (!defined('ABSPATH')) {
    exit;
}

define('LB_CORE_PATH', plugin_dir_path(__FILE__));
define('LB_CORE_URL', plugin_dir_url(__FILE__));

require_once LB_CORE_PATH . 'includes/post-types.php';
require_once LB_CORE_PATH . 'includes/taxonomies.php';
require_once LB_CORE_PATH . 'includes/meta-boxes.php';
require_once LB_CORE_PATH . 'includes/admin.php';
require_once LB_CORE_PATH . 'includes/helpers.php';

require_once LB_CORE_PATH . 'modules/artists/artist.php';
//require_once LB_CORE_PATH . 'modules/songs/song.php';
//require_once LB_CORE_PATH . 'modules/albums/album.php';
//require_once LB_CORE_PATH . 'modules/videos/video.php';
//require_once LB_CORE_PATH . 'modules/news/news.php';
//require_once LB_CORE_PATH . 'modules/ads/ads.php';