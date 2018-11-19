<?php

/**
 * Template part for displaying gallery posts
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

$length_switch   = codexin_get_option( 'cx_enable_blog_title_excerpt' );
$title_length    = codexin_get_option( 'cx_post_title_length' );
$excerpt_length  = codexin_get_option( 'cx_post_excerpt_length' );
$read_more       = codexin_get_option( 'cx_enable_readmore' );
$social_share 	 = codexin_get_option( 'cx_enable_share_link' );
$gallery 		 = codexin_meta( 'codexin_gallery', 'size=codexin-fr-rect-two' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
	<div class="post-content-wrapper">
		<?php 
		if ( ! post_password_required() ) { 
			if( ! empty( $gallery ) ) { 
				echo ( ! is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '">' : ''; ?>
	                <div class="element-carousel" data-visible-slide="1" data-visible-xl-slide="1" data-visible-lg-slide="1" data-visible-md-slide="1" data-visible-sm-slide="1" data-loop="true" data-autoplay-delay="5000" data-effect="fade">
	                    <div class="swiper-wrapper">
	                    	<?php 
	                    	foreach( $gallery as $single_image ) { 
								// Fetching the attachment properties
								$image_prop  = codexin_attachment_metas( $single_image['ID'] );
								echo '<div class="swiper-slide">';
									echo '<img src="' . esc_url( $single_image['url'] ) . '" alt="' . esc_attr( $image_prop['alt'] ) . '">';
								echo '</div> <!-- end of swiper-slide -->';
		                    } ?>
	                    </div> <!-- end of swiper-wrapper -->
	                    <div class="swiper-arrow prev fa fa-angle-left"></div>
	                    <div class="swiper-arrow next fa fa-angle-right"></div>
	                </div> <!-- end of element-carousel -->
				<?php
				echo ( ! is_single() ) ? '</a>' : '';
			}
		} // end of password check condition ?>
		<div class="post-content">
			<h2 class="post-title">
				<?php if( ! is_single() ) { ?>
					<a href="<?php the_permalink(); ?>">
	                    <?php
	                    if( $length_switch ) {                            
	                        // Limit the title characters
	                        echo apply_filters( 'the_title', codexin_char_limit( $title_length, 'title' ) );
	                    } else {
	                        the_title();
	                    }
	                    ?>
					</a>
				<?php } else {
					the_title();
				}
				?>
			</h2>
			<div class="post-meta">	
				<ul class="list-inline meta-details">
					<li class="list-inline-item post-author"><i class="fa fa-pencil"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></li>
					<li class="list-inline-item post-cats"><i class="fa fa-tag"></i> <?php the_category( ', ' ); ?></li>
					<li class="list-inline-item post-time"><i class="fa fa-calendar"></i> <a href="<?php echo get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) );  ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></li>
					<li class="list-inline-item post-comments"><i class="fa fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a></li>
					<li class="list-inline-item"> <?php echo function_exists( 'codexin_likes_button' ) ? codexin_likes_button( get_the_ID(), 0 ) : '' ?></li>
				</ul>
			</div>
			
			<?php if( ! is_single() ) { ?>
				<div class="post-excerpt">
					<?php 
	                if( $length_switch ) {
	                    echo '<p>';
	                        echo apply_filters( 'the_content', codexin_char_limit( $excerpt_length, 'excerpt' ) );
	                    echo '</p>';
	                } else {
	                    the_excerpt();
	                }
					?>
				</div>
			<?php } else {
				echo '<div class="post-details">';
					the_content();

					// This section is for pagination purpose for a long large page that is seperated using nextpage tags
		            $args = array(
		                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'TEXT_DOMAIN' ) . '</span>',
		                'after'       => '</div>',
		                'link_before' => '<span>',
		                'link_after'  => '</span>',
		                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'TEXT_DOMAIN' ) . ' </span>%',
		                'separator'   => '<span class="screen-reader-text">, </span>',
		            );                 
		            wp_link_pages( $args );
				echo '</div>';
			}
			?>
		</div> <!-- end of post-content -->
		
		<div class="post-footer">
			<?php 
			if( ! is_single() ) { 
				if( $read_more ) {  ?>				
					<div class="read-more">
						<a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'TEXT_DOMAIN' ); ?></a>
					</div>
				<?php 
				}
			} else{
		        if( has_tag() ) { ?>
		    		<div class="post-tag">
			 			<?php the_tags('Tags: &nbsp;',' ',''); ?>
		    		</div>
		        <?php 
		    	}

				if( $social_share ) { ?>
				    <div class="share socials">            
				        <div class="caption"><span class="fa fa-share-alt"></span> <?php esc_html_e('Share: ', 'TEXT_DOMAIN'); ?></div>    
				        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-facebook"></i></a>
				        <a target="_blank" href="https://twitter.com/home?status=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-twitter"></i></a>
				        <a target="_blank" href="https://plus.google.com/share?url=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-google-plus"></i></a>
				        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-linkedin"></i></a>        
				    </div>
				<?php }
			}
			?>
		</div> <!-- end of post-footer -->
	 </div> <!-- end of post-content-wrapper -->
</article> <!-- end of #post-## -->