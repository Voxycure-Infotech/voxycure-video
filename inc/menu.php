<?php

if (!defined('ABSPATH'))  exit; // Exit if accessed directly

/**
 * All menu functionaliy
 */
if (!class_exists('VOXY_MENU')) {
    class VOXY_MENU
    {

        /**
         * Init menu
         */
        public function __construct()
        {
            add_action('after_setup_theme', [$this, 'register_menu']);
        }

        /**
         * Register all menus
         */
        public function register_menu()
        {
            register_nav_menus(
                array(
                    'primary-menu' => __('Primary Menu', 'voxy-video'),
                    'footer-menu-1' => __('Footer Menu', 'voxy-video'),
                )
            );
        }
    }

    new VOXY_MENU();
}
