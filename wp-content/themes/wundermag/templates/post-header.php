	<!-- Post Header -->
	<div class="post-header <?php if( get_theme_mod( 'post_header_align', 'center' ) == 'center' ) : ?>post-header-center<?php endif; ?>">

		<?php if( get_theme_mod('post-header-show-cat', true ) == true ) : ?>
			<?php if( has_category() ) : ?>
				<p class="post-cat"><span class="in-cat"><?php esc_html_e( 'In', 'wundermag' ); ?></span> <?php the_category( ', ' ); ?></p>
			<?php endif; ?>
		<?php endif; ?>

		<?php if(!get_theme_mod( 'wundermag-post-title' )) : ?>

			<?php if(is_single()) : ?>
				<h1 class="post-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php endif; ?>

		<?php endif; ?>

		<p class="post-header-info">

			<?php if( get_theme_mod( 'post-header-show-views', true ) == true ) : ?>
				<span>
					<i class="ion-eye"></i>
					<?php if( wundermag_getPostViews(get_the_ID()) == 0 ) : ?>
						<a href="<?php the_permalink(); ?>"><?php echo wundermag_getPostViews(get_the_ID()); ?></a>
					<?php else : ?>
						<?php echo wundermag_getPostViews(get_the_ID()); ?>
					<?php endif; ?>
				</span>
			<?php endif; ?>

			<?php if( get_theme_mod( 'post-header-show-date', true ) == true ) : ?>
				<span>
					<i class="ion-ios-clock"></i>
					<?php the_time( get_option('date_format') ); ?>
				</span>
			<?php endif; ?>

			<?php if( get_theme_mod( 'post-header-show-comments', true ) == true ) : ?>
				<span>
					<a href="<?php esc_url(comments_link()); ?>">
						<i class="fa fa-commenting"></i>
						<?php comments_number( esc_html__( 'Be first to comment', 'wundermag' ), esc_html__( '1 Comment', 'wundermag' ), '% ' . esc_html__( 'Comments', 'wundermag' ) ); ?>
					</a>
				</span>
			<?php endif; ?>

			<?php if( get_theme_mod( 'post-header-show-author', false ) == true ) : ?>
				<span>
					<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
						<i class="ion-android-create"></i>
						<?php echo get_the_author_meta( 'display_name' ); ?>
					</a>
				</span>
			<?php endif; ?>

		</p>

	</div>
