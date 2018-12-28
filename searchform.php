<?php
/**
 *
 * The search-form template.
 *
 * @package 	Codexin
 * @subpackage 	Templates
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}
?>

<form role="search" method="get" class="input-group" action="<?php echo esc_url_raw( home_url( '/' ) ); ?>">
	<label class="sr-only"><?php esc_html_e( 'Search', 'powerpro' ); ?></label>
	<input type="search" class="form-control" placeholder="<?php esc_html_e( 'Search ...', 'powerpro' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="Search" />
	<input type="submit" value="search">
</form>
