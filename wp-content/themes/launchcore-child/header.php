<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<!-- Hotjar Tracking Code for https://fivebyfiveau.wpengine.com/ -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:1931798,hjsv:6};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174566580-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-174566580-1');
	</script>
	
	<?php wp_head(); ?>
</head>
<header class="p-header">
	<div class="c-navbar">
		<div class="c-navbar__logo">
			<?php the_custom_logo(); ?>
		</div>
		<div class="c-navbar__right">
			<div class="c-navbar__menu">
			</div>
			<div class="c-navbar__contact">
				<div class="c-navbar__contact--button c-navbar__contact--phone">
					<a href="tel:610280076474"><i class="fa fa-phone"></i>+61 02 8007 6474</a>
				</div>
				<div class="c-navbar__contact--button c-navbar__contact--email">
				</div>
			</div>
		</div>
	</div>
</header>
<body <?php body_class(); ?>>

	