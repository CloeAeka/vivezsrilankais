<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     6.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

do_action( 'woocommerce_product_thumbnails' );

$image      = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
$image_link = wp_get_attachment_url( get_post_thumbnail_id() );

?>

<?php if ( has_post_thumbnail() ) { ?>
	<div class="shop-single-slider vossen-lightbox">

		<div class="shop-single-slider-image">
			<a href="<?php echo esc_url($image_link); ?>" title="<?php echo the_title(); ?>"><?php echo $image; ?></a>
		</div>

		<?php $attachment_ids = $product->get_gallery_image_ids();

		if ( $attachment_ids ) {

			foreach ( $attachment_ids as $attachment_id ) {

				$image_link = wp_get_attachment_url( $attachment_id );

				if (!$image_link) continue;
					$image_link = wp_get_attachment_url( $attachment_id );
					$image		= wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
				?>

				<div class="shop-single-slider-image">
					<a href="<?php echo esc_url($image_link); ?>" title="<?php echo the_title(); ?>"><?php echo $image; ?></a>
				</div>

				<?php

			}

		}

		?>

	</div>

<?php

} else {
	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
}

?>
