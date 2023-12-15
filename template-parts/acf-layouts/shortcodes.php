<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$heading   = get_sub_field( 'heading' );
$shortcode = get_sub_field( 'shortcode' );
?>

<section class="shortcodes">

	<div class="<?php echo esc_attr( $container ); ?>">

		<?php if ( $heading ) : ?>
			<h2><?php esc_html_e( $heading ); ?></h2>
		<?php endif; ?>

		<?php echo do_shortcode( $shortcode ); ?>

	</div>

</section>
