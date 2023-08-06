<?php

if (!defined('ABSPATH'))  exit; // Exit if accessed directly

/**
 * All Custom post type functionaliy
 */
if (!class_exists('VOXY_CPT')) {

    class VOXY_CPT
    {
        /**
         * Init menu
         */
        public function __construct()
        {
            add_action('init', [$this, 'register_cpt']);
            add_action('init', [$this, 'register_taxonomy']);
        }

        /**
         * Register Custom post type
         */
        public function register_cpt()
        {
            $labels = array(
                'name' => __('Videos', 'voxy-video'),
                'singular_name' => __('Video', 'voxy-video'),
                'menu_name' => __('Videos', 'voxy-video'),
                'all_items' => __('All Videos', 'voxy-video'),
                'add_new' => __('Add New', 'voxy-video'),
                'add_new_item' => __('Add New Video', 'voxy-video'),
                'edit_item' => __('Edit Video', 'voxy-video'),
                'new_item' => __('New Video', 'voxy-video'),
                'view_item' => __('View Video', 'voxy-video'),
                'search_items' => __('Search Videos', 'voxy-video'),
                'not_found' => __('No videos found', 'voxy-video'),
                'not_found_in_trash' => __('No videos found in trash', 'voxy-video'),
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_icon' => 'dashicons-video-alt2',
                'supports' => array('title', 'editor', 'thumbnail'),
                'rewrite' => array('slug' => 'video'),
                'has_archive' => true,
                'show_in_rest' => false, // Enable Gutenberg block editor support.
            );

            register_post_type('video', $args);
        }

        /**
         * Register Taxonomies
         */
        public function register_taxonomy()
        {
            $labels = array(
                'name' => __('Video categories', 'voxy-video'),
                'singular_name' => __('Video categories', 'voxy-video'),
                'search_items' => __('Search Categories', 'voxy-video'),
                'all_items' => __('All Categories', 'voxy-video'),
                'parent_item' => __('Parent Video categories', 'voxy-video'),
                'parent_item_colon' => __('Parent Video categories:', 'voxy-video'),
                'edit_item' => __('Edit Video categories', 'voxy-video'),
                'update_item' => __('Update Video categories', 'voxy-video'),
                'add_new_item' => __('Add New Video categories', 'voxy-video'),
                'new_item_name' => __('New Video categories Name', 'voxy-video'),
                'menu_name' => __('Categories', 'voxy-video'),
            );

            $args = array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'video-category'),
                'show_in_rest' => true, // Enable Gutenberg block editor support.
            );

            register_taxonomy('video_category', 'video', $args);
        }
    }

    new VOXY_CPT();
}
