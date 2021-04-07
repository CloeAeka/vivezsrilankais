<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if( $paged == 1 ) :

	$featured_posts_num = get_theme_mod( 'featured_posts_num', '6' );
	$featured_slider_type = get_theme_mod( 'featured_slider_type', '1' );
	$parallax_slider_types = array( 2,3,4,6,8,9 );

	$the_featured_query = new WP_Query(array(
		'posts_per_page' 			=> $featured_posts_num,
		'posts_per_archive_page' 	=> $featured_posts_num,
		'post_type'					=> 'post',
		'orderby'					=> 'date',
		'order'						=> 'DESC',
		'ignore_sticky_posts' 		=> 1,
		'meta_query'  => array(
			array(
				'key'     	=> 'set_featured_post',
				'value'     => 1,
				'compare'   => 'LIKE',
			),
		),
	));

	$the_latest_query = new WP_Query(array(
		'posts_per_page' 			=> $featured_posts_num,
		'posts_per_archive_page' 	=> $featured_posts_num,
		'post_type'					=> 'post',
		'orderby'					=> 'date',
		'order'						=> 'DESC',
		'ignore_sticky_posts' 		=> 1,
	));

	if( get_theme_mod( 'featured_posts_latest', false ) == true ) {
		$the_query = $the_latest_query;
	} else {
		$the_query = $the_featured_query;
	}

?>

	<?php if ( $the_query->have_posts() && get_theme_mod( 'show_featured_slider', true ) == true ) : ?>

	<div class="hero <?php if( $featured_slider_type == '2' || $featured_slider_type == '7' ) : ?>container<?php endif; ?>" data-slider-type="<?php echo esc_attr( $featured_slider_type ); ?>">

		<div class="featured-slider swiper-hidden"
			 data-slider-type="<?php echo esc_attr( $featured_slider_type ); ?>"
			 data-autoplay="<?php if( get_theme_mod( 'featured_autoplay', true ) == true ) : echo get_theme_mod( 'featured_autoplay_speed', '8000' ); endif; ?>"
			 data-loop="<?php if( get_theme_mod( 'featured_loop', true ) == true ) : echo ( 'true' ); endif; ?>"
			 data-post_num="<?php echo get_theme_mod( 'featured_posts_num', '6' ); ?>"
		>

			<div class="swiper-wrapper">

				<?php if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<?php if( !has_post_format( 'audio' ) ) : ?>

						<div class="swiper-slide featured-post thumb-bg" data-img="<?php wundermag_post_thumb_bg( 'wundermag_1920x1080' ); ?>">

								<div class="featured-post-container">
									<div class="featured-post-content" data-swiper-parallax="<?php if( in_array( $featured_slider_type, $parallax_slider_types ) ) : ?>-1000<?php endif; ?>">

										<?php if( get_theme_mod( 'show_featured_cat', true ) == true ) : ?>
											<p class="post-cat"><span class="in-cat"><?php esc_html_e( 'In', 'wundermag' ); ?></span> <?php the_category( ', ' ); ?></p>
										<?php endif; ?>

										<?php if( get_theme_mod( 'show_featured_title', true ) == true ) : ?>
											<h1 class="post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
										<?php endif; ?>

										<?php if( get_theme_mod( 'show_featured_read_more', true ) == true ) : ?>
											<h4 class="post-read-more">
												<a class="btn" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'View Post', 'wundermag' ); ?> <i class="fa fa-angle-right"></i></a>
											</h4>
										<?php endif; ?>

									</div>
								</div>

								<div class="featured-post-content-bottom">
									<?php if( get_theme_mod( 'show_featured_title', true ) == true ) : ?>
										<h5 class="post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
									<?php endif; ?>
									<?php if( get_theme_mod( 'show_featured_cat', true ) == true ) : ?>
										<p class="post-cat"><span class="in-cat"><?php esc_html_e( 'In', 'wundermag' ); ?></span> <?php the_category( ', ' ); ?></p>
									<?php endif; ?>
								</div>

								<a href="<?php the_permalink();?>" class="featured-overlay-link"></a>

						</div>

					<?php endif; ?>

				<?php endwhile; endif; ?>

			</div><!-- #Swiper Wrapper -->

			<div class="swiper-button-prev"><i class="ion-ios-arrow-left"></i></div>
			<div class="swiper-button-next"><i class="ion-ios-arrow-right"></i></div>

		</div>

		<?php wp_reset_postdata(); ?>

	</div>

	<?php endif; ?>

<?php endif; ?> <!-- #if paged -->

