<?php
/**
 * Template part for displaying a message that posts cannot be found
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

<article>
	<h2><?php esc_html_e( 'Sorry, nothing found.', 'powerpro' ) ?></h2>
	<p><?php esc_html_e( 'Please use the menu above to locate what you are searching for. Or you can try searching with a keyword below:', 'powerpro' ) ?></p>
	<?php get_search_form(); ?>
</article> <!-- end of #post-## -->
