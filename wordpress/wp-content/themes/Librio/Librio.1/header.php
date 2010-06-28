<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" type="text/css" media="print" />
	<?php wp_head(); ?>
</head>

<body>

<div id="container">

	<!-- Header -->
	<div id="header">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a><span><?php bloginfo('description'); ?></span></h1>
		<div id="search">
			<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
			</form>
		</div>
	</div>
	
	<!-- Navigation -->
	<div id="nav">
		<ul>
			<li <?php if(!is_page()) echo 'class="current_page_item"'; ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
			<?php wp_list_pages('title_li='); ?>
		</ul>
		<a href="<?php bloginfo('rss2_url'); ?>" id="feed" title="Subscribe to the feed"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.gif" alt="Subscribe" /></a>
	</div>