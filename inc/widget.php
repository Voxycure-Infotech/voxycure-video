<?php

if (!defined('ABSPATH'))  exit; // Exit if accessed directly

/**
 * All menu functionaliy
 */
if (!class_exists('VOXY_WIDGET')) {
    class VOXY_WIDGET
    {

        /**
         * Init menu
         */
        public function __construct()
        {
            add_action('widgets_init', [$this, 'widgets_init']);
        }

        /**
         * Register widgets
         */
        public function widgets_init()
        {
            if (function_exists('register_sidebar')) {
                register_sidebar(array(
                    'name' => __('Sidebar', 'voxy-video'),
                    'id' => 'sidebar-1',
                    'description' => __('Add widgets here to appear in the sidebar.', 'voxy-video'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widget-title">',
                    'after_title' => '</h3>',
                ));

                register_widget('videos_terms_widget');
            }
        }
    }

    new VOXY_WIDGET();
}

class videos_terms_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'videos_terms_widget',
            __('Videos Categories', 'voxy-video'),
            array('description' => __('Display a list of Videos Categories', 'voxy-video'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        $terms = get_terms(array(
            'taxonomy' => 'video_category', // Replace with the actual taxonomy slug
            'hide_empty' => true,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            echo '<ul class="widget-items-list">';
            foreach ($terms as $term) {
                $active_class = is_tax('video_category', $term) ? 'active' : ''; // Check if the term matches the current category
                echo '<li class="' . $active_class . '" ><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
            }
            echo '</ul>';
        }

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'voxy-video'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
