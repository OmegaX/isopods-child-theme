<?php
/**
 * The template for the custom parallax.
 *
 * @package isopods-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="parallax">
	
	<?php
	while ( have_rows( 'parallax' ) ) :
		the_row();
		$bg_img = get_sub_field( 'bg_img' );
		?>

		<div class="parallax__outer-container ds-container--fluid">

			<?php if ( $bg_img ) : ?>
				<div class="parallax__data-img" data-parallax="scroll" data-image-src="<?php echo esc_url( $bg_img ); ?>" data-speed=".6">
				</div>
			<?php endif; ?>

			<div class="parallax__inner-container ds-container--fixed">

				<div id="parallax-carousel" class="parallax__carousel" data-ride="carousel">
					<div class="parallax__inner carousel-inner">
						<?php
						$i = 0;
						while ( have_rows( 'carousel' ) ) :
							the_row();
							$heading_1  = get_sub_field( 'heading_1' );
							$heading_2  = get_sub_field( 'heading_2' );
							$btn_link   = get_sub_field( 'btn_link' );
							$i++;
							?>
							<div class="parallax__item carousel-item
							<?php
							if ( $i === 1 ) {
								echo ' active';}
							?>
							">

								<div class="parallax__box">

									<header>
										<?php if ( $heading_1 ) : ?>
											<h2 class="js-pretty-br"><?php esc_html_e( $heading_1 ); ?></h2>
										<?php endif; ?>
										<?php if ( $heading_2 ) : ?>
											<h4 class="js-pretty-br"><?php esc_html_e( $heading_2 ); ?></h4>
										<?php endif; ?>
									</header>

									<?php if ( $btn_link ) : ?>
										<a class="btn btn--round" href="<?php echo esc_url( $btn_link['url'] ); ?>">
											<?php esc_html_e( $btn_link['title'] ); ?>
										</a>
									<?php endif; ?>

								</div>

							</div>

						<?php endwhile; ?>

					</div>

				</div>

			</div>

		</div>

	<?php endwhile; ?>

</div>
