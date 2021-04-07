<?php

$footer_logo                    = get_theme_mod( 'footer_logo', get_template_directory_uri() . '/dist/img/logo-light.png' );
$footer_instagram               = get_theme_mod( 'footer_instagram', '' );
$footer_instagram_number        = get_theme_mod( 'footer_instagram_number', 6 );

?>


	<?php if( is_active_sidebar( 'footer-sidebar' ) ) { ?>
		<div class="footer-widgets">
			<div class="container">
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</div>
		</div>
	<?php } ?>

	<?php if ($footer_instagram !== '') : ?>
		<div id="footer-instagram" class="inview">
			<div class="footer-instagram">
				<?php
					$args = array(
						'username' => $footer_instagram,
						'size' => 'small',
						'number' => $footer_instagram_number,
						'target' => '_blank',
						'link' => ''
					);
					if ( function_exists('wpiw_widget') ) {
						the_widget( 'null_instagram_widget', $args );
					}
				?>
			</div>
		</div>
	<?php endif; ?>

	<footer id="footer" class="footer-one">
		<div class="container">
			<div class="row">

				<?php if( $footer_logo !== '' ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
						<img src="<?php echo esc_url( $footer_logo ); ?>" class="footer-logo-img" alt="<?php esc_attr(bloginfo( 'name' )); ?>" />
					</a>
				<?php } ?>

				<?php if( get_theme_mod( 'footer_menu', false ) == true ) { ?>
					<nav class="main-navigation footer-menu">
						<?php wundermag_footer_menu(); ?>
					</nav>
				<?php } ?>

				<?php if( get_theme_mod( 'footer_social', true ) == true ) { ?>
					<div class="footer-social">
						<?php get_template_part( 'templates/social', 'media' ); ?>
					</div>
				<?php } ?>

				<?php if( !get_theme_mod( 'footer_copyright' ) ) { ?>
					<p class="footer-copyright">
						<?php esc_html_e( '&copy;', 'wundermag' ); ?><?php echo date(' Y '); ?><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( ' - All Rights Reserved.', 'wundermag' ); ?>
					</p>
				<?php } else { ?>
					<p class="footer-copyright"><?php echo wp_kses_post( get_theme_mod( 'footer_copyright' ) ); ?></p>
				<?php } ?>

				<?php if( get_theme_mod( 'footer_to_top', true ) == true ) { ?>
					<div class="footer-to-top">
						<p><a class="scroll-top h4-up"><i class="ion-ios-arrow-up"></i></a></p>
					</div>
				<?php } ?>


			</div>
		</div>
	</footer>

</div><!-- #main -->

<?php wp_footer(); ?>

</body>
</html>
