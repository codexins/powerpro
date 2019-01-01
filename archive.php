<?php
/**
 *
 * The template for displaying archives pages
 *
 * @package     Codexin
 * @subpackage  Templates
 * @since       1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

get_header();

$layout          	= ! empty( codexin_get_option( 'cx_blog_arc_layout' ) ) ? codexin_get_option( 'cx_blog_arc_layout' ) : 'right';
$column_lg       	= ( 'left' === $layout || 'right' === $layout ) ? '8' : '12';
$column_xl       	= ( 'left' === $layout || 'right' === $layout ) ? '9' : '12';
$sidebar_class_lg	= ( 'no' === $layout ) ? '' : '4';
$sidebar_class_xl	= ( 'no' === $layout ) ? '' : '3';
$order_class     	= ( 'left' === $layout ) ? ' order-1 order-md-1 order-lg-2' : '';
$sb_order_class  	= ( 'left' === $layout ) ? ' order-2 order-md-2 order-lg-1' : '';
$pagination 		= codexin_get_option( 'cx_blog_pagination' );
?>

<!-- Start of Main Content Wrapper -->
<div id="content" class="main-content-wrapper">
	<div class="container">
		<div class="row">
			<?php

			// Assigning Wrapper Column for primary content.
			printf(
				'<div class="col-12 col-sm-12 col-md-12 col-lg-%1$s col-xl-%2$s%3$s">',
				esc_attr( $column_lg ),
				esc_attr( $column_xl ),
				esc_attr( $order_class )
			);

			?>
				<main id="primary" class="site-main">
					<div id="post-content" class="blog-area">
						<?php
						if ( have_posts() ) {

							// Start the loop.
							while ( have_posts() ) {
								the_post();

								// Load the Post-Format-specific template for the content.
								get_template_part( 'template-parts/post/content', get_post_format() );
							}
						} else {
							// No posts to display.
							get_template_part( 'template-parts/post/content', 'none' );
						}
						?>
					</div> <!-- end of blog-area -->

					<?php
					// Rendering Pagination.
					( 'numbered' === $pagination ) ? codexin_numbered_posts_nav() : codexin_posts_nav();
					?>
				</main> <!-- end of #primary -->
			</div>

			<?php
			// Checking the need of sidebar.
			if ( 'no' !== $layout ) {
				// Assigning Wrapper Column for sidebar.
				printf(
					'<div class="col-12 col-sm-12 col-md-12 col-lg-%1$s col-xl-%2$s%3$s">',
					esc_attr( $sidebar_class_lg ),
					esc_attr( $sidebar_class_xl ),
					esc_attr( $sb_order_class )
				);
			?>
					<aside id="secondary" class="widget-area">
						<?php
						// Get active assigned sidebar.
						get_sidebar();
						?>
					</aside> <!-- end of #secondary -->
				</div>
			<?php
			} // End if().
			?>
		</div>
	</div> <!-- end of container -->
</div>
<!-- End of Main Content Wrapper -->

<?php get_footer();
