<?php get_header() ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post() ?>
		<div class="post">				
			<?php the_content() ?>
		</div>
		<?php endwhile ?>
		<?php endif ?>
		<div id="latest">
			<?php
			$args = array('post_type' => 'post', 'posts_per_page' => 5, 'orderby' => 'post_date', 'order' => 'DESC' );
			$the_query = new WP_Query( $args );
			echo '
			<h2>Latest blog posts</h2>
			<ul>';
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo .= '
				<li>
					<a href="'.get_permalink().'">'.get_the_title().'</a><br />
					'.get_the_excerpt().'
				</li>';
				}
			} else {
				echo '
				<li>Sorry, no posts right now.</li>';
			}
			wp_reset_postdata();
			echo '
			</ul>';
			?>
		</div>
	</div>
	<?php get_sidebar() ?>
<?php get_footer() ?>
