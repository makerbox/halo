<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
</head>
<header class="l-header">
	<nav class="c-navbar" data-navbar>
		<div class="c-navbar__inner">
			<a class="c-navbar__title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
			<div class="c-navbar__hamburger" data-hamburger>
				<?php echo get_template_part('svg/svg','hamburger'); ?>
			</div>
			<div class="c-navbar__menu" data-menu>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
			<div class="c-navbar__search">
				<?php get_search_form(); ?>
			</div>
		</div>
	</nav>
</header>
<body <?php body_class(); ?>>

	