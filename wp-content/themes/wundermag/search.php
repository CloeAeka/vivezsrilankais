<?php get_header(); ?>

	<div class="archives-container">

		<div class="search-query">
			<div class="container">
				<h5><?php esc_html_e( 'Search results for', 'wundermag' ); ?></h5>
				<h2><?php printf( esc_html__( '%s', 'wundermag' ), get_search_query() ); ?></h2>
			</div>
		</div>

		<div class="container">
			<div class="content-area content-fullwidth">
				<div class="row <?php if( get_theme_mod( 'layout_archive' ) == 'grid' || wundermag_get_field( 'category_post_layout', 'category_' . $cat, '' ) == 'grid' ) : ?>grid-layout<?php endif; ?>">
					<div class="col-md-10 thinwidth-page mr-auto">

						<?php

							$layout_archive = get_theme_mod( 'layout_archive', 'list' );
							$layout_archive_first_full = get_theme_mod( 'layout_archive_first_full_post' );

							if ( have_posts() ) : while ( have_posts() ) : the_post();

								if( $layout_archive == 'list' && $layout_archive_first_full == true ) {
									if( $wp_query->current_post == 0 && !is_paged() ) {
										get_template_part( 'templates/content', 'full' );
									} else {
										get_template_part( 'templates/content', 'list' );
									}
								} elseif( $layout_archive == 'grid' && $layout_archive_first_full == true ) {
									if( $wp_query->current_post == 0 && !is_paged() ) {
										get_template_part( 'templates/content', 'full' );
									} else {
										get_template_part( 'templates/content', 'grid' );
									}
								} else {
									get_template_part( 'templates/content', $layout_archive );
								}

							endwhile;

							else : get_template_part( 'templates/content', 'none' );

							endif;

						?>

					</div>
				</div>

				<div class="row">
					<div class="col-md-12 pagination-num">
						<?php wundermag_pagination_type(); ?>
					</div>
				</div>
				
			</div>
		</div>

	</div>

<?php get_footer(); ?>
