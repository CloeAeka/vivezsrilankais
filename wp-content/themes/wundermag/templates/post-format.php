<!-- Post Format Gallery -->
<?php if(has_post_format( 'gallery' )) : ?>
	<?php $images = wundermag_get_field( 'post_format_gallery' ); ?>

	<?php if( $images ) : ?>

		<?php if( wundermag_get_field( 'post_gallery_type' ) == 'justified' ) : ?>

			<div class="post-carousel">
				<div class="gallery justified-gallery vossen-lightbox">
					<?php foreach( $images as $image ) : ?>

						<?php echo wp_get_attachment_link( $image['id'], 'wundermag-thumbnail-300-225' ); ?>

					<?php endforeach; ?>
				</div>
			</div>

	  <?php else : ?>

			<div class="post-carousel">
				<div class="post-slider" data-autoplay="<?php if( get_theme_mod( 'post_slider_autoplay', true ) == true ) : echo get_theme_mod( 'post_slider_speed', '8000' ); endif; ?>">
					<div class="swiper-wrapper">
						<?php foreach( $images as $image) : ?>

							<div class="swiper-slide">
								<figure>

									<?php
										$thumb = wp_get_attachment_image_src( $image['id'], 'full' );
										$thumbnail = wp_get_attachment_image_src( $image['id'], 'wundermag_1140x700');
									?>

									<?php if( get_theme_mod( 'post-lightbox', true ) == true ) : ?>
										<a class="single-lightbox-src" href="<?php echo esc_url( $thumb[0] ); ?>" onclick="return false;">
											<img src="<?php echo esc_url( $thumbnail[0] ); ?>"/>
											<span class="img-lightbox-overlay"><i class="fa fa-search"></i></span>
										</a>
									<?php else : ?>
										<img src="<?php echo esc_url( $thumbnail[0] ); ?>"/>
									<?php endif; ?>
									<?php if( get_theme_mod( 'post-pin-it', true ) == true ) : ?>
										<a class="append-pinterest icon-pinterest" href="http://www.pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url( $thumb ); ?>&amp;media=<?php echo esc_url( $thumb ); ?>&amp;is_video=false&amp;" target="_blank">
											<i class="fa fa-pinterest"> <span><?php echo esc_html_e( 'Pin It', 'wundermag' ); ?></span></i>
										</a>
									<?php endif; ?>

								</figure>
							</div>

						<?php endforeach; ?>
					</div>
					<div class="swiper-pagination swiper-pag-outside-alt post-slider-pag"></div>
				</div>
			</div>

		<?php endif; ?>

	<?php endif; ?>

<!-- Post Format Video -->
<?php elseif(has_post_format('video')) : ?>

	<?php if( is_single() ) : ?>
		<?php if( wundermag_get_field( 'post_format_video' ) ) : ?>
			<?php
				$video_url = wundermag_get_field( 'post_format_video', false, false, false );
				$video_thumb_url = wundermag_get_video_thumbnail_uri($video_url);
			?>

			<div class="post-video">
				<div class="thumb-holder thumb-bg" data-video-thumb="<?php echo esc_url( $video_thumb_url ); ?>" >
					<div class="video-play-center">
						<div class="video-play-icon play-lg"></div>
					</div>
				</div>
				<?php echo wundermag_get_field( 'post_format_video' ); ?>
			</div>
		<?php endif; ?>
	<?php else : ?>

	<?php endif; ?>

<!-- Post Format Audio -->
<?php elseif(has_post_format('audio')) : ?>

	<div class="post-audio">
		<?php echo wundermag_get_field( 'post_format_audio' ); ?>
	</div>

<!-- Post Format Link -->
<?php elseif(has_post_format('link')) : ?>

	<div class="post-link">
		<?php echo wundermag_get_field( 'post_format_link' ); ?>
	</div>

<!-- Post Format Image -->
<?php else : ?>

	<?php if(has_post_thumbnail()) : ?>
		<div class="post-image">

			<?php
				if( get_theme_mod( 'disable_single_featured_crop', false ) == true ) {
					$single_img_size = 'full';
				} else {
					$single_img_size = 'wundermag_1140x700';
				}

				$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $single_img_size );
			?>

			<?php if(is_single()) : ?>
				<figure>

					<?php if( get_theme_mod( 'post-lightbox', true ) == true ) : ?>
						<a class="single-lightbox-src" href="<?php echo esc_url( $thumb[0] ); ?>" onclick="return false;">
							<img src="<?php echo esc_url( $thumbnail[0] ); ?>" title="<?php echo the_post_thumbnail_caption(); ?>" alt="<?php echo get_the_title(); ?>"/>
							<span class="img-lightbox-overlay"><i class="fa fa-search"></i></span>
						</a>
					<?php else : ?>
						<?php the_post_thumbnail( 'wundermag_1140x700' ); ?>
					<?php endif; ?>
					<?php if( get_theme_mod( 'post-pin-it', true ) == true ) : ?>
						<a class="append-pinterest icon-pinterest" href="http://www.pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url( $thumb[0] ); ?>&amp;media=<?php echo esc_url( $thumb[0] ); ?>&amp;is_video=false&amp;description=<?php the_title(); ?>" target="_blank">
							<i class="fa fa-pinterest"> <span><?php echo esc_html_e( 'Pin It', 'wundermag' ); ?></span></i>
						</a>
					<?php endif; ?>
					<figcaption class="wp-caption-text"><?php echo the_post_thumbnail_caption(); ?></figcaption>
				</figure>
			<?php else : ?>
				<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail( $single_img_size ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php endif; ?>
