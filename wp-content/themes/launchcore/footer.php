	<footer class="l-footer">
		<div class="l-footer__inner">
			<div class="o-copyright">
				&copy; <?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
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