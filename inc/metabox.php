<?php

if (!defined('ABSPATH'))  exit; // Exit if accessed directly

/**
 * All menu functionaliy
 */
if (!class_exists('VOXY_METABOX')) {
    class VOXY_METABOX
    {

        /**
         * Init menu
         */
        public function __construct()
        {
            add_action('add_meta_boxes', [$this, 'add_meta_box_to_videos']);
            add_action('save_post_video', [$this,  'save_video_meta_data']);
        }

        /**
         * Added video link meta box
         */
        public function add_meta_box_to_videos()
        {
            add_meta_box(
                'video_details',                    // Unique ID of the meta box.
                __('Video Details', 'voxy-video'),  // Title of the meta box.
                [$this, 'video_details'], // Callback function to render the content of the meta box.
                'video',                            // Post type to display the meta box.
                'normal',                           // Context (where to show the meta box). Options: 'normal', 'advanced', or 'side'.
                'high'                              // Priority (order in which the meta box is displayed). Options: 'high', 'core', 'default', or 'low'.
            );
        }

        /**
         * Create Video meat Box
         */
        public function video_details($post)
        {
            // Get existing meta data if available
            $video_url = get_post_meta($post->ID, 'video_url', true);

            // Security check - Nonce
            wp_nonce_field('voxy_video_meta_box', 'voxy_video_meta_box_nonce');

            // Output the HTML for the meta box content 
            echo '<p>
                <label for="video_url">' .  __('Video URL', 'voxy-video') . ':</label>
                <input type="text" id="video_url" name="video_url" value="' . esc_attr($video_url) . '" size="100" />
            </p>';
        }


        /**
         * Save video meta data 
         */
        public function save_video_meta_data($post_id)
        {
            // Verify the nonce
            if (!isset($_POST['voxy_video_meta_box_nonce']) || !wp_verify_nonce($_POST['voxy_video_meta_box_nonce'], 'voxy_video_meta_box')) {
                return;
            }

            // Check the user's permissions
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }

            // Save the video URL meta field
            if (isset($_POST['video_url'])) {
                update_post_meta($post_id, 'video_url', sanitize_text_field($_POST['video_url']));
            }
        }
    }

    new VOXY_METABOX();
}
