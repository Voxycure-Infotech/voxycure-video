<?php

/**
 * The template for displaying the video
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();


$post_id = get_the_ID();
$video_url = get_post_meta($post_id, 'video_url', true);
$thumbnail_url = get_the_post_thumbnail_url($post_id);

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="content-with-sidebar container">
            <div class="voxy-sidebar">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div>
            <div class="voxy-content">
                <div class="single-video-container">
                    <video id="player" controls playsinline poster="<?php echo esc_attr($thumbnail_url); ?>">
                        <source src="<?php echo esc_attr($video_url); ?>" type="video/mp4">
                    </video>
                </div>
                <?php echo do_shortcode('[post_list type="video" title="More Videos"]'); ?>
            </div>

        </div>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>