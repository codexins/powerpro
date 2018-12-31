<?php
/**
 * Framework function to pass colors from customizer
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_color_selectors' ) ) {
	/**
	 * Function to get the selectors to pass colors from customizer
	 *
	 * @return  array
	 * @since   v1.0
	 */
	function codexin_color_selectors() {

		$selectors = array();

		// Primary Color targeting selectors.
		$selectors['primary_color_selectors'] = array(
			'a',
			'.btn-link',
			'.wp-block-button.is-style-outline',
			'.wp-block-latest-posts>li>a:hover',
			'.wp-block-latest-posts>li>a:focus',
			'.wp-block-latest-posts.has-dates>li>a:hover+time',
			'.wp-block-latest-posts.has-dates>li>a:focus+time',
			'.wp-block-categories li a:hover',
			'.wp-block-categories li a:focus',
			'.wp-block-archives li a:hover',
			'.wp-block-archives li a:focus',
			'.color-primary',
			'.has-primary-color',
			'#main-menu>li>a:hover',
			'#main-menu>li>a:focus',
			'#main-menu>.current-menu-ancestor>a',
			'#main-menu>.current-menu-item>a',
			'#c-menu--slide-left .c-menu__items li a:hover',
			'#c-menu--slide-left .c-menu__items li a:focus',
			'.breadcrumb a',
			'.default-btn.white-scheme:hover',
			'.default-btn.white-scheme:focus',
			'.post-content-wrapper .entry-meta a:hover',
			'.post-content-wrapper .entry-meta .post-author a:hover',
			'.post-quote .quote-source:hover',
			'#comments .comment-meta>a:hover',
			'#comments .comment-info .fn>a:hover',
			'#comments .comments-title',
			'#comments .bypostauthor .fn::before',
			'#comments .comment-edit-link',
			'.widgettitle',
			'.widget_nav_menu ul>li>a:hover',
			'.widget_rss ul>li>a:hover',
			'.widget_recent_entries ul>li>a:hover',
			'.widget_meta ul>li>a:hover',
			'.widget_pages ul>li>a:hover',
			'.widget_categories ul>li>a:hover',
			'.widget_archive ul>li>a:hover',
			'.widget_recent_comments ul>li>a:hover',
			'.footer-widget:not(.widget_recent_comments):not(.codexin-social-share-widget) ul>li>a:hover',
			'.sidebar-widget:not(.widget_recent_comments):not(.codexin-social-share-widget) ul>li>a:hover',
			'.widget_recent_comments>ul>li a:hover',
			'.widget_recent_comments>ul>li a:focus',
			'.codexin-recent-posts-widget .posts-single .post-content h4 a:hover',
			'.codexin-popular-posts-widget .posts-single .post-content h4 a:hover',
			'#colophon a:hover',
			'#colophon a:focus',
			'#colophon .widgettitle::after',
			'#colophon #wp-calendar td a',
		);

		// Primary color in background Color targeting selectors.
		$selectors['primary_color_in_bg_color_selectors'] = array(
			'kbd',
			'button',
			'input[type="reset"]',
			'input[type="button"]',
			'input[type="submit"]',
			'.wp-block-button:not(.is-style-outline) .wp-block-button__link',
			'.page-links>a:hover span',
			'.page-links>span:not(.page-links-title)',
			'#whole .mejs-container',
			'#whole .mejs-container .mejs-controls',
			'#whole .mejs-embed',
			'#whole .mejs-embed body',
			'.bgc-primary',
			'.has-primary-background-color',
			'.c-menu__close',
			'.default-btn',
			'.post-btn a::after',
			'#to_top',
			'.number-pagination .pagination li a:hover',
			'.number-pagination .pagination li a:focus',
			'.number-pagination .pagination li span:hover',
			'.number-pagination .pagination li span:focus',
			'.number-pagination .pagination li.active span',
			'.element-carousel .swiper-arrow',
			'.post-link .post-format-link>i',
			'#comments .bypostauthor .fn::before',
			'.widgettitle::after',
			'.widget_search form input[type="submit"]',
			'.widget_calendar #wp-calendar tbody td a::before',
			'.tagcloud a:hover',
			'.mailchimp-wrapper input[type="submit"]',
			'#colophon .mailchimp-wrapper input[type="submit"]',
			'#colophon .widget_search input[type="submit"]',
			'.sticky .post-title span',
		);

		// Primary color in Border Color targeting selectors.
		$selectors['primary_color_in_border_color_selectors'] = array(
			'blockquote',
			'blockquote.wp-block-quote',
			'textarea:focus',
			'select:focus',
			'input[type="text"]:focus',
			'input[type="url"]:focus',
			'input[type="number"]:focus',
			'input[type="email"]:focus',
			'input[type="button"]:focus',
			'input[type="reset"]:focus',
			'input[type="password"]:focus',
			'input[type="search"]:focus',
			'input[type="tel"]:focus',
			'.form-control:focus',
			'button:focus',
			'input:focus',
			'.wp-block-pullquote blockquote',
			'.wp-block-button.is-style-outline',
			'.wp-block-latest-posts>li>a:hover::before',
			'.wp-block-latest-posts>li>a:focus::before',
			'.border-primary',
			'.default-btn',
			'.default-btn.white-scheme:hover',
			'.default-btn.white-scheme:focus',
			'.number-pagination .pagination li a:hover',
			'.number-pagination .pagination li a:focus',
			'.number-pagination .pagination li span:hover',
			'.number-pagination .pagination li span:focus',
			'.number-pagination .pagination li.active span',
			'#comments .comment-reply .comment-reply-link',
			'.widget_search form input[type="submit"]',
			'.tagcloud a:hover',
			'#colophon .mailchimp-wrapper input[type="submit"]',
			'#colophon .widget_search input[type="submit"]',
			'#colophon .tagcloud a:hover',
		);

		// Secondary Color targeting selectors.
		$selectors['secondary_color_selectors'] = array(
			'a:focus',
			'a:active',
			'a:hover',
			'.btn-link:hover',
			'.btn-link:focus',
			'.btn-link:active',
			'.wp-block-button.is-style-outline:hover',
			'.wp-block-button.is-style-outline:focus',
			'.color-secondary',
			'.has-secondary-color',
			'.breadcrumb a:hover',
			'#comments .comment-edit-link:hover',
		);

		// Secondary color in background Color targeting selectors.
		$selectors['secondary_color_in_bg_color_selectors'] = array(
			'button:hover',
			'input[type="submit"]:hover',
			'input[type="button"]:hover',
			'.wp-block-button:not(.is-style-outline) .wp-block-button__link:hover',
			'.wp-block-button:not(.is-style-outline) .wp-block-button__link:focus',
			'.bgc-secondary',
			'.has-secondary-background-color',
			'.default-btn:hover',
			'.default-btn:focus',
			'.post-btn a:hover::after',
			'.post-link a:hover i',
			'.post-link a:focus i',
			'.widget_search form input[type="submit"]:hover',
			'.widget_calendar #wp-calendar tbody td a:hover::before',
			'.mailchimp-wrapper input[type="submit"]:hover',
			'#colophon .mailchimp-wrapper input[type="submit"]:hover',
			'#colophon .widget_search input[type="submit"]:hover',
		);

		// Secondary color in Border Color targeting selectors.
		$selectors['secondary_color_in_border_color_selectors'] = array(
			'button:hover',
			'input[type="submit"]:hover',
			'input[type="button"]:hover',
			'.wp-block-button.is-style-outline:hover',
			'.wp-block-button.is-style-outline:focus',
			'.border-secondary',
			'.default-btn:hover',
			'.default-btn:focus',
			'#comments .comment-reply .comment-reply-link:hover',
			'#comments .comment-reply .comment-reply-link:focus',
			'.widget_search form input[type="submit"]:hover',
			'#colophon .mailchimp-wrapper input[type="submit"]:hover',
			'#colophon .widget_search input[type="submit"]:hover',
		);

		// Tertiary Color targeting selectors.
		$selectors['tertiary_color_selectors'] = array(
			'hr.is-style-dots::before',
			'.wp-block-separator.is-style-dots::before',
			'.color-tertiary',
			'.has-tertiary-color',
		);

		// Tertiary color in background Color targeting selectors.
		$selectors['tertiary_color_in_bg_color_selectors'] = array(
			'.tooltip .tooltip-inner',
			'.bgc-tertiary',
			'.has-tertiary-background-color',
			'.c-menu',
			'.post-content-wrapper .post-media a::before',
			'.post-quote blockquote::before',
			'#colophon',
			'#colophon select',
		);

		// Tertiary color in Border Color targeting selectors.
		$selectors['tertiary_color_in_border_color_selectors'] = array(
			'.border-tertiary',
			'#colophon #wp-calendar thead',
			'#colophon #wp-calendar caption',
		);

		// Tertiary color in Border Top Color targeting selectors.
		$selectors['tertiary_color_in_border_top_color_selectors'] = array(
			'.tooltip .arrow::before',
		);

		// Offset Color targeting selectors.
		$selectors['offset_color_selectors'] = array(
			'.color-offset',
			'.has-offset-color',
		);

		// Offset color in background Color targeting selectors.
		$selectors['offset_color_in_bg_color_selectors'] = array(
			'blockquote',
			'blockquote.wp-block-quote',
			'.wp-block-table.is-style-stripes tr:nth-child(odd)',
			'table tbody tr:nth-child(odd)',
			'pre',
			'.wp-block-latest-posts>li>a',
			'.wp-caption',
			'.page-links span',
			'.gallery-caption',
			'.bgc-offset',
			'.has-offset-background-color',
			'.number-pagination .pagination li a',
			'.number-pagination .pagination li span',
			'.post-link .post-format-link',
			'#comments .comment-info',
			'#comments .comments-title',
			'.no-comments',
			'.nopassword',
			'.widget_calendar #wp-calendar thead',
			'.widget_calendar #wp-calendar caption',
			'.widget_calendar #wp-calendar tbody td',
			'.tagcloud a',
			'.widget_media_gallery .gallery-caption',
			'.mc4wp-form .mc4wp-error',
			'.mc4wp-form .mc4wp-success',
			'.mc4wp-form .mc4wp-notice',
			'.sticky .post-content-wrapper',
		);

		// Offset color in Border Color targeting selectors.
		$selectors['offset_color_in_border_color_selectors'] = array(
			'.border-offset',
		);

		// Offset color in border right color targeting selectors.
		$selectors['offset_color_in_border_right_color_selectors'] = array(
			'#comments .comment-info::before',
		);

		// Default border color targeting selectors.
		$selectors['default_border_color_selectors'] = array(
			'td',
			'th',
			'.wp-block-table.is-style-stripes td',
			'pre',
			'textarea',
			'select',
			'input[type="text"]',
			'input[type="url"]',
			'input[type="number"]',
			'input[type="email"]',
			'input[type="button"]',
			'input[type="reset"]',
			'input[type="password"]',
			'input[type="search"]',
			'input[type="tel"]',
			'.wp-caption',
			'.top-bordered',
			'.right-bordered',
			'.bottom-bordered',
			'.left-bordered',
			'.rb-bordered',
			'.bl-bordered',
			'.tr-bordered',
			'.lt-bordered',
			'.border-default',
			'.post-content-wrapper .entry-meta .author-media img',
			'.posts-nav',
			'.nav-links',
			'.number-pagination',
			'#comments .comment-author img',
			'.tagcloud a',
			'.widget_media_gallery .gallery-item img',
			'.widget_media_gallery .gallery-caption',
			'.codexin-recent-posts-widget .posts-single',
			'.codexin-popular-posts-widget .posts-single',
			'.post-item:not(.sticky) .post-content-wrapper',
			'.sticky.post-item',
			'.single .blog-area+.comments-area',
		);

		// Default border color in background Color targeting selectors.
		$selectors['default_border_color_in_bg_color_selectors'] = array(
			'.bgc-default-border',
			'hr:not(.is-style-dots)',
			'.wp-block-separator:not(.is-style-dots)',
			'hr:not(.is-style-wide):not(.is-style-dots)::before',
			'.wp-block-separator:not(.is-style-wide):not(.is-style-dots)::before',
			'.widgettitle::before',
		);

		return $selectors;
	}
}
