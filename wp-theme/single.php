<?php get_header() ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post() ?>
		<div class="post">
			<h1 class="posttitle"><?php the_title() ?></h1>				
			<?php the_content() ?>
		</div>
		<?php comments_template() ?>
		<?php endwhile ?>
		<?php endif ?>
	</div>
	<?php get_sidebar() ?>
<?php get_footer() ?>
