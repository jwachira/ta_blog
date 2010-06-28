<?php get_header(); ?>
	
	<!-- Content -->
	<div id="content">
		
		<h1>Search: <span><?php the_search_query(); ?></span></h1>
		<?php if (have_posts()) : ?>
			<div class="post">
				<ul>
					<?php while (have_posts()) : the_post(); ?>
						
							<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?></li>
						
					<?php endwhile; ?>
				</ul>
			</div>

		<?php else : ?>
		
			<div class="post">
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>		
			</div>
		
		<?php endif; ?>
		
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>