<?php

	/* Template Name: Blog */

get_header();

$layout_homepage = get_theme_mod( 'layout_homepage', 'list' );
$layout_homepage_first_full = get_theme_mod( 'layout_homepage_first_full_post' );
$default_posts_per_page = get_option( 'posts_per_page' );

global $wp_query;
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

$args = array(
	'posts_per_page' 			=> $default_posts_per_page,
	'posts_per_archive_page' 	=> $default_posts_per_page,
	'showposts' 				=> $default_posts_per_page,
	'post_type'					=> 'post',
	'orderby'					=> 'date',
	'ignore_sticky_posts' 		=> 0,
	'paged'                     => $paged,
);
$posts = new WP_Query( $args );
$wp_query = $posts;

?>

<?php get_header(); ?>

<?php get_template_part( 'templates/hero', 'slider' ); ?>

<div class="home">

	<div class="container">

			<?php wundermag_sidebar( 'left' ) ?>

			<div class="content-area">
				<div class="row posts-row <?php if( $layout_homepage == 'grid' && $layout_homepage_first_full == false || $layout_homepage == 'grid' && is_paged() ) : ?>grid-layout<?php endif; ?>">

					<?php

						if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post();

							if( $layout_homepage == 'list' && $layout_homepage_first_full == true  ) {
								if( $posts->current_post == 0 && !is_paged() ) {
			                        get_template_part( 'templates/content', 'full' );
			                    } else {
			                        get_template_part( 'templates/content', 'list' );
			                    }
							} elseif( $layout_homepage == 'grid' && $layout_homepage_first_full == true  ) {

								if( $posts->current_post == 0 && !is_paged() ) {
									get_template_part( 'templates/content', 'full' );
									?> </div><!-- end row --> <div class="row posts-row grid-layout"> <?php
								} else {
									get_template_part( 'templates/content', 'grid' );
								}

							} else {
								get_template_part( 'templates/content', $layout_homepage );
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

	<?php
	wp_reset_query();
	wp_reset_postdata();
	?>

	<?php get_template_part( 'templates/popular', 'slider' ); ?>

</div>

<?php get_footer(); ?>
