<?php
/**
 * Template Name: Custom Layout Blocks
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$id = get_the_ID(); ?>

<div id="acf-wrapper">

	<div class="svg-wrap">

		<?php echo load_inline_svg('/isopod.svg'); ?>

	</div>

	<div id="content" tabindex="-1">

		<main class="site-main" id="main" itemprop="mainEntity">

			<?php
			// loop through the selected ACF layouts and display the matching partial
			if ( have_rows( 'layouts', $id ) ) : ?>

				<?php while ( have_rows( 'layouts', $id ) ) : the_row();
					$layout_name = str_replace( "_","-", get_row_layout() );
					get_template_part( './template-parts/acf-layouts/' . $layout_name );
				endwhile; ?>

			<?php endif; ?>

		</main> <!-- #main -->

	</div> <!-- #content -->

</div> <!-- #page-wrapper -->

<?php get_footer(); ?>
