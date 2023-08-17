<?php

use yidas\data\Pagination;

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
            add_shortcode('post_list', [$this, 'post_list']);
            add_shortcode('categories_list', [$this, 'categories_list']);
        }

        /**
         * List all of all posts
         */
        public function post_list($atts)
        {


            global $wp_query;
            $post_type = isset($atts['type']) ? $atts['type'] : 'post';
            $taxonomy = isset($atts['taxonomy']) ? $atts['taxonomy'] : '';
            $per_page = isset($atts['per_page']) ? $atts['per_page'] : 24;
            $paged = isset($wp_query->query['paged']) ? $wp_query->query['paged'] : 1;

            $terms = [];
            if (!empty($atts['terms'])) {
                $terms = explode(",", $atts['terms']);
            }

            $args = array(
                'post_type' => $post_type,
                'post_status' => 'publish',
                'posts_per_page' => $per_page,
                'paged' => $paged
            );

            if (!empty($terms) && !empty($taxonomy)) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'term_id',
                        'terms' => $terms,
                    ),
                );
            }

            $posts_obj = new WP_Query($args);

            $title = $atts['title'] ?? '';
            $posts = $posts_obj->posts ?? '';

            ob_start();

            echo '<div class="voxy-post-container">';
            if (!empty($title)) {
                echo ' <div class="title"><h3>' . esc_html($title) . '</h3></div>';
            }
            echo '<div class="voxy-posts-wrap">';
            if (!empty($posts)) {
                foreach ($posts as $post) {
                    $post_id = $post->ID;
                    $parmalink = get_permalink($post_id);
                    $thumbnail = get_the_post_thumbnail_url($post_id);
                    if (empty($thumbnail)) {
                        $thumbnail = VOXY_PLACEHOLDER;
                    }
                    $title =  get_the_title($post_id);
                    include VOXY_PATH . '/templates/post-item.php';
                }
            }
            echo '</div>';

            // No pagination need to Single post
            if (!is_single()) {
                // Add pagination links after the loop.
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'total' => $posts_obj->max_num_pages,
                    'current' => max(1, $paged),
                ));
                echo '</div>';
            }

            echo '</div>';

            return ob_get_clean();
        }


        /**
         * 
         */
        public function categories_list($atts)
        {

            global $wp_query;
            $taxonomy = isset($atts['taxonomy']) ? $atts['taxonomy'] : 'category';
            $per_page = isset($atts['per_page']) ? $atts['per_page'] : 24;
            $paged = isset($wp_query->query['paged']) ? $wp_query->query['paged'] : 1;

            $args = array(
                'taxonomy' => $taxonomy,
                'hide_empty' => true, // Show empty terms as well
                'number' => $per_page,
                'offset' => ($paged - 1) * $per_page,
            );

            $terms = get_terms($args);

            // Pagination
            $total_terms = wp_count_terms($taxonomy, array('hide_empty' => true));
            $total_pages = ceil($total_terms / $per_page);

            ob_start();
            echo '<div class="voxy-post-container">';
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<div class="voxy-posts-wrap">';
                foreach ($terms as $term) {
                    $term_id = $term->term_id ?? '';

                    if (empty($term_id)) return;

                    $parmalink = get_term_link($term_id);
                    $term_name = $term->name;
                    $thumbnail = get_term_meta($term_id, 'thumbnail', true);
                    if (empty($thumbnail)) {
                        $thumbnail = VOXY_PLACEHOLDER;
                    }

                    include VOXY_PATH . '/templates/term.php';
                }
                echo '</div>';
            } else {
                echo __('No result found :(', 'voxy-video');
            }

            if (!is_single() && $total_pages > 1) {
                echo '<div class="pagination">';
                echo paginate_links(array(
                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'format' => '?paged=%#%',
                    'current' => max(1, $paged),
                    'total' => $total_pages,
                ));
                echo '</div>';
            }

            echo '<div>';
            return ob_get_clean();
        }
    }

    new VOXY_SHORTCODE();
}
