<?php
$rel_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);

	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		$args = array(
			'tag__in'                 => $tag_ids,
			'post__not_in'            => array($post->ID),
			'posts_per_page'          => 8,
			'ignore_sticky_posts'     => 1,
			'orderby'                 => 'rand',
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array('post-format-audio'),
					'operator' => 'NOT IN'
				)
			),
		);
		$my_query = new wp_query( $args ); ?>

		<?php if( $my_query->have_posts() ) : ?>
			<div class="single-post-related">
				<h4 class="section-title underline"><?php esc_html_e( 'You may also like', 'wundermag' ); ?></h4>

				<div class="related-post-slider">
					<div class="swiper-wrapper">
						<?php while( $my_query->have_posts() ) { $my_query->the_post(); ?>

							<?php if( has_post_thumbnail() || has_post_format( 'gallery' ) || has_post_format( 'video' ) ) : ?>
								<div class="related-post-item swiper-slide">
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
									<h4 class="related-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
								</div>
							<?php endif; ?>

						<?php } ?>
					</div>

					<div class="swiper-pagination swiper-pag-outside-alt related-post-slider-pag"></div>

				</div>

			</div>
		<?php endif; ?>

	<?php
	}

	$post = $rel_post;
	wp_reset_postdata();

?>
