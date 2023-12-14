<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package isopods-child 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<footer class="footer" id="colophon">

	<div class="<?php echo esc_attr( $container ); ?>">
		
		<div class="footer__row"> 
			<div class="footer__col footer__col--left">

				<a class="footer__credit" href="https://www.dougsabiston.com" rel="noopener" target="_blank" title="Visit Doug Sabiston's website"><span>Website</span><span>Doug Sabiston</span></a>

			</div>

			<div class="footer__col footer__col--center">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo__link" rel="home" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
					<?php echo load_inline_svg( 'isopod.svg' ); ?>
				</a>

				<h5>ISOPODS.CA</h5>

				<p class="footer__copyright">&copy; <?php echo date("Y"); ?>
			</div>

			<div class="footer__col footer__col--right">

			  <?php wp_nav_menu(
				array(
				'theme_location'  => 'footer-1',
				'menu_class'      => 'navbar-nav',
				'container_class' => 'footer__nav-main',
				'fallback_cb'     => '',
				'menu_id'         => 'footer-main',
				'depth'           => 1,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			  ); ?>

			<?php wp_nav_menu(
				array(
				'theme_location'  => 'footer-2',
				'menu_class'      => 'navbar-nav',
				'container_class' => 'footer__nav-legal',
				'fallback_cb'     => '',
				'menu_id'         => 'legal-footer',
				'depth'           => 1,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>

			</div>

		</div>

	</div>

	<?php echo load_inline_svg('/grass.svg'); ?>
	
</footer><!-- #colophon end -->

</div><!-- .site end -->

<?php wp_footer(); ?>
