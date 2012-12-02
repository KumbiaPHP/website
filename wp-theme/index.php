<?php get_header() ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post() ?>
		<div class="post">
			<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>				
			<?php the_content();//the_excerpt() ?>
		</div>
		<?php endwhile ?>
		<?php endif ?>
	</div>
	<?php get_sidebar() ?>
<?php get_footer() ?>
