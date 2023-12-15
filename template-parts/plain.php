<?php

/**
 * The template for the plain hero
 *
 * @package isopods-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$query     = get_queried_object();
$container = get_theme_mod( 'understrap_container_type' ); ?>

<?php
while ( have_rows( 'plain', $query->ID ) ) :
	the_row();
	$heading = get_sub_field( 'heading' );
	?>

	<div class="hero-plain">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="hero-plain__inner">

				<h2><?php echo $heading ? esc_html( $heading ) : $query->post_title; ?></h2>

			</div>

		</div>

	</div>

<?php endwhile; ?>
