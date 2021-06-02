<?php get_header(); ?>
<main id="content">
	<?php if ( have_posts() ) : ?>
	<div class="c-search__heading">
			<?php printf( esc_html__( 'Search Results for: %s' ), get_search_query() ); ?>
	</div>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	<?php endwhile; ?>
		<?php get_template_part( 'nav', 'below' ); ?>
	<?php else : ?>
	<article id="post-0" class="c-post no-results not-found">
		<header class="l-header">
			<h1 class="c-post__title">Nothing found</h1>
		</header>
		<div class="c-post__content">
			<p>Sorry, nothing matched your search. Please try again.</p>
			<?php get_search_form(); ?>
		</div>
	</article>
	<?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>