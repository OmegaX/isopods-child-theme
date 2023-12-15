<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
* Load an inline SVG.
*
* @param string $filename The filename of the SVG you want to load.
*
* @return string The content of the SVG you want to load.
*/
if ( ! function_exists( 'load_inline_svg' ) ) {

	function load_inline_svg( $filename ) {

		// Add the path to your SVG directory inside your theme.
		$svg_path = '/assets/svgs/';

		// Check the SVG file exists
		if ( file_exists( get_stylesheet_directory() . $svg_path . $filename ) ) {
			// Load and return the contents of the file
			return file_get_contents( get_stylesheet_directory_uri() . $svg_path . $filename );
		}

		// Return a blank string if we can't find the file.
		return '';
	}
}

if ( ! function_exists( 'ds_get_theme_menu_name' ) ) {

	function ds_get_theme_menu_name( $theme_location ) {
		if ( ! $theme_location ) {
			return false;
		}
		$theme_locations = get_nav_menu_locations();
		if ( ! isset( $theme_locations[ $theme_location ] ) ) {
			return false;
		}
		$menu_obj = get_term( $theme_locations[ $theme_location ], 'nav_menu' );
		if ( ! $menu_obj ) {
			$menu_obj = false;
		}
		if ( ! isset( $menu_obj->name ) ) {
			return false;
		}
		return $menu_obj->name;
	}
}

/**
 * Display the classes for the product div.
 *
 * @param string|array           $class      One or more classes to add to the class list.
 * @param int|WP_Post|WC_Product $product_id Product ID or product object.
 */
function ds_product_class( $class = '', $product_id = null ) {
	echo esc_attr( implode( ' ', wc_get_product_class( $class, $product_id ) ) );
}
