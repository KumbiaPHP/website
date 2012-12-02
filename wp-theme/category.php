<?php get_header() ?>
	<div id="content">
		<h1 class="posttitle"><?php single_cat_title() ?></h1>
		<?php echo category_description() ?>
		<?php if (have_posts()) : while (have_posts()) : the_post() ?>
		<div class="post">
			<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>			
			<?php the_excerpt() ?>
		</div>
		<?php endwhile ?>
		<div class="page-nav">
			<?php previous_posts_link('< Previous') ?>
			<?php next_posts_link('Next >') ?>
		</div>
		<?php endif ?>
	</div>
	<?php get_sidebar() ?>
<?php get_footer() ?>
