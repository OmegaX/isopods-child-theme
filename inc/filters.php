<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// remove woo css so we can use our own with sass
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


if ( ! function_exists( 'ds_remove_product_page_skus' ) ) {

    function ds_remove_product_page_skus( $enabled ) {
        if ( ! is_admin() && is_product() ) {
            return false;
        }

        return $enabled;
    }
}

add_filter( 'wc_product_sku_enabled', 'ds_remove_product_page_skus' );

/**
 * Change number or products per row to 4
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if ( ! function_exists( 'loop_columns' ) ) {
  function loop_columns() {
    return 4; // 4 products per row
  }
}

/**
 * Remove billing fields
 */
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_company']);
  return $fields;
}

/**
 * Change number of related products output
 */ 
// add_filter( 'woocommerce_output_related_products_args', 'ds_related_products_args', 20 );

// function ds_related_products_args( $args ) {
//     $args['posts_per_page'] = 3;
//     $args['columns'] = 3;
//     return $args;
// }

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_custom_handle_product_tabs', 98 );
function woo_custom_handle_product_tabs( $tabs ) {

    unset( $tabs['description'] );
    unset( $tabs['additional_information'] );

    return $tabs;
}

/**
 * Change text
 */
add_filter( 'gettext', 'translate_woocommerce_strings', 999, 3 );
function translate_woocommerce_strings( $translated, $text, $domain ) {

     if ( ! is_admin() && 'woocommerce' === $domain ) {

      switch ( strtolower( $translated ) ) {

        case 'proceed to checkout' :
            $translated = 'Checkout ';
            break;

        case 'checkout' :
            $translated = 'Checkout ';
            break;
      }
   }   

    return $translated;
}

/**
 * Change number of upsells output
 */
// add_filter( 'woocommerce_upsell_display_args', 'wc_change_number_related_products', 20 );

// function wc_change_number_related_products( $args ) {
 
//  $args['posts_per_page'] = 1;
//  $args['columns'] = 4; //change number of upsells here
//  return $args;
// }

/**
 * To change add to cart text on single product page
 */

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );

function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Add to Cart', 'woocommerce' );
}

/**
 * hide coupon field on checkout page
  */
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_checkout' );

function hide_coupon_field_on_checkout( $enabled ) {

    if ( is_checkout() ) {
        $enabled = false;
    }

    return $enabled;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_update_mini_cart_count' );

function woo_update_mini_cart_count( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <span id="update-mini-cart">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    
    <?php
    $fragments['#update-mini-cart'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_update_mini_cart_contents' );

function woo_update_mini_cart_contents( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <div id="update-mini-cart-contents">
        <?php echo wc_get_template( 'cart/mini-cart.php' ); ?>
    </div>
    <?php
    $fragments['#update-mini-cart-contents'] = ob_get_clean();
    return $fragments;
}