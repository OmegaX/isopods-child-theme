<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$wysiwyg   = get_sub_field( 'wysiwyg' );
$shortcode = get_sub_field( 'form_shortcode' );
?>

<section class="contact">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="contact__row">

			<div class="contact__col-wysiwyg">	
				<?php echo wp_kses_post( $wysiwyg ); ?>
			</div>

			<div class="contact__col-form">

				<div class="form-inner">
					<h3><?php esc_html_e( 'Contact Form', 'isopods-child' ); ?></h3>
					<?php do_shortcode( $shortcode ); ?>
				</div>

			</div>

		</div>

	</div>

</section>
