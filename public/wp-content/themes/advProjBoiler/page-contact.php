<?php get_header(); ?>
    <body <?php body_class(); ?>>
        <?php

        include(get_template_directory() . '/nav.php');

        if ( have_posts() ) {
            while ( have_posts() ) {
              echo '<div class="contact-wrapper">';
                the_post();
                the_title( '<h3>', '</h3>' );
                the_content();
              echo '</div">';
            }
        }

        wp_footer();

        include(get_template_directory() . '/footer.php');

        ?>
    </body>
</html>
