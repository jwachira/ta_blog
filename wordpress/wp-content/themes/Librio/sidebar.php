	<!-- Sidebar -->
	<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<div class="block author">
			<h3>AUTHOR</h3>
			<p>Hi to all, I'm Steve Jobs. This is my personal blog tra ta ta.</p>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/avatar.jpg" alt="Avatar" />
		</div>
		
		<div class="block">
			<h3>CATEGORY</h3>
			<ul>
				<?php wp_list_categories('orderby=name&show_count=0&title_li='); ?>
			</ul>
		</div>
		
		<div class="block">
			<h3>ARCHIVE</h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</div>
		
		<div class="block">
			<h3>BLOGROLL</h3>
			<ul>
				<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
			</ul>
		</div>
	<?php endif; ?>
	</div>