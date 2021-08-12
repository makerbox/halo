	<footer class="p-footer">
		<div class="p-footer__inner">
			<div class="p-footer__left p-footer__half">
				<div>
					<div class="p-footer__headline">
						company details
					</div>
					<div class="p-footer__details">
						<div>P. <a href="tel:12341234">1234 1234</a></div>
						<div>E. <a href="mailto:lorem@ipsum.com">lorem@ipsum.com</a></div>
					</div>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu') ); ?>
			</div>
			<div class="p-footer__right p-footer__half">
				<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				?>
				<img src="<?php echo esc_url( $logo[0] ); ?>">
			</div>
			<div class="p-footer__copyright">
				&copy; 	Copyright  <?php echo esc_html( get_bloginfo( 'name' ) ); ?><?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?>
			</div>
		</div>
			</footer>
			<?php wp_footer(); ?>
		</body>
</html>