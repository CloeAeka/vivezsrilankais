<?php if ( ! is_active_sidebar( 'sidebar' ) ) { return; } ?>

<aside class="widget-area <?php if( get_theme_mod( 'enable-sticky-sidebar', false ) == true ) : ?>sticky-sidebar<?php endif; ?>">

	<div class="theiaStickySidebar">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>

</aside>
