<div id="sidebar-right">	
<div id="rightcol" class="sidebar">

<div id="search">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div>

<div class="advertise">
<?php include(TEMPLATEPATH."/sidebar_advertisement.php"); ?>
</div>  

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Column') ) : else : ?>

<h2 class="sidebarimg"><img src="<?php bloginfo('template_directory'); ?>/images/latestnews.png" alt="latest-news" /></h2>
<ul class="latest-news">
<?php
$myposts = get_posts('numberposts=5&offset=0&category=0');
foreach($myposts as $post) :
setup_postdata($post);
?>
<li><span class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
<span class="date_publish"><?php the_time('F j, Y'); ?>.</span>
</li>
<?php endforeach; ?>
</ul>

<h2 class="sidebarimg"><img src="<?php bloginfo('template_directory'); ?>/images/categories.png" alt="categories" /></h2>
<ul class="list-cat">
<?php wp_list_cats('sort_column=name&hide_empty=1'); ?>
</ul>

<h2 class="sidebarimg"><img src="<?php bloginfo('template_directory'); ?>/images/monthlyarchives.png" alt="monthly-archives" /></h2>
<ul class="list-archives">
<?php wp_get_archives('type=monthly'); ?>
</ul>

<h2 class="sidebarimg"><img src="<?php bloginfo('template_directory'); ?>/images/newcomments.png" alt="new-comments" /></h2>
<ul id="recent-comments">
<?php if (function_exists('mdv_recent_comments')) { ?>
<?php mdv_recent_comments(); ?>
<?php } ?>
</ul>

<h2 class="sidebarimg"><img src="<?php bloginfo('template_directory'); ?>/images/blogroll.png" alt="blogroll"/></h2>
<ul>
<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
</ul>

<h2 class="sidebarimg"><img src="<?php bloginfo('template_directory'); ?>/images/tagcloud.png" alt="tag-cloud" /></h2>
<div class="tags">
<?php wp_tag_cloud('smallest=10&largest=22'); ?>	
</div>
  		
<?php endif; ?>

</div><!-- #rightcol -->
</div><!-- #sidebar-right -->