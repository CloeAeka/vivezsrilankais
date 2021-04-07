<?php

	$header_logo = get_theme_mod( 'header_logo', '' );

?>
			<!-- Header Primary -->
			<div class="nav-primary-2">
				<div class="nav-bar site-header">
					<div class="container align-mid">

						<div class="col-md-2 col-sm-12 text-left">

							<!-- Site Title and Logo -->
							<?php if( get_theme_mod( 'show_header_logo', true ) == true ) : ?>
								<div class="header-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
										<?php if( $header_logo !== '' ) : ?>
												<img src="<?php echo esc_url( $header_logo ); ?>" class="header-logo-img" alt="<?php esc_attr(bloginfo( 'name' )); ?>" />
										<?php else : ?>
											<h1><?php echo get_bloginfo( 'name' ); ?></h1>
										<?php endif; ?>
									</a>
								</div>
							<?php endif; ?>
							<!-- End Site Title and Logo -->

						</div>

						<div class="col-md-8 col-xs-hidden text-center">

							<!-- Navigation -->
							<nav class="main-navigation">
								<?php wundermag_primary_menu(); ?>
							</nav>
							<!-- End Navigation -->

						</div>


						<div class="col-md-2 col-sm-12 text-right top-bar-right">

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

							<a href="#search-popup-sticky" class="open-popup-link" data-effect="mfp-move-from-top"><i class="fa fa-search open-overlay-searchz"></i></a>
							<div id="search-popup-sticky" class="mfp-with-anim mfp-hide nav-search">
								<?php get_search_form(); ?>
							</div>

							<a class="open-side-menu"><span class="menu-toggle"><span></span><span></span><span></span><span></span></span></a>

						</div>

					</div>
				</div>
			</div>
			<!-- #Primary -->
