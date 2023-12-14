<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}
?>

<div class="grid__col grid__col--sidebar" id="left-sidebar" role="complementary">
	<?php dynamic_sidebar( 'left-sidebar' ); ?>
</div><!-- #left-sidebar -->
