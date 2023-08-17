<?php

/**
 * Customizer settings for this theme.
 * @since Gofo 1.0
 */
if (!class_exists('voxy_Customize')) {
    /**
     * CUSTOMIZER SETTINGS
     */
    class voxy_Customize
    {

        /**
         * Register customizer options.
         *
         * @param WP_Customize_Manager $wp_customize Theme Customizer object.
         */
        public static function register($wp_customize)
        {
            /*
             * Colors
             */
            $wp_customize->add_section('colors', array(
                'title' => esc_html__('Theme Colors', 'voxy-video')
            ));

            // Font color 
            $wp_customize->add_setting('font_color', array(
                'default'    => '#FFFFFF',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'font_color',
                    array(
                        'section' => 'colors',
                        'label' => esc_html__('Font color', 'voxy-video')
                    )
                )
            );

            // Background color
            $wp_customize->add_setting('theme_bg_color', array(
                'default'    => '#121212',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'theme_bg_color',
                    array(
                        'label' => esc_html__('Background color', 'voxy-video'),
                        'section' => 'colors',
                    )
                )
            );

            // Card Background color
            $wp_customize->add_setting('card_bg_color', array(
                'default'    => '#1d1d1d',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'card_bg_color',
                    array(
                        'label' => esc_html__('Card background color', 'voxy-video'),
                        'section' => 'colors',
                    )
                )
            );

            // Border color
            $wp_customize->add_setting('border_color', array(
                'default'    => '#2f2f2f',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'border_color',
                    array(
                        'label' => esc_html__('Border color', 'voxy-video'),
                        'section' => 'colors',
                    )
                )
            );

            // Button color
            $wp_customize->add_setting('button_color', array(
                'default'    => '#03a4e9',
                'capability' => 'edit_theme_options',
            ));
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'button_color',
                    array(
                        'label' => esc_html__('Button color', 'voxy-video'),
                        'section' => 'colors',
                    )
                )
            );

            /* -----------------------------*/
            /* end Customize Settings */
            /* -----------------------------*/
        }
    }


    // Setup the Theme Customizer settings and controls.
    add_action('customize_register', array('voxy_Customize', 'register'));
}
