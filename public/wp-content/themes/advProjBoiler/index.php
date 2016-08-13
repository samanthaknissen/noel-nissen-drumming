<?php get_header(); ?>
    <body <?php body_class(); ?>>
        <?php

        include(get_template_directory() . '/nav.php');
        include(get_template_directory() . '/introduction.php');

        echo '<div class="work-wrapper">';
        ?>

        <h2 class="subhead">Latest</h2>

        <?php

        $query = new WP_Query(array(
            'post_type' => 'work',
            'post_status' => 'publish'
          ));


          while ($query->have_posts()) {
            echo '<div class="work-teaser">';
            $query->the_post();
            the_post_thumbnail( 'medium_large' );
            echo "<p>";
            echo get_post_custom_values("summary")[0];
            echo "</p>";
            ?>
            <a href="<?php the_permalink(); ?>">Read more...</a>
            <?php
            echo "<br>";
            echo "</div>";
          }

          echo "</div>";


        wp_footer();

        include(get_template_directory() . '/footer.php');

        ?>
    </body>
</html>
