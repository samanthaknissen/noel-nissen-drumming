<?php get_header(); ?>
    <body <?php body_class(); ?>>
        <?php

        include(get_template_directory() . '/nav.php');
        include(get_template_directory() . '/introduction.php');


// Update to pull in new posts from work when that section is finalized

        // if ( have_posts() ) {
        //     while ( have_posts() ) {
        //         the_post();
        //         the_title( '<h3>', '</h3>' );
        //         the_content();
        //     }
        // }
        wp_footer();

        include(get_template_directory() . '/footer.php');

        ?>
    </body>
</html>
