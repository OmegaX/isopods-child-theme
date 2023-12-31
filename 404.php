<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper wrapper--404" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="content-area" id="primary">

			<main class="site-main" id="main">

				<section class="error-404 not-found">

					<header class="page-header">

						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h1>

					</header><!-- .page-header -->

					<div class="page-content">

						<p><?php esc_html_e( 'It looks like nothing was found here.', 'understrap' ); ?></p>
					</div>

				</section><!-- .error-404 -->

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php get_footer(); ?>
