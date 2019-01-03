<?php
/**
 * Function definition for the required plugins.
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once 'class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'codexin_register_plugins' );

if ( ! function_exists( 'codexin_register_plugins' ) ) {
	/**
	 * Function to declare the required and recommended plugins to run the theme.
	 *
	 * @since v1.0
	 */
	function codexin_register_plugins() {

		/**
		 * Array of required plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 *
		 * @since v1.0
		 */
		$plugins = array(
			array(
				'name'          => esc_html__( 'Codexin Core', 'powerpro' ),
				'slug'          => 'codexin-core',
				'source'        => esc_url( 'https://themeitems.com/wp/plugins/codexin-core.zip' ),
				'required'      => true,
				'version'       => '1.0',
				'external_url'  => '',
			),

			array(
				'name'          => esc_html__( 'Kirki - Customizer Toolkit', 'powerpro' ),
				'slug'          => 'kirki',
				'required'      => true,
			),

			array(
				'name'          => esc_html__( 'Elementor Page Builder', 'powerpro' ),
				'slug'          => 'elementor',
				'required'      => false,
			),

			array(
				'name'          => esc_html__( 'Smart Slider 3 Lite', 'powerpro' ),
				'slug'          => 'smart-slider-3',
				'required'      => false,
			),

			array(
				'name'          => esc_html__( 'Contact Form 7', 'powerpro' ),
				'slug'          => 'contact-form-7',
				'required'      => false,
			),
		);

		$config = array(
			'id'                    => 'codexin_tgmpa',				// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path'          => '',							// Default absolute path to pre-packaged plugins.
			'menu'                  => 'tgmpa-install-plugins',		// Menu slug.
			'parent_slug'           => 'themes.php',				// Parent menu slug.
			'capability'            => 'edit_theme_options',		// Capability needed to view plugin install page
			'has_notices'           => true,						// Show admin notices or not.
			'dismissable'           => true,						// If false, a user cannot dismiss the nag message.
			'dismiss_msg'           => '',							// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic'          => false,						// Automatically activate plugins after installation or not.
			'message'               => '',							// Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
} // End if().
