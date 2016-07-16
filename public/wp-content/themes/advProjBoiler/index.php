<?php get_header(); ?>
    <body>
        <?php

        include(get_template_directory() . '/nav.php');

        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                the_title( '<h3>', '</h3>' );
                the_content();
            }
        }
        wp_footer();
        ?>
    </body>
</html>
