<?php get_header(); ?>
<main class="t-author">
	<header class="l-header">
		<?php the_post(); ?>
		<h1 class="c-post__title"><?php the_author_link(); ?></h1>
		<div class="c-post__meta">
			<?php if ( '' != get_the_author_meta( 'user_description' ) ) { echo esc_html( get_the_author_meta( 'user_description' ) ); } ?>
		</div>
		<?php rewind_posts(); ?>
	</header>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	<?php endwhile; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>