<?php

  function themeCSS() {

    wp_enqueue_style('style', get_template_directory_uri() . '/css/css.css');

  }


  function themeJS() {

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-custom.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.min.js', array(), false, true);

  }

  add_action( 'wp_enqueue_scripts', 'themeCSS' );
  add_action( 'wp_enqueue_scripts', 'themeJS' );

?>
