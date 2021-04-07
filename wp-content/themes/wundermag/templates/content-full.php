<article id="post-<?php the_ID(); ?>" class="full-post <?php if( wundermag_get_field( 'set_standout_post' ) == true || is_sticky() ) : ?>standout-post<?php endif; ?>">

	<?php get_template_part( 'templates/post', 'header' ); ?>
	<?php get_template_part( 'templates/post', 'format' ); ?>

	<!-- Post Entry -->
	<div class="post-entry-content">

		<?php if( get_theme_mod( 'full_posts_homepage' ) == true ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<?php if( get_theme_mod( 'wundermag_hide_excerpt', true ) == true ) : ?>
				<?php echo the_excerpt(); ?>
			<?php endif; ?>
		<?php endif; ?>

	</div>

	<?php if( get_theme_mod( 'wundermag_hide_btn_more', true ) == true ) : ?>
		<h4 class="post-read-more">
			<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Continue Reading', 'wundermag' ); ?> <i class="fa fa-angle-right"></i></a>
		</h4>
	<?php endif; ?>

	<!-- Post Bottom -->
	<div class="full-post-bottom">

		<div class="full-post-bottom-left">
			<?php if( get_theme_mod( 'show_full_bottom_author', true ) == true ) : ?>
			<h4 class="upper by-author-author">
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
					<span class="in-cat by-author"><?php esc_html_e( 'by', 'wundermag' ); ?></span>
					<?php echo get_the_author_meta( 'display_name' ); ?>
				</a>
			</h4>
			<?php endif; ?>
		</div>

		<div class="full-post-bottom-right">
			<?php if( get_theme_mod( 'show_full_bottom_share', true ) == true ) : ?>
				<div class="post-share-links">
					<span class="in-cat"><?php esc_html_e( 'Share', 'wundermag' ); ?></span>
					<a target="_blank" title="<?php echo esc_html_e( 'Share on Facebook', 'wundermag' ); ?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
					<a target="_blank" title="<?php echo esc_html_e( 'Share on Twitter', 'wundermag' ); ?>" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>%20-%20<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
					<a target="_blank" title="<?php echo esc_html_e( 'Share on Pinterest', 'wundermag' ); ?>" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>&description=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>"><i class="fa fa-pinterest"></i></a>
					<a target="_blank" title="<?php echo esc_html_e( 'Share on Thumblr', 'wundermag' ); ?>" href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>"><i class="fa fa-tumblr"></i></a>
					<a target="_blank" title="<?php echo esc_html_e( 'Share on Google+', 'wundermag' ); ?>" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
				</div>
			<?php endif; ?>
		</div>

	</div>

</article>


