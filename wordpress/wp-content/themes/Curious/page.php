<?php get_header(); ?>

<div id="content">
<?php get_sidebar(); ?>

<div id="maincol">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<div class="entry">
<div class="entry-inner">

<div class="post-title">
<h3 class="post-title-page"><?php the_title(); ?></h3>
</div>

<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
<?php link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'sandbox'), "</div>\n", 'number'); ?>	
</div><!-- .entry-inner -->
</div><!-- .entry -->

</div><!-- .post -->

<?php endwhile; endif; ?>
</div><!-- #maincol-->
</div><!-- #content -->
</div><!-- #wrap -->
</div><!-- #wrapper -->
</div><!-- end universe-->

<?php get_footer(); ?>