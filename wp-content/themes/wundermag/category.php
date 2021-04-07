<?php get_header(); ?>

	<div class="archives-container <?php echo wundermag_get_field( 'individual_cat_sidebar', 'category_' . $cat, '' ); ?>">

		<?php get_template_part( 'templates/content', 'archive' ); ?>

	</div>

<?php get_footer(); ?>
