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

        <div class="single-post-wrap container">
            <div class="voxy-sidebar">
                This is sidebar
            </div>
            <div class="voxy-content">
                <video id="player" controls crossorigin playsinline poster="<?php echo esc_attr($thumbnail_url); ?>">
                    <source src="<?php echo esc_attr($video_url); ?>" type="video/mp4">
                </video>
                <br />
                <br />
                <br />
                <?php echo do_shortcode('[video_list]'); ?>
            </div>

        </div>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>