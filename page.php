<?php
/**
 * The template for displaying all pages.
 *
 * @package isopods-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="grid grid--<?php echo $sidebar_pos; ?>">

			<?php if ( 'left' === $sidebar_pos ) : ?>

				<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<?php endif; ?>

			<main class="grid__col grid__col--site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<?php if ( 'right' === $sidebar_pos ) : ?>

				<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

			<?php endif; ?>
		</div><!-- .grid -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
