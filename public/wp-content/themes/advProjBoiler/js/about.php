<!--  Am I supposed to just copy and paste over this same stuff to make this a "page"? Of course I would change some of its content.

<?php get_header(); ?>
    <body>
        <?php

        include(get_template_directory() . '/nav.php');
        include(get_template_directory() . '/introduction.php');


        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                the_title( '<h3>', '</h3>' );
                the_content();
            }
        }
        wp_footer();

        include(get_template_directory() . '/footer.php');

        ?>
    </body>
</html> -->
