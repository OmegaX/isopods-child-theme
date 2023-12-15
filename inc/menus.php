<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'ds_understrap_child_setup' );

if ( ! function_exists( 'ds_understrap_child_setup' ) ) {
	function ds_understrap_child_setup() {
		/*
		 * Register custom menus
		 */
		register_nav_menus(
			array(
				'footer-1'   => __( 'Footer Menu 1', 'understrap-child' ),
				'footer-2'   => __( 'Footer Menu 2', 'understrap-child' ),
			)
		);
	}
}
