<?php

	/* Template Name: Page Empty */

?>

<?php get_header(); ?>

	<div class="page-container <?php echo wundermag_get_field( 'individual_post_page_layout', $post->ID, '' ); ?>">

		<!-- Page Title & Featured Image Position -->
		<?php wundermag_page_header( 'top' ); ?>

		<!-- Page Title & Featured Image Position -->
		<?php wundermag_page_header( 'standard' ); ?>

		<div class="page-entry-content">
			<?php the_content(); ?>
		</div>

	</div>

<?php get_footer(); ?>


