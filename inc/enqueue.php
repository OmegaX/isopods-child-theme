<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'wp_enqueue_scripts', 'ds_remove_scripts', 20 );

function ds_remove_scripts() {

	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}

add_action( 'wp_enqueue_scripts', 'ds_enqueue_styles' );

function ds_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/assets/css/theme.min.css', array(), $the_theme->get( 'Version' ) );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Piazzolla:wght@300;500;700&family=Secular+One&display=swap', [], null ); // null added for multiple params with php

	wp_register_script( 'aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), null, true );
	wp_enqueue_script( 'aos' );

	wp_register_script( 'bootstrapJS', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'bootstrapJS' );

	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/assets/js/theme.min.js', array('jquery'), $the_theme->get( 'Version' ), true );
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'add_child_theme_textdomain' );