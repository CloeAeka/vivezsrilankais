<?php get_header(); ?>

<?php  if (have_posts()) : while ( have_posts() ) : the_post(); ?>

	<div class="single-post
				<?php echo wundermag_get_field( 'individual_post_page_layout', $post->ID, '' ); ?>
				<?php echo wundermag_get_field( 'individual_post_header', $post->ID, '' ); ?>
				<?php if( get_theme_mod( 'post-pin-it', true ) == true ) : ?>pin-enable<?php endif; ?>
				<?php if( get_theme_mod( 'post-lightbox', true ) == true ) : ?>lightbox-enable<?php endif; ?>
				<?php if (get_theme_mod('infinite_scroll_single', false) == true) : ?>infinite-single-enable<?php endif; ?>"
	>
		<!-- Post Header/Media Large & Fullwidth -->
		<?php wundermag_post_header_format( 'top' ); ?>

		<div class="container">

			<?php wundermag_sidebar( 'left' ) ?>

			<div class="content-area my-gallery">
				<div class="row single-post-row">

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'full-post' ); ?>>

						<?php global $page; if ( $page == 1 ) : ?>

							<!-- Post Header/Media -->
							<?php wundermag_post_header_format( 'standard' ) ?>
							<?php wundermag_post_header( 'standard' ) ?>

						<?php endif; ?>

						<!-- Post Content -->
						<div class="post-content">

							<!-- Post Entry -->
							<div class="post-entry-content">

								<?php the_content(); ?>

								<?php
									wp_link_pages(array(
										'before'           => '<div class="pagination-num"><div class="nav-links">',
										'after'            => '</div></div>',
										'link_before'      => '<span class="page-number">',
										'link_after'       => '</span>',
										'next_or_number'   => 'number',
										'echo'             => 1
									));
								?>

								<!-- Post Tags -->
								<?php if( get_theme_mod( 'post_tags', true ) == true || has_tag() ) : ?>
									<div class="post-tags">
										<?php
											if( $tags = get_the_tags() ) {
												foreach( $tags as $tag ) {
													echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '">' . $tag->name . '</a>';
												}
											}
										?>
									</div>
								<?php endif; ?>

							</div>

							<!-- Post Share Sticky -->
							<?php get_template_part('templates/social-sticky'); ?>

						</div>

						<!-- Single Author -->
						<?php if( get_theme_mod( 'single_author_info', true ) == true ) : ?>
							<?php if( get_the_author_meta( 'description' ) ) : ?>

								<div class="author-area">

									<div class="author-img">
										<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
											<?php echo get_avatar( get_the_author_meta( 'ID' ), 145 ); ?>
										</a>
									</div>

									<div class="author-info">

										<h4>
											<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
												<?php echo get_the_author_meta( 'display_name' ); ?>
											</a>
										</h4>

										<p><?php the_author_meta( 'description' ); ?></p>

										<div class="author-social-link">
											<?php if(get_the_author_meta( 'facebook' )) : ?>
												<a href="<?php echo the_author_meta( 'facebook' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'twitter' )) : ?>
												<a href="<?php echo the_author_meta( 'twitter' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'youtube' )) : ?>
												<a href="<?php echo the_author_meta( 'youtube' ); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'vimeo' )) : ?>
												<a href="<?php echo the_author_meta( 'vimeo' ); ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'tumblr' )) : ?>
												<a href="<?php echo the_author_meta( 'tumblr' ); ?>" target="_blank"><i class="fa fa-tumblr"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'bloglovin' )) : ?>
												<a href="<?php echo the_author_meta( 'bloglovin' ); ?>" target="_blank"><i class="fa fa-heart"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'linkedin' )) : ?>
												<a href="<?php echo the_author_meta( 'linkedin' ); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'pinterest' )) : ?>
												<a href="<?php echo the_author_meta( 'pinterest' ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'instagram' )) : ?>
												<a href="<?php echo the_author_meta( 'instagram' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'snapchat' )) : ?>
												<a href="<?php echo the_author_meta( 'snapchat' ); ?>" target="_blank"><i class="fa fa-snapchat-ghost"></i></a>
											<?php endif; ?>
											<?php if(get_the_author_meta( 'googleplus' )) : ?>
												<a href="<?php echo the_author_meta( 'googleplus' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
											<?php endif; ?>

										</div>

									</div>

								</div>

							<?php endif; ?>

						<?php endif; ?>

						<!-- Single Related -->
						<?php if( get_theme_mod( 'single_related', true ) == true ) : ?>
							<?php get_template_part('templates/single_post_related'); ?>
						<?php endif; ?>

						<?php if( get_theme_mod( 'single_comments', true ) == true ) : ?>
							<?php if(!post_password_required()) : ?>
								<?php comments_template(); ?>
							<?php endif; ?>
						<?php endif; ?>

						<!-- Single Pagination -->
						<?php if( get_theme_mod( 'single_pagination', true ) == true ) : ?>

							<?php $prev_post = get_previous_post(); ?>
							<?php $next_post = get_next_post(); ?>

							<?php if( $prev_post || $next_post ) : ?>

								<div class="post-pagination">

									<?php if($prev_post): ?>
										<div class="older-post-link col-md-6">

											<div>
												<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
													<h4>
														<i class="fa fa-angle-left"></i>
														<?php echo esc_html_e( 'Previous Post', 'wundermag' ); ?>
													</h4>
													<p><?php echo wp_trim_words( $prev_post->post_title, 4, '&hellip;' ); ?></p>
												</a>
											</div>

											<div class="post-link-tip">
												<div class="post-tip-img">
													<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
														<?php wundermag_post_pag_thumb_bg( $prev_post, 'wundermag_300x300' ); ?>
													</a>
												</div>
												<div class="post-tip-info">
													<div class="post-tip-info-inner">
														<p class="post-cat"><span class="in-cat"><?php esc_html_e( 'In', 'wundermag' ); ?></span>

															<?php $category = get_the_category( $prev_post->ID ); ?>
															<?php if ( $category[0] ) : ?>
																<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_textarea( $category[0]->cat_name ); ?></a>
															<?php endif; ?>

														</p>
														<h3><a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><?php echo esc_html( $prev_post->post_title ); ?></a></h3>
														<h4 class="upper link">
															<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><?php esc_html_e( 'View Post', 'wundermag' ); ?> <i class="fa fa-angle-right"></i></a>
														</h4>
													</div>
												</div>
											</div>

										</div>
									<?php endif ?>

									<?php if($next_post): ?>
										<div class="newer-post-link col-md-6">
											<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
												<h4>
													<?php echo esc_html_e( 'Next Post', 'wundermag' ); ?>
													<i class="fa fa-angle-right"></i>
												</h4>
												<p class="vs-head-st"><?php echo wp_trim_words( $next_post->post_title, 5, '&hellip;' ); ?></p>
											</a>

											<div class="post-link-tip">
												<div class="post-tip-img">
													<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
														<?php wundermag_post_pag_thumb_bg( $next_post, 'wundermag_300x300' ); ?>
													</a>
												</div>
												<div class="post-tip-info">
													<div class="post-tip-info-inner">
														<p class="post-cat"><span class="in-cat"><?php esc_html_e( 'In', 'wundermag' ); ?></span>

															<?php $category = get_the_category( $next_post->ID ); ?>
															<?php if ( $category[0] ) : ?>
																<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_textarea( $category[0]->cat_name ); ?></a>
															<?php endif; ?>

														</p>
														<h3><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html( $next_post->post_title ); ?></a></h3>
														<h4 class="upper link">
															<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php esc_html_e( 'View Post', 'wundermag' ); ?> <i class="fa fa-angle-right"></i></a>
														</h4>
													</div>
												</div>
											</div>


										</div>
									<?php endif ?>

								</div>

							<?php endif; ?>

						<?php endif; ?>

					</article>

				</div>

				<div class="page-load-status">
					<div class="infinite-scroll-request"><div class="loading"></div></div>
					<p class="infinite-scroll-last"></p>
					<p class="infinite-scroll-error"></p>
				</div>

			</div>

			<?php wundermag_sidebar( 'right' ) ?>

		</div>
	</div>

<?php wundermag_setPostViews(get_the_ID()); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
