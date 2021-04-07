<article id="post-<?php the_ID(); ?>" class="list-post">

	<?php if( wundermag_get_field( 'set_standout_post' ) == true || is_sticky() ) : ?>

		<div class="standout-post thumb-bg" data-img="<?php wundermag_post_thumb_bg( 'wundermag_1140x700' ); ?>">
			<!-- Post Header -->
			<?php get_template_part( 'templates/post', 'header' ); ?>
			<?php if(!get_theme_mod( 'wundermag_hide_btn_more' )) : ?>
				<a class="btn" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'wundermag' ); ?> <i class="fa fa-angle-right"></i></a>
			<?php endif; ?>
		</div>

	<?php elseif( has_post_thumbnail() || has_post_format( 'gallery' ) || has_post_format( 'video' ) || has_post_format( 'audio' ) ) : ?>

		<div class="list-post-media <?php if( has_post_format( 'audio' ) ) : ?>audio-thumb<?php endif; ?>">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-image thumb-overlay <?php if( has_post_format( 'video' ) ) : ?>video-thumb<?php endif; ?>">
				<figure>
					<?php wundermag_post_thumb( 'wundermag_300x300' ); ?>
				</figure>
				<div class="thumb-content">
					<div>
						<?php if( has_post_format( 'video' ) ) : ?>
							<div><div class="video-play-icon"></div></div>
						<?php else : ?>
							<h4 class="upper link">
								<?php esc_html_e( 'View Post', 'wundermag' ); ?> <i class="fa fa-angle-right"></i>
							</h4>
						<?php endif; ?>
					</div>
				</div>
			</a>
		</div>

	<?php endif; ?>


	<?php if( !wundermag_get_field( 'set_standout_post' ) == true && !is_sticky() ) : ?>
		<div class="list-post-content">

			<!-- Post Header -->
			<?php get_template_part( 'templates/post', 'header' ); ?>

			<!-- Post Entry -->
			<div class="post-entry-content">
				<?php if( get_theme_mod( 'wundermag_hide_excerpt', true ) == true ) : ?>
					<p><?php echo wundermag_excerpt_limit(29); ?></p>
				<?php endif; ?>
				<?php if( get_theme_mod( 'wundermag_hide_btn_more', true ) == true ) : ?>
					<h4 class="post-read-more">
						<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Continue Reading', 'wundermag' ); ?> <i class="fa fa-angle-right"></i></a>
					</h4>
				<?php endif; ?>
			</div>

		</div>
	<?php endif; ?>

</article><!-- #post-## -->


