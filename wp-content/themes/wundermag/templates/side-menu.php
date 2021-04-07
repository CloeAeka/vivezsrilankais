	<div id="side-menu" class="sidenav">
		<div class="side-menu-container">
			<span class="close-side-menu"><i class="ion-android-close"></i></span>
			<nav class="side-menu-nav">
				<?php wundermag_side_menu(); ?>
			</nav>
			<div class="side-menu-widgets widget-area">
				<?php dynamic_sidebar( 'side_menu_sidebar' ); ?>
			</div>
		</div>
	</div>
	<div class="side-overlay"></div>
