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
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!--[if lt IE 9]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
	<![endif]-->

	<?php if( codexin_get_option( 'cx_enable_pageloader' ) ) { ?>
	    <!-- Site Loader started-->
	    <div class="cx-pageloader">
	        <div class="cx-pageloader-inner"></div>
	    </div>
	    <!-- Site Loader Finished-->
    <?php } ?>

	<!-- Start of Mobile Navigation -->
	<div id="c-menu--slide-left" class="c-menu c-menu--slide-left d-block d-sm-block d-md-none">
	    <button class="c-menu__close"><?php echo esc_html__( '&larr; Back', 'TEXT_DOMAIN' ); ?></button>
	    <?php codexin_menu( 'mobile_menu' ); ?>
	</div>
	<!-- End of Mobile Navigation -->

	<div id="c-mask" class="c-mask"></div> <!-- Empty placeholder for Mobile Menu masking -->

	<!-- Start of Whole Site Wrapper with mobile menu support -->
	<div id="whole" class="whole-site-wrapper">

		<?php $header_bg_image = ( ! empty( get_header_image() ) ) ? 'background:url(' . esc_url( get_header_image() ) . ')' : '' ?>

		<!-- Start of Header -->
		<header class="header<?php echo is_front_page() ? esc_attr(' front-header') : esc_attr(' inner-header'); ?>" style="<?php echo esc_attr( $header_bg_image ); ?>">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-3 col-lg-3">

							<!-- Logo -->
							<div class="logo">
								<div class="navbar-brand">
									<?php 
										the_custom_logo();

										// Header Text
										$header_text = display_header_text();
										if( $header_text == true ) { ?>
		                                    <h1 class="site-title">
		                                    	<a id="header_text" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		                                    		<?php echo esc_html( get_bloginfo('name') ); ?>
		                                    	</a>
		                                    	<p class="site-description"><?php echo esc_html( get_bloginfo('description') ); ?></p>
											</h1>
										<?php }
									 ?>
								</div>
							</div>

							<!-- Mobile Menu button -->
							<div id="o-wrapper" class="mobile-nav o-wrapper d-block d-sm-block d-md-none">
								<div class="primary-nav">
									<button id="c-button--slide-left" class="primary-nav-details">
										<?php echo esc_html__( 'Menu', 'TEXT_DOMAIN' ); ?> <i class="fa fa-bars"></i>
									</button>
								</div>
							</div>
						</div>

						<div class="col-12 col-sm-12 col-md-9 col-lg-9">

							<!-- Start of main Navigation -->
							<div id="main_nav">						
								<?php codexin_menu( 'main_menu' ); ?>
							</div>
							<!-- Start of main Navigation -->
						</div>
					</div>
				</div> <!-- end of container -->
			</div> <!-- end of header-top -->

			<?php 
			if( is_page_template( 'page-templates/page-home.php' ) ) {
				// Get the Slider
				get_header( 'home' ); 
			} else {
				if( codexin_meta( 'codexin_disable_page_title' ) == 0 ) {
					// Get the Page Title
					get_template_part( 'template-parts/header/page', 'title' );
				}
			}
			?>
		</header>
		<!-- End of Header -->