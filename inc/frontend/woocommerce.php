<?php
/**
 * Woocommerce Compatibility File.
 *
 * @package     Codexin
 * @subpackage  Core
 * @since       1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * First unhook the WooCommerce wrappers.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
 * Then hook in our functions to display the wrappers theme requires.
 */
add_action('woocommerce_before_main_content', 'codexin_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'codexin_woocommerce_wrapper_end', 10);

if ( ! function_exists( 'codexin_woocommerce_wrapper_start' ) ) {
	/**
	 * Starting wrapper for woocommerce for PowerPro
	 *
	 * @since   v1.0
	 */
	function codexin_woocommerce_wrapper_start() {
	?>
		<div id="content" class="main-content-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12">
						<main id="primary" class="site-main">
	<?php
	}
}

if ( ! function_exists( 'codexin_woocommerce_wrapper_end' ) ) {
	/**
	 * Ending wrapper for woocommerce for PowerPro
	 *
	 * @since   v1.0
	 */
	function codexin_woocommerce_wrapper_end() {
	?>
						</div> <!-- end of #primary -->
					</div> <!-- end of col -->
				</div> <!-- end of row -->
			</div> <!-- end of container -->
		</div> <!-- End of Main Content Wrapper -->
	<?php
	}
}

/**
 * Unhooking woocomerce sidebar.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * Unhooking woocomerce breadcrumb.
 */
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

/**
 * Hiding woocomerce shop title.
 */
add_filter( 'woocommerce_show_page_title' , 'codexin_hide_woocomerce_page_title' );
if ( ! function_exists( 'codexin_hide_woocomerce_page_title' ) ) {
	/**
	 * Removing woocomerce shop title
	 *
	 * @since   v1.0
	 */
	function codexin_hide_woocomerce_page_title() {
	    return false;
	}
}
