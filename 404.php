<?php
/**
 *
 * The template for displaying the 404 page
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
			<div class="col-12 col-sm-12 col-md-12">
				<main id="primary" class="site-main text-center">
					<article>
						<h2><?php esc_html_e( 'The page you are trying to access does not exist.', 'powerpro' ) ?></h2>
						<p><?php esc_html_e( 'Please use the menu above to locate what you are searching for. Or you can try searching with a keyword below:', 'powerpro' ) ?></p>
						<?php get_search_form(); ?>
					</article>
				</main> <!-- end of #primary -->
			</div>
		</div>
	</div> <!-- end of container -->
</div>
<!-- End of Main Content Wrapper -->

<?php get_footer() ?>
