	<footer class="c-footer">
		<div class="c-footer__inner">
			<div class="c-footer__menu u-adaptive__mobile">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu') ); ?>
			</div>
			<div class="c-footer__bottom">
				<div class="o-copyright">
					Copyright &copy; <?php echo esc_html( get_bloginfo( 'name' ) ); ?><?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?>
				</div>
				<div class="c-footer__menu u-adaptive__desktop">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu') ); ?>
				</div>
				<div class="c-footer__social">
					<a href="" class="c-footer__social--link">
						<svg xmlns="http://www.w3.org/2000/svg" width="29.648" height="29.469" viewBox="0 0 29.648 29.469">
						  <path id="Icon_simple-facebook" data-name="Icon simple-facebook" d="M29.648,14.824A14.824,14.824,0,1,0,12.508,29.468V19.109H8.744V14.824h3.764V11.558c0-3.715,2.213-5.768,5.6-5.768a22.8,22.8,0,0,1,3.318.29V9.728H19.556a2.143,2.143,0,0,0-2.416,2.315v2.781h4.111l-.657,4.285H17.141V29.468A14.828,14.828,0,0,0,29.648,14.824Z" fill="#000"/>
						</svg>
					</a>
					<a href="" class="c-footer__social--link">
						<svg xmlns="http://www.w3.org/2000/svg" width="29.475" height="29.468" viewBox="0 0 29.475 29.468">
						  <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram" d="M14.735,9.417a7.555,7.555,0,1,0,7.555,7.555A7.543,7.543,0,0,0,14.735,9.417Zm0,12.467a4.912,4.912,0,1,1,4.912-4.912,4.921,4.921,0,0,1-4.912,4.912ZM24.362,9.107A1.762,1.762,0,1,1,22.6,7.345,1.758,1.758,0,0,1,24.362,9.107Zm5,1.789a8.721,8.721,0,0,0-2.38-6.174,8.778,8.778,0,0,0-6.174-2.38c-2.433-.138-9.725-.138-12.158,0A8.766,8.766,0,0,0,2.479,4.715,8.749,8.749,0,0,0,.1,10.889C-.04,13.322-.04,20.615.1,23.048a8.721,8.721,0,0,0,2.38,6.174A8.789,8.789,0,0,0,8.653,31.6c2.433.138,9.725.138,12.158,0a8.721,8.721,0,0,0,6.174-2.38,8.778,8.778,0,0,0,2.38-6.174c.138-2.433.138-9.719,0-12.152ZM26.223,25.658a4.973,4.973,0,0,1-2.8,2.8c-1.94.769-6.543.592-8.686.592s-6.753.171-8.686-.592a4.973,4.973,0,0,1-2.8-2.8c-.769-1.94-.592-6.543-.592-8.686s-.171-6.753.592-8.686a4.973,4.973,0,0,1,2.8-2.8c1.94-.769,6.543-.592,8.686-.592s6.753-.171,8.686.592a4.973,4.973,0,0,1,2.8,2.8c.769,1.94.592,6.543.592,8.686S26.992,23.725,26.223,25.658Z" transform="translate(0.005 -2.238)" fill="#000"/>
						</svg>
					</a>
					<a href="" class="c-footer__social--link">
						<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-twitter" viewBox="0 0 20 20"><path fill="#000" d="M19.551 4.208q-.815 1.202-1.956 2.038 0 .082.02.255t.02.255q0 1.589-.469 3.179t-1.426 3.036-2.272 2.567-3.158 1.793-3.963.672q-3.301 0-6.031-1.773.571.041.937.041 2.751 0 4.911-1.671-1.284-.02-2.292-.784T2.456 11.85q.346.082.754.082.55 0 1.039-.163-1.365-.285-2.262-1.365T1.09 7.918v-.041q.774.408 1.773.448-.795-.53-1.263-1.396t-.469-1.864q0-1.019.509-1.997 1.487 1.854 3.596 2.924T9.81 7.184q-.143-.509-.143-.897 0-1.63 1.161-2.781t2.832-1.151q.815 0 1.569.326t1.284.917q1.345-.265 2.506-.958-.428 1.386-1.732 2.18 1.243-.163 2.262-.611z"/></svg>
					</a>
				</div>
				<script>
					// little shiv for the dots, because they need to be between the li elements
					jQuery(document).find('.c-footer__menu li').after('<div class="c-footer__menu--dot"></div>');
				</script>
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