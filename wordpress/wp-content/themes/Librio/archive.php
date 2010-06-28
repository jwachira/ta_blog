<?php get_header(); ?>
	
	<!-- Content -->
	<div id="content">
		
		<div class="post">
			<?php if (have_posts()) : ?>
			
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
				<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="pagetitle">Archive for the <span><?php single_cat_title(); ?></span> Category</h2>
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="pagetitle">Posts Tagged <span><?php single_tag_title(); ?></span></h2>
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="pagetitle">Archive for <span><?php the_time('F jS, Y'); ?></span></h2>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="pagetitle">Archive for <span><?php the_time('F, Y'); ?></span></h2>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle">Archive for <span><?php the_time('Y'); ?></span></h2>
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle">Author Archive</h2>
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle">Blog Archives</h2>
				<?php } ?>
				
				<ul>
				<?php while (have_posts()) : the_post(); ?>
					
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?></li>
					
				<?php endwhile; ?>
				</ul>
				
			<?php else : ?>
			
				<h1><?php _e('Not Found'); ?></h1>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				
			<?php endif; ?>
		</div>
		
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>