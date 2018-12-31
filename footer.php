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
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$codexin_cpr    = codexin_get_option( 'cx_enable_copyright' );
$copyright_text = codexin_get_option( 'footer_copy_text' );
$to_top 		= codexin_get_option( 'cx_enable_totop' );
$footer_layout	= codexin_get_option( 'footer_layout_setting' );

$column_count = 4;

if ( 'two' === $footer_layout ) {
	$column_count = 2;
	$footer_column = 12 / $column_count;
} elseif ( 'three' === $footer_layout ) {
	$column_count = 3;
	$footer_column = 12 / $column_count;
} elseif ( 'four' === $footer_layout ) {
	$column_count = 4;
	$footer_column = 2;
} elseif ( 'five' === $footer_layout ) {
	$column_count = 5;
	$footer_column = 2;
} else {
	$column_count = 4;
	$footer_column = 12 / $column_count;
}// End if().

?>
		<!-- Start of Footer -->
		<footer id="colophon">
			<div class="footer-widgets-area">
				<div class="container">
					<div class="row">
						<?php
						for ( $i = 1; $i <= $column_count ; $i++ ) {
							if ( 'one' === $footer_layout ) {
								$footer_column = 3;
							} elseif ( 1 === $i ) {
								if ( ( 4 === $column_count ) || ( 5 === $column_count ) ) {
									$footer_column = 4;
								}
							} else {
								if ( ( 4 === $column_count ) || ( 5 === $column_count ) ) {
									$footer_column = 2;
								}
							}

							if ( ( 'one' !== $footer_layout ) && ( 4 === $i ) ) {
								if ( 4 === $column_count ) {
									$footer_column = 4;
								}
							}
							echo '<div id="footer-col-' . esc_attr( $i ) . '" class="footer-column col-12 col-sm-12 col-md-6 col-lg-' . esc_attr( $footer_column ) . '">';
								dynamic_sidebar( 'codexin-footer-col-' . esc_attr( $i ) );
							echo '</div>';

						}  // End for().
						?>
					</div>
				</div>
			</div> <!-- end of footer-widgets-area -->

			<?php if ( $codexin_cpr ) { ?>
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
			<?php }  // End if(). ?>
		</footer>
		<!-- End of Footer -->
		
		<?php
		if ( $to_top ) { ?>
			<!-- Go to Top Button at right bottom of the window screen -->
			<div id="to-top">
				<i class="fa fa-angle-up"></i><i class="fa fa-angle-double-up"></i>
			</div>
			<!-- Go to Top Button finished-->
		<?php
		} // End if(). ?>
	</div>
	<!-- End of Whole Site Wrapper -->

	<?php wp_footer(); ?>
</body>
</html>
