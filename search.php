<?php
/**
 *
 * The template for displaying search results pages
 *
 * @package 	Codexin
 * @subpackage 	Templates
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

get_header(); ?>

<!-- Start of Main Content Wrapper -->
<div id="content" class="main-content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<main id="primary" class="site-main">
					<div class="blog-area">
						<?php
						if ( have_posts() ) {

							// Start the loop.
							while ( have_posts() ) {
								the_post();

								// Load the Post-Format-specific template for the content.
								get_template_part( 'template-parts/post/content', get_post_format() );
							}
						} else {
						?>
							<h2 class="search-title text-center">
								<?php printf( '%1$s"' . get_search_query() . '"', esc_html__( 'Nothing found for the search keyword ', 'powerpro' ) ); ?>
							</h2>
							<p><?php esc_html_e( 'Please use the menu above to locate what you are searching for. Or you can try searching with a keyword below:', 'powerpro' ) ?></p>
							<?php get_search_form();
						}
						?>
					</div> <!-- end of blog-area -->

					<?php

					// Rendering Pagination.
					codexin_posts_nav();
					?>
				</main> <!-- end of #primary -->
			</div>
		</div>
	</div> <!-- end of container -->
</div>
<!-- End of Main Content Wrapper -->

<?php get_footer();
