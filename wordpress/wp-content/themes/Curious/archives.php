<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">
<?php get_sidebar(); ?>

<div id="maincol">

<div class="entry">
<div class="entry-inner">
<div class="post-title">
<h3 class="post-title-page">Archives</h3>
</div>

<h3>Recent 20 Posts :</h3>
<ul>
<?php wp_get_archives('type=postbypost&limit=20'); ?>
</ul>
<h3>by Category :</h3>
<ul>
<?php wp_list_cats('optioncount=1');?>
</ul>
<h3>by Month :</h3>
<ul>
<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
</ul>

</div><!-- #entry-inner -->
</div><!-- #entry -->

</div><!-- #maincol -->
</div><!-- #content -->
</div><!-- #wrap -->
</div><!-- #wrapper-->
</div><!-- end universe-->
<?php get_footer(); ?>
