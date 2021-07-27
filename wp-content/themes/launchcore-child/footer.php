	<footer class="c-footer">
		<div class="c-footer__inner">
			<div class="c-footer__menu u-adaptive__mobile">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu') ); ?>
			</div>
			<div class="c-footer__bottom">
				
				<div class="c-footer__menu u-adaptive__desktop">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu') ); ?>
				</div>
				<div class="o-copyright">
					Copyright &copy; <?php echo esc_html( get_bloginfo( 'name' ) ); ?><?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
<script>
	// log the template
	console.log('Current template: <?php echo get_page_template(); ?>');
</script>
</html>