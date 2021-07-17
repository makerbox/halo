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
			<div class="c-navbar__menu--menu">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</div>
		<div class="c-navbar__inner">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home" class="c-navbar__logo">
				<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					imageHelper($custom_logo_id, 'Halo Mining logo');
				?>
			</a>
			<div class="c-navbar__hamburger" data-menu-toggle>
				menu
			</div>
		</div>
	</nav>
</header>
<body <?php body_class(); ?>>

	