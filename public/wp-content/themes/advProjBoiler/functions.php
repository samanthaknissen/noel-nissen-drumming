<?php

  function themeCSS() {

    wp_enqueue_style('style', get_template_directory_uri() . '/css/css.css');

  }


  function themeJS() {

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-custom.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.min.js', array(), false, true);

  }

  // Custom post type code

  add_action( 'init', 'create_post_types' );
  function create_post_types() {
    create_introduction_post_type();
    create_about_post_type();
  }

  function create_introduction_post_type() {
    register_post_type( 'introduction',
          array(
            'labels' => array(
              'name' => __( 'Introduction' ),
              'singular_name' => __( 'Introduction' )
            ),
            'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
            'public' => true,
            'has_archive' => true,
          )
        );
      }

// So do I need to do this for every page I want? Do I then just create the php file, calling this custom post type into it?

  function create_about_post_type() {
    register_post_type( 'about',
          array(
            'labels' => array(
              'name' => __( 'About' ),
              'singular_name' => __( 'About' )
            ),
            'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
            'public' => true,
            'has_archive' => true,
          )
        );
      }

// Adding custom post type to query... do I need this? It was in a link you sent me, but my homepage is calling in the custom post type without it.

// add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

// function add_my_post_types_to_query( $query ) {
//   if ( is_home() && $query->is_main_query() )
//     $query->set( 'post_type', array( 'introduction' ) );
//   return $query;
// }

// Adding post thumbnails

  add_theme_support( 'post-thumbnails' );


// Code from book, not sure if I need to keep

  function nn_filter_wp_title( $currenttitle, $sep, $seplocal ) {
    $site_name = get_bloginfo( 'name' );
    $full_title = $site_name . $currenttitle;

    if ( is_front_page() || is_home() ) {
      $site_desc = get_bloginfo(' description' );
      $full_title .= ' ' . $sep. ' ' . $site_desc;
    }
    return $full_title;
  }

// Code from Robert

  add_action( 'wp_enqueue_scripts', 'themeCSS' );
  add_action( 'wp_enqueue_scripts', 'themeJS' );
  add_filter( 'wp_title', 'nn_filter_wp_title', 10, 3 );

// Menus... me trying to add a footer menu. Is this all I need to do?

  register_nav_menus( array(
    'main' => 'Main Navigation Menu',
    'footer_menu' => 'Footer Menu',
    ) );



?>
