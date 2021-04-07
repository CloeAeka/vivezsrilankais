<?php

	$header_logo = get_theme_mod( 'header_logo', '' );

?>
			<!-- Primary Nav -->
			<div class="nav-primary">

				<div class="nav-bar site-header">
					<div class="container align-mi">

						<div class="col-md-6 text-left">
							<div class="nav-social">
								<?php get_template_part( 'templates/social', 'media' ); ?><span class="never-empty">&nbsp;</span>
							</div>
						</div>

						<div class="col-md-6 text-right top-bar-right">

							<!-- Shop Cart -->
							<?php if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>

								<a class="wundermag-shop-bag <?php if( WC()->cart->get_cart_contents_count() > 0 ) : ?>shop-bag-notzero<?php endif; ?>" href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" title="<?php esc_attr( esc_html_e( 'View your shopping cart', 'wundermag' ) ); ?>">
									<i class="vs2-shop-bag">
										<?php if( WC()->cart->get_cart_contents_count() >= 0 ) : ?>
											<span class="wundermag-bag-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'wundermag' ), WC()->cart->get_cart_contents_count() ); ?></span>
										<?php endif; ?>
									</i>
								</a>

							<?php endif; ?>
							<!-- End Shop Cart -->
							<a href="#search-popup" class="open-popup-link" data-effect="mfp-move-from-top"><i class="fa fa-search open-overlay-searchz"></i></a>
							<div id="search-popup" class="mfp-with-anim mfp-hide nav-search">
								<?php get_search_form(); ?>
							</div>
							<a class="open-side-menu"><span class="menu-toggle"><span></span><span></span><span></span><span></span></span></a>

						</div>

					</div>
				</div>

				<div class="mid-header">
					<div class="container">

						<div class="col-md-12">

							<!-- Site Title and Logo -->
							<?php if( get_theme_mod( 'show_header_logo', true ) == true ) : ?>
								<div class="header-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
										<?php if( $header_logo !== '' ) : ?>
											<img src="<?php echo esc_url( $header_logo ); ?>" class="header-logo-img" alt="<?php esc_attr(bloginfo( 'name' )); ?>" />
										<?php else : ?>
											<h1><?php echo get_bloginfo( 'name' ); ?></h1>
										<?php endif; ?>
										<?php if ( get_theme_mod( 'header_show_tagline', true ) == true ) : ?>
											<h5><?php echo get_bloginfo( 'description' ); ?></h5>
										<?php endif; ?>
									</a>
								</div>
							<?php endif; ?>
							<!-- End Site Title and Logo -->

							<!-- Navigation -->
							<nav class="main-navigation">
								<?php wundermag_primary_menu(); ?>
							</nav>
							<!-- End Navigation -->

						</div>

					</div>
				</div>

			</div>
			<!-- #Primary Nav -->
