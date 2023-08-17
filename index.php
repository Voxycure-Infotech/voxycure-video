<?php
get_header(); // Call the theme’s header.php file.

?>
<main id="main-content" class="site-main">
    <div class="container">
        <?php
        if (is_search()) {
            echo 'THIS IS THE SEARCH PAGE';
        }

        /**
         * For archive page
         */
        if (is_archive()) {
            $term_obj = get_queried_object();
            $term_id = $term_obj->term_id ?? '';
            $taxonomy = $term_obj->taxonomy ?? '';
            include VOXY_PATH . '/templates/archive.php'; // Load archive page
        }
        ?>
    </div>
</main>
<?php

// End of “The Loop”
get_footer(); // Call the theme’s footer.php file.
