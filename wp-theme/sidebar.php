<div id="sidebar">
	<ul>
		<?php
		if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
		<li id="search" class="widget-container widget_search">
			<?php get_search_form() ?>
		</li>
		<?php endif ?>
	</ul>
</div>

