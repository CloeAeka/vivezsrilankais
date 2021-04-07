<?php get_header(); ?>

	<div class="archives-container">

		<div class="search-query">
			<div class="container">

				<h5><?php esc_html_e( 'Browsing Tag', 'wundermag' ); ?></h5>
				<h2><?php printf( esc_html__( '%s', 'wundermag' ), single_tag_title( '', false ) ); ?></h2>

			</div>
		</div>

		<?php get_template_part( 'templates/content', 'archive' ); ?>

	</div>

<?php get_footer(); ?>
