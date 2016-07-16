<?php

  function themeCSS() {

    wp_enqueue_style('style', get_template_directory_uri() . '/css/css.css');

  }


  function themeJS() {

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-custom.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.min.js', array(), false, true);

  }

  function nn_filter_wp_title( $currenttitle, $sep, $seplocal ) {
    $site_name = get_bloginfo( 'name' );
    $full_title = $site_name . $currenttitle;

    if ( is_front_page() || is_home() ) {
      $site_desc = get_bloginfo(' description' );
      $full_title .= ' ' . $sep. ' ' . $site_desc;
    }
    return $full_title;
  }

  add_action( 'wp_enqueue_scripts', 'themeCSS' );
  add_action( 'wp_enqueue_scripts', 'themeJS' );
  add_filter( 'wp_title', 'nn_filter_wp_title', 10, 3 );

  register_nav_menus();

?>
