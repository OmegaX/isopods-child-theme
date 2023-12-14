<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$ds_includes = array(
	'/menus.php',
	'/custom.php',
	'/enqueue.php',
	'/filters.php',
	'/options.php',
	'/shortcodes.php',
	'/woocommerce.php'
);

foreach ( $ds_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
