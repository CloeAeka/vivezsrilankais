<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<?php

	$header_type = get_theme_mod( 'header_type', '1' );

?>

<body <?php body_class(); ?>>

	<?php get_template_part( 'templates/side', 'menu' ); ?>

	<div id="main" class="site">
		<div id="masthead" class="header">

			<?php

				if( $header_type == '2' ) {
					get_template_part( 'templates/header', 'primary2' );
				} else {
					get_template_part( 'templates/header', 'primary1' );
				}

				get_template_part( 'templates/header', 'sticky' );

			?>

		</div>
		<!-- End Header -->
