<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package 	Codexin
 * @subpackage 	Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!--[if lt IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
	<![endif]-->

	<?php
	if ( codexin_get_option( 'cx_enable_pageloader' ) ) {
	?>
		<!-- Site Loader started-->
		<div class="cx-pageloader">
			<div class="cx-pageloader-inner"></div>
		</div>
		<!-- Site Loader Finished-->
	<?php
	} // End if().
	?>

	<!-- Start of Mobile Navigation -->
	<div id="c-menu--slide-left" class="c-menu c-menu--slide-left d-block d-sm-block d-md-block d-lg-none">
		<button class="c-menu__close"><?php echo esc_html__( '&larr; Back', 'powerpro' ); ?></button>
		<?php codexin_menu( 'mobile_menu' ); ?>
	</div>
	<!-- End of Mobile Navigation -->

	<div id="c-mask" class="c-mask"></div> <!-- Empty placeholder for Mobile Menu masking -->

	<!-- Start of Whole Site Wrapper with mobile menu support -->
	<div id="whole" class="whole-site-wrapper">

		<?php
		$page_header 			= ! empty( codexin_title_background() ) ? codexin_title_background() : '';
		$customizer_header		= ! empty( get_header_image() ) ? 'background-image: url(' . esc_url( get_header_image() ) . ')' : '';
		$priority_header_bg		= ! empty( $page_header ) ? $page_header : $customizer_header;
		$header_bg_image 		= ( ! empty( $priority_header_bg ) ) ? $priority_header_bg : '';
		?>

		<!-- Start of Header -->
		<header class="header<?php echo is_front_page() ? esc_attr( ' front-header' ) : esc_attr( ' inner-header' ); ?>" style="<?php echo esc_attr( $header_bg_image ); ?>">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'powerpro' ); ?></a>

			<div class="header-top">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-12 order-1 col-sm-12 order-sm-2 col-md-12 order-md-2 col-lg-4 order-lg-1">
							<div class="header-left">
								<?php
								if ( codexin_get_option( 'cx_enable_header_search' ) ) {
								?>
									<div class="mobile-search-icon d-block d-xs-block d-sm-none d-md-none d-lg-none d-xl-none">
										<a href="javascript:void(0)">Icon</a>
									</div>
									<div class="header-search">
										<?php get_search_form(); ?>
									</div>
								<?php
								}

								if ( codexin_get_option( 'cx_enable_header_socials' ) ) {
									codexin_header_socials();
								}
								?>
							</div>
						</div>

						<div class="col-12 order-2 col-sm-12 order-sm-1 col-md-12 order-md-1 col-lg-4 order-lg-2">
							<!-- Logo -->
							<div class="logo">
								<div class="navbar-brand">
									<?php
									if ( has_custom_logo() ) {
										the_custom_logo();
									} else {
										echo '<a href="' . esc_url( home_url( '/' ) ) . '">';
											echo '<img src="' . get_parent_theme_file_uri() . '/assets/images/logo.png' . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
										echo '</a>';
									}

									// Header Text.
									$header_text = display_header_text();
									if ( true === $header_text ) {
									?>
									<h1 class="site-title">
										<a id="header_text" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
											<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
										</a>
									</h1>
									<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
									<?php
									}
									?>
								</div>
							</div>

							<!-- Mobile Menu button -->
							<div id="o-wrapper" class="mobile-nav o-wrapper d-block d-sm-block d-md-block d-lg-none">
								<div class="primary-nav">
									<button id="c-button--slide-left" class="primary-nav-details">
										<?php echo esc_html__( 'Menu', 'powerpro' ); ?> <i class="fa fa-bars"></i>
									</button>
								</div>
							</div>
						</div>

						<div class="col-12 order-3 col-sm-12 col-md-12 col-lg-4">
							<div class="header-right">
								<?php
								if ( codexin_get_option( 'cx_enable_header_phone' ) ) {
									$header_phone_url = codexin_get_option( 'cx_header_phone_url' );
								?>
									<a class="default-btn white-scheme" href="tel:+<?php echo intval( $header_phone_url ); ?>"><?php echo esc_html( codexin_get_option( 'cx_header_phone_number' ) ); ?></a>
								<?php
								}

								if ( ! empty( codexin_get_option( 'cx_header_button' ) ) ) {
								?>
									<a class="default-btn white-scheme" href="<?php echo esc_url( codexin_get_option( 'cx_header_button_url' ) ); ?>"><?php echo esc_html( codexin_get_option( 'cx_header_button' ) ); ?></a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div> <!-- end of container-fluid -->
			</div> <!-- end of header-top -->

			<div class="header-bottom">
				<div class="navigation-wrapper d-none d-sm-none d-md-none d-lg-block">
					<!-- Start of main Navigation -->
					<div id="main_nav">						
						<?php codexin_menu( 'main_menu' ); ?>
					</div>
					<!-- end of main_nav -->
				</div>
			</div> <!-- end of header-bottom -->

			<div class="fixed-header-space"></div> <!-- empty placeholder div for Fixed Menu bar height-->

			<?php
			if ( is_page_template( 'page-templates/page-home.php' ) ) {
				if ( class_exists( 'SmartSlider3' ) ) {
					// Get the Slider.
					! empty( codexin_meta( 'codexin_page_slider' ) ) ? get_header( 'home' ) : '';
				}
			} elseif ( is_page() ) {
				if ( ! codexin_meta( 'codexin_disable_page_title' ) ) {
					// Get the Page Title.
					get_template_part( 'template-parts/header/page', 'title' );
				}
			} else {
				// Get the Page Title.
				get_template_part( 'template-parts/header/page', 'title' );
			}// End if().
			?>
		</header>
		<!-- End of Header -->
