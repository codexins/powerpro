<?php
/**
 * Template partial for displaying page contents
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );


if ( ! empty ( get_the_content() ) ) { ?>

	<div id="page-<?php the_ID(); ?>" <?php post_class( array( 'page-entry-content' ) ); ?>>
		<?php 
			the_content(); 

			// This section is for pagination purpose for a long large page that is seperated using nextpage tags
            $args = array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'TEXT_DOMAIN' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'TEXT_DOMAIN' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            );                 
            wp_link_pages( $args );
		 ?>
	</div><!-- end of #page-## -->

<?php
}
?>
