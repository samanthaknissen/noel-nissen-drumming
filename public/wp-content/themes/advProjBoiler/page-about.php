<?php get_header(); ?>
    <body <?php body_class(); ?>>
        <?php

        include(get_template_directory() . '/nav.php');

        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                the_post_thumbnail();
                echo '<div class="caption">' . get_post(get_post_thumbnail_id())->post_excerpt . '</div>';
                the_title( '<h3>', '</h3>' );
                the_content();
            }
        }

        wp_footer();

        include(get_template_directory() . '/footer.php');

        ?>
    </body>
</html>
