<?php
/**
 * Template Name: Page - Home Page
 *
 * @package Codexin
 * @subpackage Template
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

get_header(); ?>

<!-- Start of Main Content Wrapper -->
<div id="content" class="main-content-wrapper">
	<div id="home">
		<main id="primary" class="site-main">
			<?php 
			if ( have_posts() ) { 

				// Start the loop
				while ( have_posts() ) {
					the_post();

					// Load the page content template
					get_template_part( 'template-parts/page/content', 'page' );
				}
			} else { 
				// No posts to display
			}
			?>
		</main> <!-- end of #primary -->
	</div> <!-- end of #home -->
</div>
<!-- End of Main Content Wrapper -->

<?php get_footer() ?>