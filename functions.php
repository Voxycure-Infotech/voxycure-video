<?php

if (!defined('ABSPATH'))  exit; // Exit if accessed directly

define('VOXY_VERSION', time());
define('VOXY_PATH', get_template_directory());
define('VOXY_URL', get_template_directory_uri());


require VOXY_PATH . '/inc/support.php'; // Registed custom metaboxes 
require VOXY_PATH . '/inc/menu.php'; // Setup menu 
require VOXY_PATH . '/inc/cpt.php'; // Setup CPT 
require VOXY_PATH . '/inc/metabox.php'; // Registed custom metaboxes 
require VOXY_PATH . '/inc/shortcode.php'; // All shortcode 




function add_normalize_CSS()
{
    // Enqueue your custom CSS
    wp_enqueue_style('main-style', VOXY_URL . '/style.css', array(), VOXY_VERSION);

    // If is single Video page than load video js and CSS
    if (is_singular('video') || (is_singular() && get_post_type() === 'video')) {
        wp_enqueue_style('plyr-style', VOXY_URL . '/assets/css//plyr.css', array(), VOXY_VERSION);
        wp_enqueue_script('plyr-js', VOXY_URL . '/assets/js//plyr.js', array('jquery'), '1.0', true);
    }
    wp_enqueue_script('app-js', VOXY_URL . '/assets/js//app.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'add_normalize_CSS');
