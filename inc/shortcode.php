<?php

if (!defined('ABSPATH'))  exit; // Exit if accessed directly

/**
 * Load all shortcode
 */
if (!class_exists('VOXY_SHORTCODE')) {
    class VOXY_SHORTCODE
    {

        /**
         * Init All shortcode
         */
        public function __construct()
        {
            add_shortcode('video_list', [$this, 'video_list']);
        }

        /**
         * List all the videos
         */
        public function video_list($atts)
        {
            ob_start();

            $args = array(
                'post_type' => 'video',
                'post_status' => 'publish',
                'posts_per_page' => 10
            );

            $videos_obj = new WP_Query($args);

            $title = $atts['title'] ?? '';
            $videos = $videos_obj->posts ?? '';
            // echo '<pre>';
            // print_r($videos);
            // echo '</pre>';

            include VOXY_PATH . '/templates/video/list.php';

            return ob_get_clean();
        }
    }

    new VOXY_SHORTCODE();
}
