<?php
/**
 * Backward compatible functionality
 *
 * Prevents theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

/**
 * Prevent switching to PowerPro on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since v1.0
 */
function codexin_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'codexin_upgrade_notice' );
}
add_action( 'after_switch_theme', 'codexin_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * PowerPro on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 * @since v1.0
 */
function codexin_upgrade_notice() {
	$message = sprintf( esc_html__( 'PowerPro requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'powerpro' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 * @since v1.0
 */
function powerpro_customizer_error() {
	wp_die(
		sprintf(
			esc_html__( 'PowerPro requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'powerpro' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'powerpro_customizer_error' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 * 
 * @global string $wp_version WordPress version.
 * @since v1.0
 */
function powerpro_preview_error() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Twenty Nineteen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'powerpro' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'powerpro_preview_error' );