<?php get_header(); ?>

<main id="main-content" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php if (comments_open() || get_comments_number()) :
                    comments_template();
                endif; ?>
            </article>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>