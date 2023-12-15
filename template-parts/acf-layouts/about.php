<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="about">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<?php
			while ( have_rows( 'about' ) ) :
				the_row();
				$svg     = get_sub_field( 'svg' );
				$text    = get_sub_field( 'text' );
				$heading = get_sub_field( 'heading' );
				?>

				<div class="col">

					<div class="about__svg">
						<?php echo wp_get_attachment_image( $svg, 'medium' ); ?>
					</div>

					<h3 class="about__heading"><?php echo esc_html( $heading ); ?></h3>

					<div class="about__text">
						<?php echo $text; ?>
					</div>

				</div>

			<?php endwhile; ?>

		</div>

	</div>

</section>
