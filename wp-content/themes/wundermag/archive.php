<?php get_header(); ?>

	<div class="archives-container">

		<div class="search-query">
			<div class="container">

				<?php if( is_day() ) : ?>
					<h5><?php esc_html_e( 'Daily Archives', 'wundermag' ); ?></h5>
					<h2><?php printf( esc_html__( '%s', 'wundermag' ), get_the_date() ); ?></h2>

				<?php elseif( is_month() ) : ?>
					<h5><?php esc_html_e( 'Monthly Archives', 'wundermag' ); ?></h5>
					<h2><?php printf( esc_html__( '%s', 'wundermag' ), get_the_date( 'F Y' ) ); ?></h2>

				<?php elseif( is_year() ) : ?>
					<h5><?php esc_html_e( 'Year Archives', 'wundermag' ); ?></h5>
					<h2><?php printf( esc_html__( '%s', 'wundermag' ), get_the_date( 'Y' ) ); ?></h2>

				<?php else : ?>
					<h2><?php esc_html_e( 'Archives', 'wundermag' ); ?></h2>

				<?php endif; ?>

			</div>
		</div>

		<?php get_template_part( 'templates/content', 'archive' ); ?>

	</div>

<?php get_footer(); ?>
