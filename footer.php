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
$footer_layout	= codexin_get_option( 'footer_layout_setting' );

$column_count = 4;

if( $footer_layout == 'two' ) {
	$column_count = 2;
	$footer_column = 12 / $column_count;
} elseif( $footer_layout == 'three' ) {
	$column_count = 3;
	$footer_column = 12 / $column_count;
} elseif( $footer_layout == 'four' ) {
	$column_count = 4;
	$footer_column = 2;
} elseif( $footer_layout == 'five' ) {
	$column_count = 5;
	$footer_column = 2;
} // end of footer layout conditional check

?>
		<!-- Start of Footer -->
		<footer id="colophon">
			<div class="footer-widgets-area">
				<div class="container">
					<div class="row">
						<?php 
						for( $i = 1; $i <= $column_count ; $i++ ) {
							if( $i == 1 ) {
								if( ( $column_count == 4 ) || ( $column_count == 5 ) ) {
									$footer_column = 4;
								}
							} else {
								if( ( $column_count == 4 ) || ( $column_count == 5 ) ) {
									$footer_column = 2;
								}
							}

							if( $i == 4 ) {
								if( $column_count == 4 ) {
									$footer_column = 4;
								}
							}
							echo '<div id="footer_col_' . esc_attr( $i ) . '" class="footer-column col-12 col-sm-12 col-md-6 col-lg-' . esc_attr( $footer_column ) . '">';
								dynamic_sidebar( 'codexin-footer-col-'. esc_attr( $i ) );
							echo '</div>';

						}
						?>
					</div>
				</div>
			</div> <!-- end of footer-widgets-area -->

			<?php if( $codexin_cpr ) { ?>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12">
								<p class="copyright-legal">
									<?php echo wp_kses_post( $copyright_text ); ?>
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
		        <i class="fa fa-angle-up"></i><i class="fa fa-angle-double-up"></i>
		    </div>
		    <!-- Go to Top Button finished-->
	    <?php } ?>
	</div>
	<!-- End of Whole Site Wrapper -->

	<?php wp_footer() ?>
</body>
</html>