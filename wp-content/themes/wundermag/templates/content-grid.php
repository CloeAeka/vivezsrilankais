<article id="post-<?php the_ID(); ?>" class="grid-post <?php if( wundermag_get_field( 'set_standout_post' ) == true || is_sticky() ) : ?>standout-post<?php endif; ?>">

	<?php if( has_post_thumbnail() || has_post_format( 'gallery' ) || has_post_format( 'video' ) || has_post_format( 'audio' ) ) : ?>
		<div class="grid-post-media <?php if( has_post_format( 'audio' ) ) : ?>audio-thumb<?php endif; ?>">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-image thumb-overlay <?php if( has_post_format( 'video' ) ) : ?>video-thumb<?php endif; ?>">
				<figure>
					<?php wundermag_post_thumb( 'wundermag_600x400' ); ?>
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
		</div>
	<?php endif; ?>

	<div class="grid-post-content">

		<!-- Post Header -->
		<?php get_template_part( 'templates/post', 'header' ); ?>

		<!-- Post Entry -->
		<div class="post-entry-content">
			<?php if( get_theme_mod( 'wundermag_hide_excerpt', true ) == true ) : ?>
				<p><?php echo wundermag_excerpt_limit(14); ?></p>
			<?php endif; ?>
			<?php if( get_theme_mod( 'wundermag_hide_btn_more', true ) == true ) : ?>
				<h4 class="post-read-more"><a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Continue Reading', 'wundermag' ); ?> <span><i class="fa fa-angle-right"></i></span></a></h4>
			<?php endif; ?>
		</div>

	</div>

</article>

