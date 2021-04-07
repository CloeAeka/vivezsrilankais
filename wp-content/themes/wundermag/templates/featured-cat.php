<?php

	$featured_cat_title = get_theme_mod( 'featured_cat_title', 'Featured Category' );
	$featured_cat_category = get_theme_mod( 'featured_cat_category', 'lifestyle' );

	$query = array(
		'showposts' => 4,
		'nopaging' => 0,
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'cat' => $featured_cat_category,
	);
	$loop = new WP_Query( $query );

?>


	<div class="featured-cat">
		<div class="container">
			<div class="rowz">

				<div class="col-md-12">

					<h3 class="section-title underline"><?php echo get_cat_name( $featured_cat_category ); ?> <?php echo esc_html_e( 'Category', 'wundermag' ); ?></h3>


<?php if( $loop->have_posts() ) : ?>





					<!-- List Posts -->
					<div class="">

						<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

								<div class="">

									<div class="thumb-scale">
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php wundermag_post_thumb( 'wundermag_128x128' ); ?>
											<div class="thumb-scale-overlay">
												<div class="thumb-scale-meta">
													<div>
														<?php if( has_post_format( 'video' ) ) : ?>
															<div class="video-play-icon"></div>
														<?php else : ?>
															<h4 class="upper link">
																<?php esc_html_e( 'View', 'wundermag' ); ?> <i class="fa fa-angle-right"></i>
															</h4>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</a>
									</div>

									<div class="widget-post-info">
										<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
										<p><?php the_time( get_option('date_format') ); ?></p>
									</div>

								</div>

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					</div>

<?php endif; ?>


				</div>

			</div>
		</div>
	</div>


