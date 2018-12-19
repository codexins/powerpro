<?php
/**
 * Template partial for displaying page contents
 *
 * @package 	Codexin
 * @subpackage 	Template Parts
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

?>

<div id="page-<?php the_ID(); ?>" <?php post_class( array( 'page-entry-content' ) ); ?>>
	<?php
	the_content();

	// This section is for pagination purpose for a long large page that is seperated using nextpage tags.
	$args = array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'powerpro' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'powerpro' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text">, </span>',
	);
	wp_link_pages( $args );
	?>
</div><!-- end of #page-## -->
