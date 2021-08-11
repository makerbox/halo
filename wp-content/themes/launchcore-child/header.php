<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<!-- fontawesome (comment out if not used to avoid uneccessary load) -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"> -->
	<?php wp_head(); ?>
</head>
<header>
	<nav class="c-navbar" data-navbar>
		<div class="c-navbar__menu" data-menu>
			<div class="c-navbar__menu--close" data-menu-toggle>
				<svg xmlns="http://www.w3.org/2000/svg" width="16.707" height="16.707" viewBox="0 0 16.707 16.707">
				  <g id="Group_33" data-name="Group 33" transform="translate(-1774.146 64.854)">
				    <line id="Line_20" data-name="Line 20" x2="16" y2="16" transform="translate(1774.5 -64.5)" fill="none" stroke="#fff" stroke-width="1"/>
				    <line id="Line_21" data-name="Line 21" x1="16" y2="16" transform="translate(1774.5 -64.5)" fill="none" stroke="#fff" stroke-width="1"/>
				  </g>
				</svg>
			</div>
			<div class="c-navbar__menu--menu">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</div>
		<div class="c-navbar__inner">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home" class="c-navbar__logo">
				<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				?>
				<img src="<?php echo esc_url( $logo[0] ); ?>">
			</a>
			<div class="c-navbar__hamburger" data-menu-toggle>
				menu
			</div>
		</div>
	</nav>
</header>
<body <?php body_class(); ?>>

	