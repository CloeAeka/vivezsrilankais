<?php
$footer_instagram_likes         = get_theme_mod( 'footer_instagram_likes', true );
$footer_instagram_comments      = get_theme_mod( 'footer_instagram_comments', true );
$footer_instagram_description   = get_theme_mod( 'footer_instagram_description', false );
$footer_instagram_number        = get_theme_mod( 'footer_instagram_number', 6 );
?>

	<li data-instagram-width="<?php echo esc_html( $footer_instagram_number ); ?>">

		<a href="<?php echo esc_url( $item['link'] ); ?>" target="<?php echo esc_attr( $target ); ?>"  class="<?php echo esc_attr( $aclass ); ?>">
			<img src="<?php echo esc_url( $item[$size] ); ?>" alt="<?php echo esc_html( $item['description'] ); ?>">
			<div class="instagram-overlay">
				<div class="instagram-meta">
					<div>
						<?php if ($footer_instagram_likes == true ): ?>
							<span class="instagram-likes"><i class="fa fa-heart"></i> <?php echo wundermag_count_format( $item['likes'] ); ?></span>
						<?php endif; ?>
						<?php if ($footer_instagram_comments == true) : ?>
							<span class="instagram-comments"><i class="fa fa-commenting"></i> <?php echo wundermag_count_format( $item['comments'] ); ?></span>
						<?php endif; ?>
						<?php if ($footer_instagram_description == true) : ?>
							<p class="instagram-description"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</a>

	</li>

<?php
