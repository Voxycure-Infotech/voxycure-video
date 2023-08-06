<?php
get_header(); // Call the theme’s header.php file.

// Start “The Loop”
if (have_posts()) : // Does our website have any posts to  display?

    while (have_posts()) : the_post(); // If the answer is “yes”, let’s run some code.

        the_content();  // Let’s display the content of our post.

    endwhile; // There  are no more posts to display, let’s shut this down.

else : // If we don’t have any posts, let’s display a custom  message below.

    _e('Sorry, no  posts matched your criteria.', 'textdomain');

endif; // OK, we can stop looking for posts now.

// End of “The Loop”

get_sidebar(); // Call the theme’s sidebar.php file.
get_footer(); // Call the theme’s footer.php file.
