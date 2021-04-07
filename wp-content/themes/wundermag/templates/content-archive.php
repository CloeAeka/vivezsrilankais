<?php

$global_layout_archive = get_theme_mod( 'global_layout_archive', 'list' );
$global_layout_archive_first = get_theme_mod( 'global_layout_archive_first' );
$individual_cat_layout = wundermag_get_field( 'individual_cat_layout', 'category_' . $cat, '' );

?>

		<div class="container">

			<?php wundermag_sidebar( 'left' ) ?>

			<div class="content-area">

				<!-- Cat List -->
				<?php if ( is_category() ) : ?>

				<div class="category-query">
					<div class="container">

						<h2><?php printf( esc_html__( '%s', 'wundermag' ), single_cat_title( '', false ) ); ?></h2>

						<div class="category-cat-list">
							<?php

								$count = count( get_categories( array(
									'parent' => 0,
									'hide_empty' => 0
								)));

								if ( $count > 1 ) {

									$current = get_category( get_query_var('cat') );
									$current_id = $current->term_id; ?>

									<ul class="list-categories">
										<?php
										wp_list_categories( array(
											'echo' => true,
											'current_category' => $current_id,
											'title_li' => '',
											'order' => 'DESC',
										));
										?>
									</ul>
									<?php

								} else {
									the_page_title();
								}

								if ( category_description() ) {
									?>
									<div class="category-description">
										<?php echo category_description(); ?>
									</div>
									<?php
								} ?>
						</div>

					</div>
				</div>

				<?php endif; ?>
				<!-- #Cat List -->

				<div class="row posts-row <?php if( $global_layout_archive == 'grid' && $global_layout_archive_first == false && $individual_cat_layout == '' || $individual_cat_layout == 'grid' || $global_layout_archive == 'grid' && is_paged() || $individual_cat_layout == 'grid' && is_paged() || $individual_cat_layout == 'full-grid' && is_paged() ) : ?>grid-layout<?php endif; ?>">

					<?php

						if ( have_posts() ) : while ( have_posts() ) : the_post();

							if( $individual_cat_layout == 'full' ) {
								get_template_part( 'templates/content', 'full' );
							} elseif( $individual_cat_layout == 'list' ) {
								get_template_part( 'templates/content', 'list' );
							} elseif( $individual_cat_layout == 'grid' ) {
								get_template_part( 'templates/content', 'grid' );
							} elseif( $individual_cat_layout == 'full-list' ) {
								if( $wp_query->current_post == 0 && !is_paged() ) {
									get_template_part( 'templates/content', 'full' );
								} else {
									get_template_part( 'templates/content', 'list' );
								}
							} elseif( $individual_cat_layout == 'full-grid' ) {
								if( $wp_query->current_post == 0 && !is_paged() ) {
									get_template_part( 'templates/content', 'full' );
									?> </div><!-- end row --> <div class="row posts-row grid-layout"> <?php
								} else {
									get_template_part( 'templates/content', 'grid' );
								}
							} elseif( $global_layout_archive == 'list' && $global_layout_archive_first == true ) {
								if( $wp_query->current_post == 0 && !is_paged() ) {
									get_template_part( 'templates/content', 'full' );
								} else {
									get_template_part( 'templates/content', 'list' );
								}
							} elseif( $global_layout_archive == 'grid' && $global_layout_archive_first == true ) {
								if( $wp_query->current_post == 0 && !is_paged() ) {
									get_template_part( 'templates/content', 'full' );
									?> </div><!-- end row --> <div class="row grid-layout"> <?php
								} else {
									get_template_part( 'templates/content', 'grid' );
								}
							} else {
								get_template_part( 'templates/content', $global_layout_archive );
							}

						endwhile;

						else : get_template_part( 'templates/content', 'none' );

						endif;

					?>

				</div>

				<div class="row">
					<div class="col-md-12 pagination-num">
						<?php wundermag_pagination_type(); ?>
					</div>
				</div>

			</div>

			<?php wundermag_sidebar( 'right' ) ?>

		</div>
