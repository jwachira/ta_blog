<?php get_header(); ?>

<div id="content">

<?php get_sidebar(); ?>

<div id="maincol">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">	

<div class="entry">
<div class="entry-inner">

<div class="post-date"><span class="month"><?php the_time('M') ?> </span>
<span class="date"><?php the_time('d') ?></span><span class="year"> <?php the_time('Y') ?></span>
</div>	

<div class="post-title-single">
<h3 class="post-headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
</div>	

<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'sandbox'), "</div>\n", 'number'); ?>		
<?php edit_post_link('Edit', '', ''); ?>

				<div class="post-meta">
					<small><?php printf(__('This entry was written by %1$s and posted on <abbr class="published" title="%2$sT%3$s">%4$s at %5$s</abbr> and filed under %6$s. Bookmark the <a href="%7$s" title="Permalink to %8$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%9$s" title="Comments RSS to %8$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'sandbox'),
						'<span class="author vcard"><a class="url fn n" href="'.get_author_link(false, $authordata->ID, $authordata->user_nicename).'" title="' . sprintf(__('View all posts by %s', 'sandbox'), $authordata->display_name) . '">'.get_the_author().'</a></span>',
						get_the_time('Y-m-d'),
						get_the_time('H:i:sO'),
						the_date('', '', '', false),
						get_the_time(),
						get_the_category_list(', '),
						get_permalink(),
						wp_specialchars(get_the_title(), 'double'),
						comments_rss() ) ?>
						
				</small>
				</div><!-- .post-meta-->
                
                
</div><!-- .entry-inner-->
</div><!-- .entry-->
<?php comments_template(); ?>	
<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
		
</div><!-- .post -->
</div><!-- #maincol -->
</div><!-- #content -->
</div><!-- #wrap -->
</div><!-- #wrapper -->
</div><!-- end universe-->
<?php get_footer(); ?>