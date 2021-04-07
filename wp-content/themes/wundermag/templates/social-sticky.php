<!-- Post Share Sticky -->
<?php if( get_theme_mod( 'post_share_sticky', true ) == true ) : ?>
	<div class="post-share-sticky share-sticky">
		<div class="theiaStickySidebar">
			<span class="in-cat"><?php esc_html_e( 'Share', 'wundermag' ); ?></span>
			<a class="share-face share-link" data-href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" data-width="526" data-height="680" target="_blank" alt="<?php esc_attr_e( 'Share on Facebook', 'wundermag' ); ?>" title="<?php esc_attr_e( 'Share on Facebook', 'wundermag' ); ?>"><i class="fa fa-facebook"></i></a>
			<a class="share-twitter share-link" data-href="https://twitter.com/intent/tweet?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&url=<?php the_permalink(); ?>&via=<?php get_bloginfo( 'name' ); ?>" data-width="635" data-height="253" target="_blank" alt="<?php esc_attr_e( 'Share on Twitter', 'wundermag' ); ?>" title="<?php esc_attr_e( 'Share on Twitter', 'wundermag' ); ?>"><i class="fa fa-twitter"></i></a>
			<a class="share-pin share-link" data-href="http://pinterest.com/pin/create/link/?url=<?php the_permalink(); ?>&media=<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); echo esc_url( $thumb[0] ); ?>&description=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" data-width="750" data-height="750" target="_blank" alt="<?php esc_attr_e( 'Share on Pinterest', 'wundermag' ); ?>" title="<?php esc_attr_e( 'Share on Pinterest', 'wundermag' ); ?>"><i class="fa fa-pinterest"></i></a>
			<a class="share-gplus share-link" data-href="http://plus.google.com/share?url=<?php the_permalink(); ?>" data-width="400" data-height="620" target="_blank" alt="<?php esc_attr_e( 'Share on Google+', 'wundermag' ); ?>" title="<?php esc_attr_e( 'Share on Google+', 'wundermag' ); ?>"><i class="fa fa-google-plus"></i></a>
			<a class="share-whatsapp" href="https://api.whatsapp.com/send?text=<?php echo urlencode( get_the_permalink() ); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
</a>
			<a class="share-mail" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" target="_top" title="<?php esc_attr_e('Share by Email', 'bloggn'); ?>"><i class="fa fa-envelope"></i></a>
			<a class="comments-scroll" href="#comments" alt="<?php esc_attr_e( 'Comments', 'wundermag' ); ?>" title="<?php esc_attr_e( 'Comments', 'wundermag' ); ?>">
				<?php if ( get_comments_number() > 0 ) : ?>
					<h4><?php echo get_comments_number(); ?></h4>
				<?php endif; ?>
				<i class="fa fa-commenting"></i>
			</a>

		</div>
	</div>
<?php endif; ?>
