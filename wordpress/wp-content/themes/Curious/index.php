<?php get_header(); ?>

<div id="content">
<?php get_sidebar(); ?>


<div id="maincol">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">

<div class="entry">
<div class="entry-inner">

<div class="post-date"><span class="month"><?php the_time('M') ?> </span><span class="date"><?php the_time('d') ?></span><span class="year"> <?php the_time('Y') ?></span>
</div>		

<div class="post-title">
<h3 class="post-headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
<div class="post-author"> By <?php the_author_posts_link(); ?> | Filled under: <?php the_category(', ') ?> 
</div>

</div><!--.post-title -->


<?php the_content('read more &raquo;'); ?>

<div class="post-comment">
<small> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | <?php the_tags('Tags: ',', ',''); ?> 
</small>
</div><!--.post-meta -->

</div><!--.entry-inner -->
</div><!--.entry -->

</div><!--.post -->

<?php endwhile; ?>

<?php else : ?>
		
<h3>Not Found</h3>
<p>Sorry, but you are looking for something that isn't here.</p>
			
<?php endif; ?>

<div class="navigation">
<div class="alignleft"><?php next_posts_link('<span class="prev">Older Entries</span>') ?>
</div>
<div class="alignright"><?php previous_posts_link('<span class="next">Recent Entries</span>') ?></div>
</div><!-- .navigation -->


</div><!-- #maincol -->
</div><!-- #content -->

</div><!-- end #wrap -->
</div><!-- end #wrapper -->

</div><!-- end #universe -->
<?php get_footer(); ?>
