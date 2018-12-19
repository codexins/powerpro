<?php
/**
 * Template part for displaying gallery posts
 *
 * @package 	Codexin
 * @subpackage 	Template Parts
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$length_switch   = codexin_get_option( 'cx_enable_blog_title_excerpt' );
$title_length    = codexin_get_option( 'cx_post_title_length' );
$excerpt_length  = codexin_get_option( 'cx_post_excerpt_length' );
$gallery 		 = codexin_meta( 'codexin_gallery', 'size=codexin-fr-rect-two' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
	<div class="post-content-wrapper">
		<header class="entry-header">
			<div class="entry-meta">
				<?php codexin_posts_meta(); ?>
			</div>

			<h2 class="post-title">
				<?php
				if ( ! is_single() ) {
					echo ( ( is_sticky() && is_home() && ! is_paged() ) ) ? '<span>' . esc_html__( 'Featured', 'powerpro' ) . '</span>' : '';
				?>
					<a href="<?php the_permalink(); ?>">
						<?php
						if ( $length_switch ) {
							// Limit the title characters.
							echo apply_filters( 'the_title', codexin_char_limit( $title_length, 'title' ) );
						} else {
							the_title();
						}
						?>
					</a>
				<?php
				} else {
					the_title();
				}
				?>
			</h2>
		</header> <!-- end of entry-header -->

		<div class="entry-content">
			<?php
			if ( ! post_password_required() ) {
				if ( ! empty( $gallery ) ) {
					echo '<div class="post-media">';
						echo ( ! is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '">' : ''; ?>
							<div class="element-carousel" data-visible-slide="1" data-visible-xl-slide="1" data-visible-lg-slide="1" data-visible-md-slide="1" data-visible-sm-slide="1" data-loop="true" data-autoplay-delay="5000" data-effect="fade">
								<div class="swiper-wrapper">
									<?php
									foreach ( $gallery as $single_image ) {
										// Fetching the attachment properties.
										$image_prop  = codexin_attachment_metas( $single_image['ID'] );
										echo '<div class="swiper-slide bg-img-wrapper">';
											echo '<div class="image-placeholder"></div>';
											echo '<img src="' . esc_url( $single_image['url'] ) . '" alt="' . esc_attr( $image_prop['alt'] ) . '" class="visually-hidden">';
										echo '</div> <!-- end of swiper-slide -->';
									} ?>
								</div> <!-- end of swiper-wrapper -->
								<div class="swiper-arrow prev ion ion-md-arrow-dropleft"></div>
								<div class="swiper-arrow next ion ion-md-arrow-dropright"></div>
							</div> <!-- end of element-carousel -->
						<?php
						echo ( ! is_single() ) ? '</a>' : '';
						echo '</div> <!-- end of post-media -->';
				}
			} // End if().

			if ( ! is_single() ) {
			?>
				<div class="post-excerpt">
					<?php
					if ( $length_switch ) {
						echo '<p>';
							// Limit the excerpt characters.
							echo apply_filters( 'the_content', codexin_char_limit( $excerpt_length, 'excerpt' ) );
						echo '</p>';
					} else {
						the_excerpt();
					}
					?>
				</div>
			<?php
			} else {
				echo '<div class="post-details clearfix">';
					the_content();

					// This section is for pagination purpose for a long large page that is seperated using nextpage tags.
					$args = array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'powerpro' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'powerpro' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					);
					wp_link_pages( $args );
				echo '</div>';
			}
			?>
		</div> <!-- end of entry-content -->

		<footer class="entry-footer">
			<?php
			codexin_posts_footer();
			?>
		</footer> <!-- end of entry-footer -->
	 </div> <!-- end of post-content-wrapper -->
</article> <!-- end of #post-## -->
