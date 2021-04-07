<form class="searchform" method="get" autocomplete="off" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input name="s" type="text" class="vossen-search-input" value="<?php $inputValue; ?>" placeholder="<?php esc_attr_e( ' Search and hit enter...', 'wundermag' ); ?>"/>
	<button class="search-submit-icon" name="submit" type="submit"><i class="fa fa-search"></i></button>
</form>

