<?php get_header(); ?>
<main class="t-archive">
	<header class="l-header">
		<h1 class="c-post__title"><?php single_term_title(); ?></h1>
		<div class="c-post__meta">
			<?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?>		
		</div>
	</header>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>