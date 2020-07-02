<aside class="t-sidebar">
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
		<div id="primary" class="c-widget-area">
			<ul>
				<?php dynamic_sidebar( 'primary-widget-area' ); ?>
			</ul>
		</div>
	<?php endif; ?>
</aside>