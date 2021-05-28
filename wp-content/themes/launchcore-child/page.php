<?php
	get_header();	
?>
<div class="t-home">
	<?php
		getPart('home','01-intro');
		getPart('home','02-work');
		getPart('home','03-marquee');
		getPart('home','04-culture');
		getPart('home','05-contact');
	?>
</div>
<?php
	get_footer();
?>