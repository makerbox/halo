<?php get_header(); ?>
<main class="t-page">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="l-header">
			<h1 class="c-post__title">
				<?php the_title(); ?>
			</h1>
			<?php edit_post_link(); ?>
		</header>
		<div class="c-post__content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			<?php the_content(); ?>
			<div class="c-post__links">
				<?php wp_link_pages(); ?>
			</div>
		</div>
	</article>
	<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	<?php endwhile; endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>