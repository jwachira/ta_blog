<?php get_header(); ?>
	
	<!-- Content -->
	<div id="content">
		
		<?php if (have_posts()) : ?>
		
			<?php while (have_posts()) : the_post(); ?>
				<div class="post">
					<h1 class="post-caption"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php the_content('More &rarr;'); ?>
					<?php comments_template(); ?>
				</div>
			<?php endwhile; ?>
			
		<?php else : ?>
		
			<h1><?php _e('Not Found'); ?></h1>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			
		<?php endif; ?>
		
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>