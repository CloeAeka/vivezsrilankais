<?php get_header(); ?>

	<div class="page-container <?php echo wundermag_get_field( 'individual_post_page_layout', $post->ID, '' ); ?>">

		<!-- Page Title & Featured Image Position -->
		<?php wundermag_page_header( 'top' ); ?>

		<div class="container">

			<?php wundermag_sidebar( 'left' ) ?>

			<div class="content-area">
				<div class="row">

					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>">

							<!-- Page Title & Featured Image Position -->
							<?php wundermag_page_header( 'standard' ); ?>

							<div class="page-entry-content">
								<?php the_content(); ?>
							</div>

							<?php
								wp_link_pages(array(
									'before'           => '<div class="pagination-num"><div class="nav-links">',
									'after'            => '</div></div>',
									'link_before'      => '<span class="page-number">',
									'link_after'       => '</span>',
									'next_or_number'   => 'next_and_number',
									'separator'        => ' ',
									'nextpagelink'     => esc_html__( 'Next Page', 'wundermag' ),
									'previouspagelink' => esc_html__( 'Previous Page', 'wundermag' ),
								));
							?>

							<?php if ( comments_open() || get_comments_number() ) { comments_template(); }; ?>

						</article>


					<?php endwhile; ?>

				</div>
			</div>

			<?php wundermag_sidebar( 'right' ) ?>

		</div>
	</div>

<?php get_footer(); ?>


