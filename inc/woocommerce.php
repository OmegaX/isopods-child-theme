<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * First unhook the WooCommerce wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Then hook in your own functions to display the wrappers your theme requires
 */
add_action( 'woocommerce_before_main_content', 'ds_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'ds_woocommerce_wrapper_end', 10 );

if ( ! function_exists( 'ds_woocommerce_wrapper_start' ) ) {
  function ds_woocommerce_wrapper_start() {
	$container = get_theme_mod( 'understrap_container_type' );
	$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

	echo '<div class="wrapper wrapper--woocommerce" id="woocommerce-wrapper">';
	echo '<div class="' . esc_attr( $container ) . '" id="content" tabindex="-1">';
	echo '<div class="grid grid--' . $sidebar_pos . '">';
	if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos) {
		get_template_part( 'sidebar-templates/sidebar', 'left' );
	}
	echo '<main class="grid__col grid__col--woo" id="main">';
  }
}

if ( ! function_exists( 'ds_woocommerce_wrapper_end' ) ) {
	function ds_woocommerce_wrapper_end() {
		echo '</main><!-- #main -->';
		if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos) {
			get_template_part( 'sidebar-templates/sidebar', 'right' );
		}
		echo '</div><!-- .grid -->';
		echo '</div><!-- .container end -->';
		echo '</div><!-- .wrapper end -->';
	}
}

add_action( 'after_setup_theme', 'ds_woocommerce_support' );
if ( ! function_exists( 'ds_woocommerce_support' ) ) {
	/**
	.* Declares WooCommerce theme support.
	.*/
	function ds_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add New Woocommerce 3.0.0 Product Gallery support.
		remove_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		remove_theme_support( 'wc-product-gallery-slider' );

		// hook in and customizer form fields.
		// add_filter( 'woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3 );
	}
}

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'ds_woocommerce_remove_breadcrumbs' );
if ( ! function_exists( 'ds_woocommerce_remove_breadcrumbs' ) ) {
	function ds_woocommerce_remove_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}

// account navigation
add_action( 'woocommerce_before_account_navigation', 'ds_action_woocommerce_before_account_navigation', 10, 0 );
if ( ! function_exists( 'ds_action_woocommerce_before_account_navigation' ) ) {
	function ds_action_woocommerce_before_account_navigation(  ) {
		echo '<div class="account__nav">';
		echo '<h4>Members Menu</h4>';
	};
}
add_action( 'woocommerce_after_account_navigation', 'ds_action_woocommerce_after_account_navigation', 10, 0 );
if ( ! function_exists( 'ds_action_woocommerce_after_account_navigation' ) ) {
	function ds_action_woocommerce_after_account_navigation(  ) {
	  echo '</div>';
	};
}

add_action( 'woocommerce_before_cart', 'ds_action_woocommerce_before_cart', 10, 0 );
if ( ! function_exists( 'ds_action_woocommerce_before_before_cart' ) ) {

	function ds_action_woocommerce_before_cart(  ) {
	  echo '<div class="woocommerce-cart__grid">';
	};
}

add_action( 'woocommerce_after_cart', 'ds_action_woocommerce_after_cart', 10, 0 );
if ( ! function_exists( 'ds_action_woocommerce_after_cart' ) ) {
	function ds_action_woocommerce_after_cart(  ) {
	  echo '</div>';
	};
}
