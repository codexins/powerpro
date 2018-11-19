<?php

/**
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #whole div and all content after.
 *
 * @package 	Codexin
 * @subpackage 	Templates
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

$codexin_cpr    = codexin_get_option( 'cx_enable_copyright' );
$copyright_text = codexin_get_option( 'footer_copy_text' );
$to_top 		= codexin_get_option( 'cx_enable_totop' );

?>
		<!-- Start of Footer -->
		<footer id="colophon">
			<div class="footer-widgets-area">
				<div class="container">
					<div class="row">
						<div id="footer_col_1" class="col-12 col-sm-12 col-md-6 col-lg-3">
							<?php ( is_active_sidebar('codexin-footer-col-1') ) ? dynamic_sidebar('codexin-footer-col-1') : ''; ?>
						</div>
						<div id="footer_col_2" class="col-12 col-sm-12 col-md-6 col-lg-3">
							<?php ( is_active_sidebar('codexin-footer-col-2') ) ? dynamic_sidebar('codexin-footer-col-2') : ''; ?>
						</div>
						<div id="footer_col_3" class="col-12 col-sm-12 col-md-6 col-lg-3">
							<?php ( is_active_sidebar('codexin-footer-col-3') ) ? dynamic_sidebar('codexin-footer-col-3') : ''; ?>
						</div>
						<div id="footer_col_4" class="col-12 col-sm-12 col-md-6 col-lg-3">
							<?php ( is_active_sidebar('codexin-footer-col-4') ) ? dynamic_sidebar('codexin-footer-col-4') : ''; ?>
						</div>
					</div>
				</div>
			</div> <!-- end of footer-widgets-area -->

			<?php if( $codexin_cpr ) { ?>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<p class="copyright-legal">
									<?php echo html_entity_decode( $copyright_text ); ?>
								</p>
							</div>
						</div>
					</div>
				</div> <!-- end of footer-copyright -->
			<?php } ?>
		</footer>
		<!-- End of Footer -->
		
		<?php 
	    if( $to_top ) { ?>
	    	<!-- Go to Top Button at right bottom of the window screen -->
	        <div id="to_top">
		        <i class="fa fa-chevron-up"></i>
		    </div>
		    <!-- Go to Top Button finished-->
	    <?php } ?>
	</div>
	<!-- End of Whole Site Wrapper -->

	<?php wp_footer() ?>
</body>
</html>