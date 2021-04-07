<?php

	$args = array(
		'meta_key' => 'post_views_count',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'post_type'   => 'post',
		'date_query' => array(
			array(
				'column' => 'post_date_gmt',
				'after'  => get_theme_mod( 'popular_time_range', '' ),
			)
		),
		'posts_per_page' => get_theme_mod( 'popular_posts_num', '8' ),
	);

	$popular = new WP_Query( apply_filters( 'show_popular_slider', $args ) ); ?>

<?php if ( $popular->have_posts() && get_theme_mod( 'show_popular_slider', false ) == true ) : ?>
	<div class="popular-posts-section">
		<div class="container">
			<div class="rowz">

				<div class="col-md-12 popular-posts">

					<h4 class="section-title underline"><?php echo esc_html_e( 'Trending Now', 'wundermag' ); ?></h4>

					<div class="popular-posts-slider swiper-hidden"
						 data-autoplay="<?php if( get_theme_mod( 'popular_autoplay', true ) == true ) : echo get_theme_mod( 'popular_autoplay_speed', '10000' ); endif; ?>"
						 data-loop="<?php if( get_theme_mod( 'popular_loop', true ) == true ) : echo ( 'true' ); endif; ?>"
						 data-columns="<?php echo get_theme_mod( 'popular_columns', '4' ); ?>"
					>
						<div class="swiper-wrapper">
							<?php while ( $popular->have_posts() ) : $popular->the_post(); ?>
								<?php if ( has_post_thumbnail() ) : ?>

									<div class="popular-cell2 swiper-slide">

										<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-image thumb-overlay <?php if( has_post_format( 'video' ) ) : ?>video-thumb<?php endif; ?>">
											<figure>
												<?php wundermag_post_thumb( 'wundermag_300x300' ); ?>
											</figure>
											<div class="thumb-content">
												<div>
													<?php if( has_post_format( 'video' ) ) : ?>
														<div>
															<div class="video-play-icon"></div>
														</div>
													<?php else : ?>
														<h4 class="upper link">
															<?php esc_html_e( 'View Post', 'wundermag' ); ?> <i class="fa fa-angle-right"></i>
														</h4>
													<?php endif; ?>
												</div>
											</div>
										</a>

										<div class="popular-info">
											<?php if( get_theme_mod( 'show_popular_cat', 'true' ) == true ) : ?>

											<?php endif; ?>

											<?php if( get_theme_mod( 'show_popular_title', 'true' ) == true ) : ?>
												<h4 class="related-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
											<?php endif; ?>


										</div>

									</div>

								<?php endif; ?>
							<?php endwhile; ?>
						</div>
						<div class="swiper-pagination swiper-pag-outside-alt related-post-slider-pag"></div>
					</div>

				</div>

			</div>
		</div>
	</div>
	<?php wp_reset_postdata(); ?>

<?php endif; ?>
