<?php

/**
 * Template part for displaying autio posts
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

$length_switch   = codexin_get_option( 'cx_enable_blog_title_excerpt' );
$title_length    = codexin_get_option( 'cx_post_title_length' );
$excerpt_length  = codexin_get_option( 'cx_post_excerpt_length' );
$read_more       = codexin_get_option( 'cx_enable_readmore' );
$social_share 	 = codexin_get_option( 'cx_enable_share_link' );
$link_url        = codexin_meta( 'codexin_link_url' );
$link_txt        = codexin_meta( 'codexin_link_text' );
$link_rel        = codexin_meta( 'codexin_link_rel' ); 
$link_target     = codexin_meta( 'codexin_link_target' );
$text            = ( ! empty( $link_txt ) ) ? $link_txt : get_the_title();
$relation        = ( ! empty( $link_rel ) ) ? 'rel="'. esc_attr( $link_rel ) .'"' : '';
$target          = ( $link_target == '_self' ) ? 'target="'. esc_attr( '_self' ) .'"' : 'target="'. esc_attr( '_blank' ) .'"';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
	<div class="post-content-wrapper">
		<header class="entry-header">
			<div class="entry-meta">
				<div class="media meta-container">
					<div class="author-media">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
					</div>

					<div class="meta-details media-body">
						<div class="post-author">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
						</div>

						<ul class="list-inline">
							<li class=" list-inline-item post-time">
								<a href="<?php echo esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) );  ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
							</li>
							<?php if( is_single() ) { ?>
								<li class="list-inline-item like-count"> <?php echo function_exists( 'codexin_likes_button' ) ? codexin_likes_button( get_the_ID(), 0 ) : '' ?></li>
							<?php } ?>
							<li class=" list-inline-item post-categories">
								<?php the_category( ', ' ); ?>
							</li>
						</ul>
					</div>
				</div>
			</div>

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
		</header> <!-- end of entry-header -->

		<div class="entry-content">
			<?php
			if ( ! post_password_required() ) {
			    echo '<div class="post-link">';
			        echo '<a href="'. esc_url( $link_url ) .'" '. sprintf( '%s', $relation ) .' '. sprintf( '%s', $target ) .'">';
			            echo '<div class="post-format-link">';
			                echo '<i class="fa fa-link"></i>';
			                echo '<p>'. esc_html( $text ) .'</p>';
			            echo '</div>';
			        echo '</a>';
			    echo '</div>';
			} // end of password check condition

			if( ! is_single() ) { ?>
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
				echo '<div class="post-details clearfix">';
					the_content();

					// This section is for pagination purpose for a long large page that is seperated using nextpage tags
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
			<?php if( ! is_single() ) { ?>
				<ul class="list-inline">
					<li class="list-inline-item post-comments"><i class="ion ion-md-chatbubbles"></i><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '% Comments' ); ?></a></li>
					<li class="list-inline-item"> <?php echo function_exists( 'codexin_likes_button' ) ? codexin_likes_button( get_the_ID(), 0 ) : '' ?></li>
				</ul>
			<?php
				if( $read_more ) {  ?>				
					<div class="read-more post-btn">
						<a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'powerpro' ); ?></a>
					</div>
				<?php 
				}
			} else{
		        if( has_tag() ) { ?>
		    		<div class="tagcloud">
			 			<?php the_tags('',' ',''); ?>
		    		</div>
		        <?php 
		    	}

				if( $social_share ) { ?>
				    <div class="share socials share-links">
						<ul class="list-inline">
							<li class="list-inline-item caption"><?php esc_html_e('Share this post: ', 'powerpro'); ?></li>
                            <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_the_permalink() ); ?>" class="bg-facebook" data-toggle="tooltip" data-position="top" data-original-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span>Share</span></a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/home?status=<?php echo esc_url( get_the_permalink() ); ?>" class="bg-twitter" data-toggle="tooltip" data-position="top" data-original-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span>Tweet</span></a></li>
                            <li class="list-inline-item"><a href="https://plus.google.com/share?url=<?php echo esc_url( get_the_permalink() ); ?>" class="bg-google-plus" data-toggle="tooltip" data-position="top" data-original-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span>Google+</span></a></li>
                            <li class="list-inline-item"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_the_permalink() ); ?>" class="bg-linkedin" data-toggle="tooltip" data-position="top" data-original-title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a></li>
                        </ul>
				    </div>
				<?php }
			}
			?>
		</footer> <!-- end of entry-footer -->
	 </div> <!-- end of post-content-wrapper -->
</article> <!-- end of #post-## -->