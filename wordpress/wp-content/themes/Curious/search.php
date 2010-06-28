<?php get_header(); ?>

<div id="content">
<?php get_sidebar(); ?>


<div id="maincol">
<h2 class="pagetitle">Search Results for '<?php echo $s; ?>'</h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>">
<div class="entry">
<div class="entry-inner">
<div class="post-title">
<h3 class="post-headline-result"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
</div>

<?php the_excerpt(); ?>
</div><!--.entry-inner-->
</div><!--.entry-->
</div><!--#post-->

<?php endwhile; ?>

<div class="navigation">
<div class="alignleft"><?php next_posts_link('<span class="prev">Older Entries</span>') ?>
</div>
<div class="alignright"><?php previous_posts_link('<span class="next">Recent Entries</span>') ?></div>
</div><!-- .navigation -->

			
<?php else : ?>
<h3 class="nothing">Sorry, nothing found.</h3>
<?php endif; ?>

</div><!-- #maincol-->

</div><!-- #content -->

</div><!-- #wrap -->

</div><!-- #wrapper -->
</div><!-- #universe -->


<?php get_footer(); ?>