<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$products  = get_sub_field( 'products' );
$heading   = get_sub_field( 'heading' );
?>

<section class="product-callout">

	<div class="<?php echo esc_attr( $container ); ?>">

		<h2><?php esc_html_e( $heading ); ?></h2>

		<div class="product-callout__grid ">

			<?php
			while ( have_rows( 'products' ) ) :
				the_row();
				$wp_post    = get_sub_field( 'product' );
				$heading    = get_sub_field( 'heading' );
				$subheading = get_sub_field( 'subheading' );
				$product    = wc_get_product( $wp_post->ID );
				?>
				<a class="product-callout__link" href="<?php echo $product->get_permalink(); ?>">
					<figure class="product-callout__img-wrap">
						<?php echo $product->get_image(); ?>
					</figure>
					<div class="product-callout__heading-wrap">
						<h4><?php esc_html_e( $heading ); ?></h4>
						<h5><?php esc_html_e( $subheading ); ?></h5>
					</div>
				</a>

			<?php endwhile; ?>

		</div>

	</div>

</section>
