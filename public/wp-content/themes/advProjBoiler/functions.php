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
    create_work_post_type();
  }

// Homepage

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
            'menu_position' => 5,
          )
        );
      }



// Work pages

function create_work_post_type() {
  register_post_type( 'work',
        array(
          'labels' => array(
            'name' => __( 'Works' ),
            'singular_name' => __( 'Work' ),
            'menu_name'          => __( 'Works' ),
        		'name_admin_bar'     => __( 'Works' ),
        		'add_new'            => __( 'Add New', 'work' ),
        		'add_new_item'       => __( 'Add New Work' ),
        		'new_item'           => __( 'New Work' ),
        		'edit_item'          => __( 'Edit Work' ),
        		'view_item'          => __( 'View Work' ),
        		'all_items'          => __( 'All Works' ),
        		'search_items'       => __( 'Search Works' ),
        		'parent_item_colon'  => __( 'Parent Works:' ),
        		'not_found'          => __( 'No works found.' ),
        		'not_found_in_trash' => __( 'No works found in Trash.' )
          ),
          'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
          'public' => true,
          'has_archive' => 'Work',
          'menu_position' => 5,
        )
      );
    }



// Adding post thumbnails, removing inline styles

  add_theme_support( 'post-thumbnails' );

  add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );

  function remove_width_attribute( $html ) {
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return $html;
}


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

    //Page Slug Body Class
    function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_name;
    }
    return $classes;
    }
    add_filter( 'body_class', 'add_slug_body_class' );

?>
