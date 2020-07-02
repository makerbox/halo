<?php get_header(); ?>
	<div class="l-content">
		<main class="t-index">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
						get_template_part( 'entry' );
						comments_template();
					endwhile;
				endif;
				get_template_part( 'nav', 'below' );
			?>
		</main>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>