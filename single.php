<?php
/**
 * The template for displaying all single posts.
 *
 * @package isopods-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper wrapper--single" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<?php get_template_part( 'loop-templates/content', 'single' ); ?>

				<?php understrap_post_nav(); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>
