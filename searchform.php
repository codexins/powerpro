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
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

?>

<form role="search" method="get" class="input-group" action="<?php echo esc_url_raw( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'powerpro' ); ?></label>
	<input type="search" class="form-control" placeholder="<?php esc_html_e( 'Search ...', 'powerpro' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="Search" />
	<input type="submit" value="search">
</form>