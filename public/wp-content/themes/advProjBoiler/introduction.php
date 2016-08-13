<?php
    $args = array( 'post_type' => 'introduction', 'posts_per_page' => 1 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    echo '<div class="entry-content">';
    the_post_thumbnail();
    echo '<div class="caption">' . get_post(get_post_thumbnail_id())->post_excerpt . '</div>';
    the_content();
    echo '</div>';
    endwhile;

 ?>
