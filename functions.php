<?php
  require_once('core/opentrace.php');

  /* Theme Styles */

  function theme_styles() {

      wp_register_style( 'opentrace-main', get_template_directory_uri() . '/css/main.css', false, filemtime(dirname(__FILE__) . '/css/main.css') );
      wp_enqueue_style( 'opentrace-main' );

      global $wp_styles; /* call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way */

      wp_register_style( 'opentrace-ie', get_template_directory_uri() . '/css/ie.css', false, filemtime(dirname(__FILE__) . '/css/ie.css') );
      $wp_styles->add_data( 'opentrace-ie', 'conditional', 'lt IE 9' );
      wp_enqueue_style( 'opentrace-ie' );

  }

  add_action( 'wp_enqueue_scripts', 'theme_styles' );

  /* Theme JavaScript */

  function theme_js() {
    wp_deregister_script('jquery');
	// wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"), false, '1.3.2');
	// wp_enqueue_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js', false, false, false );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', false, false, false );

    wp_register_script( 'opentrace-main-min', get_template_directory_uri() . '/js/main.min.js', array('jquery'), filemtime(dirname(__FILE__) . '/js/compiled/main.min.js'), true );

    wp_enqueue_script( 'opentrace-main-min' );
  }

  add_action( 'wp_enqueue_scripts', 'theme_js' );

  /* Custom Menus */

  add_theme_support( 'menus' );

  register_nav_menus(
    array(
      'main-nav' => __( 'Main Nav', 'opentrace' )   // main nav in header
    )
  );

  function opentrace_main_nav() {
  	// display the wp3 menu if available
  	wp_nav_menu(array(
  		'container' => false, // remove nav container
  		'container_class' => '', // class of container (should you choose to use it)
  		'menu' => __( 'Main Nav', 'opentrace' ), // nav name
  		'menu_class' => 'nav navbar-nav', // adding custom nav class
  		'theme_location' => 'main-nav', // where it's located in the theme
  		'before' => '', // before the menu
  		'after' => '', // after the menu
  		'link_before' => '', // before each link
  		'link_after' => '', // after each link
  		'depth' => 0    // fallback function
  	));
  } /* end opentrace main nav */
?>
