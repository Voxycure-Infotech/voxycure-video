<div class="voxy-video-container container">
    <?php if (!empty($title)) : ?>
        <div class="title">
            <h3><?php echo esc_html($title); ?></h3>
        </div>
    <?php endif; ?>
    <div class="voxy-video-wrap">
        <?php if (!empty($videos)) : ?>
            <?php foreach ($videos as $video) : ?>
                <div class="voxy-video">
                    <a class="" href="<?php echo get_permalink($video->ID); ?>">
                        <div class="thumbnail">
                            <img src="<?php echo get_the_post_thumbnail_url($video->ID); ?>" />
                        </div>
                        <div class="video-title">
                            <h4><?php echo get_the_title($video->ID); ?></h4>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>