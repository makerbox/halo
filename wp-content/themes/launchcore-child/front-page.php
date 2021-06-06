<?php
	get_header();	
?>
<div class="t-home">
	<div class="c-banner">
		<div class="c-banner__background">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mountains.jpg">
		</div>
		<div class="c-banner__foreground">
			<div class="c-banner__logo">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo.png">
			</div>
		</div>
	</div>
	<div class="t-home__content">
		<div class="t-home__text">
			<div class="t-home__text--heading">
				Coming soon
			</div>
			<div class="t-home__text--paragraph">
				Until then, if you require any information about Halo Mining and our services, please get in touch.
			</div>
		</div>
		<div class="t-home__contact">
			<div class="c-contact-form">
				<?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>
			</div>
		</div>
	</div>
</div>
<?php
	get_footer();
?>