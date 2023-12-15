<?php
/**
 * The template for the navbar.
 *
 * @package isopods-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

<nav class="navbar">

	<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container_class' => '',
			'container_id'    => 'navbarDropdown',
			'menu_class'      => 'navbar-nav',
			'fallback_cb'     => '',
			'menu_id'         => 'main-menu',
			'depth'           => 2,
			'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
		)
	);
	?>
	
</nav><!-- .navbar -->
