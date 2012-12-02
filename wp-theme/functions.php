<?php
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'mythemename' ),
) );
register_sidebar(
	array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => 'The primary widget area',
		'before_widget' => '<div id="%1$s" class="smallcol %2$s">',
		'after_widget' => '<div class="smallcolfooter"></div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	)
);

