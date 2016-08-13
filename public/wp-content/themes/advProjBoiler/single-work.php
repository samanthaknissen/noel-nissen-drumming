<?php get_header(); ?>
<body <?php body_class(); ?>>

  <?php

  include(get_template_directory() . '/nav.php');

  ?>

  <?php while ( have_posts() ) : the_post(); ?>

   <?php the_post_thumbnail(); ?>
   <?php
   echo '<div class="caption">' . get_post(get_post_thumbnail_id())->post_excerpt . '</div>';
   ?>
   <h1><?php the_title(); ?></h1>
   <?php the_content(); ?>

   <?php

   wp_footer();

   include(get_template_directory() . '/footer.php');

   ?>

<?php endwhile; ?>
</body>
