<?php
/**
 * Gutenberg: dynamic CSS building up
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_gutenberg_dynamic_css' ) ) {
	/**
	 * Function to pass dynamic css from customizer into block editor
	 *
	 * @return  string
	 * @since   v1.0
	 */
	function codexin_gutenberg_dynamic_css() {

		/**
		 * Retrieving colors from customizer.
		 */
        $text_color         = ! empty( codexin_get_option( 'cx_text_color' ) ) ? codexin_get_option( 'cx_text_color' ) : '#000';
        $primary_color      = ! empty( codexin_get_option( 'cx_primary_color' ) ) ? codexin_get_option( 'cx_primary_color' ) : '#42ad61';
        $secondary_color    = ! empty( codexin_get_option( 'cx_secondary_color' ) ) ? codexin_get_option( 'cx_secondary_color' ): '#f58025';
        $tertiary_color    	= ! empty( codexin_get_option( 'cx_tertiary_color' ) ) ? codexin_get_option( 'cx_tertiary_color' ): '#212331';
        $border_color       = ! empty( codexin_get_option( 'cx_border_color' ) ) ? codexin_get_option( 'cx_border_color' ) : '#ddd';
        $offset_color       = ! empty( codexin_get_option( 'cx_offset_color' ) ) ? codexin_get_option( 'cx_offset_color' ) : '#f6f6f6';

		/**
		 * Retrieving typography from customizer.
		 */
        if( ! empty( codexin_get_option( 'cx_body_font' ) ) ) {
        	$body_font = codexin_get_option( 'cx_body_font' );
        } else {
        	$body_font = array(
				'font-family'    => 'Source Sans Pro',
				'variant'	  	 => '400',
				'font-size'      => '16px',
				'line-height'    => '1.5',
        	);
        }

        if( ! empty( codexin_get_option( 'cx_page_title_font' ) ) ) {
        	$page_title_font = codexin_get_option( 'cx_page_title_font' );
        } else {
        	$page_title_font = array(
				'font-size'         => '34px',
				'line-height'       => '40px',
				'font-family'       => 'Oswald',
				'variant'	  	 	=> '400',
				'text-transform'    => 'uppercase',
        	);
        }

        if( ! empty( codexin_get_option( 'cx_h1_font' ) ) ) {
        	$h1_font = codexin_get_option( 'cx_h1_font' );
        } else {
        	$h1_font = array(
				'font-size'   		=> '32px',
				'font-family' 		=> 'Oswald',
				'variant'	  	 	=> '400',
				'text-transform'    => 'uppercase',
				'line-height'    	=> '1.2',
        	);
        }

        if( ! empty( codexin_get_option( 'cx_h2_font' ) ) ) {
        	$h2_font = codexin_get_option( 'cx_h2_font' );
        } else {
        	$h2_font = array(
				'font-size'   		=> '28px',
				'font-family' 		=> 'Oswald',
				'variant'	  	 	=> '400',
				'text-transform'    => 'uppercase',
				'line-height'    	=> '1.2',
        	);
        }

        if( ! empty( codexin_get_option( 'cx_h3_font' ) ) ) {
        	$h3_font = codexin_get_option( 'cx_h3_font' );
        } else {
        	$h3_font = array(
				'font-size'   		=> '24px',
				'font-family' 		=> 'Oswald',
				'variant'	  	 	=> '400',
				'text-transform'    => 'uppercase',
				'line-height'    	=> '1.2',
        	);
        }

        if( ! empty( codexin_get_option( 'cx_h4_font' ) ) ) {
        	$h4_font = codexin_get_option( 'cx_h4_font' );
        } else {
        	$h4_font = array(
				'font-size'   		=> '21px',
				'font-family' 		=> 'Oswald',
				'variant'	  	 	=> '400',
				'text-transform'    => 'uppercase',
				'line-height'    	=> '1.2',
        	);
        }

        if( ! empty( codexin_get_option( 'cx_h5_font' ) ) ) {
        	$h5_font = codexin_get_option( 'cx_h5_font' );
        } else {
        	$h5_font = array(
				'font-size'   		=> '16px',
				'font-family' 		=> 'Oswald',
				'variant'	  	 	=> '400',
				'text-transform'    => 'uppercase',
				'line-height'    	=> '1.2',
        	);
        }

        if( ! empty( codexin_get_option( 'cx_h6_font' ) ) ) {
        	$h6_font = codexin_get_option( 'cx_h6_font' );
        } else {
        	$h6_font = array(
				'font-size'   		=> '14px',
				'font-family' 		=> 'Oswald',
				'variant'	  	 	=> '400',
				'text-transform'    => 'uppercase',
				'line-height'    	=> '1.2',
        	);
        }

		/**
		 * Building up the selectors.
		 */
        $customizer_css = '';

        $text_color_selectors = array(
			'.block-editor .edit-post-visual-editor .mce-content-body',
			'.block-editor .edit-post-visual-editor .editor-rich-text__tinymce',
        );

        $primary_color_selectors = array(
        	'.has-primary-color',
        );

        $primary_color_bg_selectors = array(
        	'.has-primary-background-color',
        	'.edit-post-visual-editor .wp-block-button .wp-block-button__link',
        );

        $primary_color_border_selectors = array(
        	'.edit-post-visual-editor blockquote.wp-block-quote:not(.is-large):not(.is-style-large)',
			'.edit-post-visual-editor blockquote.wp-block-quote.is-large',
			'.edit-post-visual-editor blockquote.wp-block-quote.is-style-large',
			'.edit-post-visual-editor .wp-block-pullquote',
        );

        $secondary_color_selectors = array(
        	'has-secondary-color',
        );

        $secondary_color_bg_selectors = array(
        	'.has-secondary-background-color',
        );

        $tertiary_color_selectors = array(
        	'has-tertiary-color',
			'.edit-post-visual-editor .wp-block-separator.is-style-dots::before',
        );

        $tertiary_color_bg_selectors = array(
        	'.has-tertiary-background-color',
        );

        $border_color_selectors = array(
        	'has-border-color',
        );

        $border_color_in_border_selectors = array(
			'.edit-post-visual-editor table thead',
			'.edit-post-visual-editor table tfoot',
			'.edit-post-visual-editor table th',
			'.edit-post-visual-editor table td',
			'.edit-post-visual-editor table.wp-block-table.is-style-stripes td',
			'.block-editor .edit-post-visual-editor .wp-block-preformatted',
			'.block-editor .edit-post-visual-editor .wp-block-verse',
			'.edit-post-visual-editor .wp-block-separator:not(.is-style-wide):not(.is-style-dots)',
			'.edit-post-visual-editor .wp-block-separator.is-style-wide',
        );

        $border_color_bg_selectors = array(
        	'.has-border-background-color',
        );

        $offset_color_selectors = array(
        	'has-offset-color',
        );

        $offset_color_bg_selectors = array(
        	'.has-offset-background-color',
        	'.edit-post-visual-editor blockquote.wp-block-quote',
        	'.edit-post-visual-editor .wp-block-pullquote',
			'.block-editor .edit-post-visual-editor .wp-block-preformatted',
			'.block-editor .edit-post-visual-editor .wp-block-verse',
			'.edit-post-visual-editor ul.wp-block-latest-posts > li > a',
			'.wp-block-table.is-style-stripes tr:nth-child(odd)',
        );

        $text_font_selectors = array(
			'.block-editor .edit-post-visual-editor .mce-content-body',
			'.block-editor .edit-post-visual-editor .editor-rich-text__tinymce',
			'.edit-post-visual-editor ul.wp-block-latest-posts > li > a',
        );

        $page_title_font_selectors = array(
			'.block-editor .editor-post-title__block .editor-post-title__input',
        );

        $h1_font_selectors = array(
			'.block-editor .edit-post-visual-editor h1.editor-rich-text__tinymce',
        );

        $h2_font_selectors = array(
			'.block-editor .edit-post-visual-editor h2.editor-rich-text__tinymce',
        );

        $h3_font_selectors = array(
			'.block-editor .edit-post-visual-editor h3.editor-rich-text__tinymce',
        );

        $h4_font_selectors = array(
			'.block-editor .edit-post-visual-editor h4.editor-rich-text__tinymce',
        );

        $h5_font_selectors = array(
			'.block-editor .edit-post-visual-editor h5.editor-rich-text__tinymce',
        );

        $h6_font_selectors = array(
			'.block-editor .edit-post-visual-editor h6.editor-rich-text__tinymce',
        );

		$body_font['variant'] 		= 'regular' !== $body_font['variant'] ? $body_font['variant'] : '400';
		$page_title_font['variant'] = 'regular' !== $page_title_font['variant'] ? $page_title_font['variant'] : '400';
		$h1_font['variant'] 		= 'regular' !== $h1_font['variant'] ? $h1_font['variant'] : '400';
		$h2_font['variant'] 		= 'regular' !== $h2_font['variant'] ? $h2_font['variant'] : '400';
		$h3_font['variant'] 		= 'regular' !== $h3_font['variant'] ? $h3_font['variant'] : '400';
		$h4_font['variant'] 		= 'regular' !== $h4_font['variant'] ? $h4_font['variant'] : '400';
		$h5_font['variant'] 		= 'regular' !== $h5_font['variant'] ? $h5_font['variant'] : '400';
		$h6_font['variant'] 		= 'regular' !== $h6_font['variant'] ? $h6_font['variant'] : '400';

		/**
		 * Passing styles to the correct selectors.
		 */
        $customizer_css .= implode( $text_color_selectors, ',' ) . '{color: ' . esc_attr( $text_color ) . ';}';
        $customizer_css .= implode( $primary_color_selectors, ',' ) . '{color: ' . esc_attr( $primary_color ) . ';}';
        $customizer_css .= implode( $primary_color_bg_selectors, ',' ) . '{background: ' . esc_attr( $primary_color ) . ';}';
        $customizer_css .= implode( $primary_color_border_selectors, ',' ) . '{border-color: ' . esc_attr( $primary_color ) . ';}';
        $customizer_css .= implode( $secondary_color_selectors, ',' ) . '{color: ' . esc_attr( $secondary_color ) . ';}';
        $customizer_css .= implode( $secondary_color_bg_selectors, ',' ) . '{background: ' . esc_attr( $secondary_color ) . ';}';
        $customizer_css .= implode( $tertiary_color_selectors, ',' ) . '{color: ' . esc_attr( $tertiary_color ) . ';}';
        $customizer_css .= implode( $tertiary_color_bg_selectors, ',' ) . '{background: ' . esc_attr( $tertiary_color ) . ';}';
        $customizer_css .= implode( $border_color_selectors, ',' ) . '{color: ' . esc_attr( $border_color ) . ';}';
        $customizer_css .= implode( $border_color_in_border_selectors, ',' ) . '{border-color: ' . esc_attr( $border_color ) . ';}';
        $customizer_css .= implode( $border_color_bg_selectors, ',' ) . '{background: ' . esc_attr( $border_color ) . ';}';
        $customizer_css .= implode( $offset_color_selectors, ',' ) . '{color: ' . esc_attr( $offset_color ) . ';}';
        $customizer_css .= implode( $offset_color_bg_selectors, ',' ) . '{background: ' . esc_attr( $offset_color ) . ';}';
        $customizer_css .= implode( $text_font_selectors, ',' ) . '{font-family: ' . esc_attr( $body_font['font-family'] ) . ';}';
        $customizer_css .= implode( $text_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $body_font['variant'] ) . ';}';
        $customizer_css .= implode( $text_font_selectors, ',' ) . '{font-size: ' . esc_attr( $body_font['font-size'] ) . ';}';
        $customizer_css .= implode( $text_font_selectors, ',' ) . '{line-height: ' . esc_attr( $body_font['line-height'] ) . ';}';
        $customizer_css .= implode( $page_title_font_selectors, ',' ) . '{font-family: ' . esc_attr( $page_title_font['font-family'] ) . ';}';
        $customizer_css .= implode( $page_title_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $page_title_font['variant'] ) . ';}';
        $customizer_css .= implode( $page_title_font_selectors, ',' ) . '{font-size: ' . esc_attr( $page_title_font['font-size'] ) . ';}';
        $customizer_css .= implode( $page_title_font_selectors, ',' ) . '{line-height: ' . esc_attr( $page_title_font['line-height'] ) . ';}';
        $customizer_css .= implode( $page_title_font_selectors, ',' ) . '{text-transform: ' . esc_attr( $page_title_font['text-transform'] ) . ';}';
        $customizer_css .= implode( $h1_font_selectors, ',' ) . '{font-family: ' . esc_attr( $h1_font['font-family'] ) . ';}';
        $customizer_css .= implode( $h1_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $h1_font['variant'] ) . ';}';
        $customizer_css .= implode( $h1_font_selectors, ',' ) . '{font-size: ' . esc_attr( $h1_font['font-size'] ) . ';}';
        $customizer_css .= implode( $h1_font_selectors, ',' ) . '{line-height: ' . esc_attr( $h1_font['line-height'] ) . ';}';
        $customizer_css .= implode( $h1_font_selectors, ',' ) . '{text-transform: ' . esc_attr( $h1_font['text-transform'] ) . ';}';
        $customizer_css .= implode( $h2_font_selectors, ',' ) . '{font-family: ' . esc_attr( $h2_font['font-family'] ) . ';}';
        $customizer_css .= implode( $h2_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $h2_font['variant'] ) . ';}';
        $customizer_css .= implode( $h2_font_selectors, ',' ) . '{font-size: ' . esc_attr( $h2_font['font-size'] ) . ';}';
        $customizer_css .= implode( $h2_font_selectors, ',' ) . '{line-height: ' . esc_attr( $h2_font['line-height'] ) . ';}';
        $customizer_css .= implode( $h2_font_selectors, ',' ) . '{text-transform: ' . esc_attr( $h2_font['text-transform'] ) . ';}';
        $customizer_css .= implode( $h3_font_selectors, ',' ) . '{font-family: ' . esc_attr( $h3_font['font-family'] ) . ';}';
        $customizer_css .= implode( $h3_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $h3_font['variant'] ) . ';}';
        $customizer_css .= implode( $h3_font_selectors, ',' ) . '{font-size: ' . esc_attr( $h3_font['font-size'] ) . ';}';
        $customizer_css .= implode( $h3_font_selectors, ',' ) . '{line-height: ' . esc_attr( $h3_font['line-height'] ) . ';}';
        $customizer_css .= implode( $h3_font_selectors, ',' ) . '{text-transform: ' . esc_attr( $h3_font['text-transform'] ) . ';}';
        $customizer_css .= implode( $h4_font_selectors, ',' ) . '{font-family: ' . esc_attr( $h4_font['font-family'] ) . ';}';
        $customizer_css .= implode( $h4_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $h4_font['variant'] ) . ';}';
        $customizer_css .= implode( $h4_font_selectors, ',' ) . '{font-size: ' . esc_attr( $h4_font['font-size'] ) . ';}';
        $customizer_css .= implode( $h4_font_selectors, ',' ) . '{line-height: ' . esc_attr( $h4_font['line-height'] ) . ';}';
        $customizer_css .= implode( $h4_font_selectors, ',' ) . '{text-transform: ' . esc_attr( $h4_font['text-transform'] ) . ';}';
        $customizer_css .= implode( $h5_font_selectors, ',' ) . '{font-family: ' . esc_attr( $h5_font['font-family'] ) . ';}';
        $customizer_css .= implode( $h5_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $h5_font['variant'] ) . ';}';
        $customizer_css .= implode( $h5_font_selectors, ',' ) . '{font-size: ' . esc_attr( $h5_font['font-size'] ) . ';}';
        $customizer_css .= implode( $h5_font_selectors, ',' ) . '{line-height: ' . esc_attr( $h5_font['line-height'] ) . ';}';
        $customizer_css .= implode( $h5_font_selectors, ',' ) . '{text-transform: ' . esc_attr( $h5_font['text-transform'] ) . ';}';
        $customizer_css .= implode( $h6_font_selectors, ',' ) . '{font-family: ' . esc_attr( $h6_font['font-family'] ) . ';}';
        $customizer_css .= implode( $h6_font_selectors, ',' ) . '{font-weight: ' . esc_attr( $h6_font['variant'] ) . ';}';
        $customizer_css .= implode( $h6_font_selectors, ',' ) . '{font-size: ' . esc_attr( $h6_font['font-size'] ) . ';}';
        $customizer_css .= implode( $h6_font_selectors, ',' ) . '{line-height: ' . esc_attr( $h6_font['line-height'] ) . ';}';
        $customizer_css .= implode( $h6_font_selectors, ',' ) . '{text-transform: ' . esc_attr( $h6_font['text-transform'] ) . ';}';

        return wp_strip_all_tags( $customizer_css );
	}
}