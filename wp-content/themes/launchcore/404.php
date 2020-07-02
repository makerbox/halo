<?php get_header(); ?>
<main class="t-404">
	<article id="post-0" class="c-post">
		<header class="l-header">
			<h1 class="c-post__title">
				<?php esc_html_e( 'Not Found', 'blankslate' ); ?>
			</h1>
		</header>
		<div class="c-post__content">
			<p>
				<?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'blankslate' ); ?>		
			</p>
			<?php get_search_form(); ?>
		</div>
	</article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>