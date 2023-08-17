<div class="content-with-sidebar">
    <div class="voxy-sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
    <div class="voxy-content">
        <?php echo do_shortcode('[post_list type="video" terms="' . $term_id . '" taxonomy="' . $taxonomy . '" per_page="24" title="More Videos"]'); ?>
    </div>
</div>