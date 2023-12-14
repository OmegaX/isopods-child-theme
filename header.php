<?php
/**
 * The header for the isopods child theme.
 *
 * @package isopods-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$page_id     = get_queried_object_id();

$hero_type   = get_field( 'hero_type' );
$hero_height = get_field( 'hero_height' );

$tagline_1   = get_field( 'tagline_1', 'options' );
$tagline_2   = get_field( 'tagline_2', 'options' );
$modal_title = get_field( 'modal_title', 'options' );
$modal_sc    = get_field( 'modal_sc', 'options' );

$container   = get_theme_mod( 'understrap_container_type' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite" prefix="og: http://ogp.me/ns#">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div class="site" id="page">

	<header class="header" itemtype="http://schema.org/WPHeader">

		<div class="header__fixed">

	  		<div class="header__container ds-container <?php echo esc_attr( $container ); ?>">

				<div class="header__strip">

					<a class="header__strip-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
						<?php echo load_inline_svg( 'isopod.svg' ); ?>
					</a>

					<div class="header__strip-wrap">
						<span>I</span>
						<span>S</span>
						<span>0</span>
						<span>P</span>
						<span>O</span> 
						<span>D</span>
						<span>S</span>
					</div>

				</div>

				<header class="header__tagline">

		  			<h5><?php echo esc_html( $tagline_1 ); ?></h5>

		  			<h6><?php echo esc_html( $tagline_2 ); ?></h6>

				</header>

				<div class="header__nav" id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

					<?php get_template_part( 'template-parts/navbar' ); ?>

					<div class="header__mini-cart">

						<a href="<?php echo wc_get_page_permalink( 'cart' ); ?>">
							<i class="fas fa-shopping-cart" aria-hidden="true"></i>
							<span id="update-mini-cart"></span>
						</a>

						<div class="header__mini-cart-contents">

			  				<div id="update-mini-cart-contents">

								<?php echo wc_get_template( 'cart/mini-cart.php' ); ?>

							</div>

						</div>

					</div>

				</div>

	  		</div><!-- .container -->

		</div>

		<div class="hero hero--<?php echo ( $hero_height && 'none' !== $hero_type ) ? $hero_height : "notset"; ?>">

			<?php if ( "parallax" == $hero_type ) :
				get_template_part( 'template-parts/parallax' );
			elseif ( "plain" == $hero_type ) :
				get_template_part( 'template-parts/plain' );
			endif; ?>

		</div>

	</header>

	<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title"><?php echo esc_html( $modal_title ); ?></h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times-circle"></i>
					</button>

				</div>

				<div class="modal-body">

					<?php echo do_shortcode( $modal_sc ); ?>

				</div>

			</div>

		</div>

	</div>
