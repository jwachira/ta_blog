<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta name="description" content="WordPress Premium Themes" />
	<meta name="keywords" content="wordpress theme, wordpress template, wordpress designer, wordpress blog, wordpress" />
	<meta name="author" content="logicstarstudio" />

	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" type="text/css" media="print" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> (using RSS 2.0)" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> (using RSS .92)" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> (using Atom 0.3)" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 7.]><script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/pngfix.js"></script><![endif]-->
	
	<?php wp_head(); ?>
	<?php wp_get_archives('type=monthly&format=link'); ?>
</head>

<body>


<div id="universe">

<div id="rss">
<a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed for all Posts"> <img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" /></a>
</div>
<div id="cartoon">
 <img src="<?php bloginfo('template_directory'); ?>/images/people.png" alt="people" />
</div>


<div id="header"> 
<!--<div id="logo">
<span><a href="<?php echo get_settings('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/..." alt="logo" /></a></span>
</div>-->
<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
<p class="description"><?php bloginfo('description'); ?></p>
</div> <!-- #header -->

<div id="nav">
<ul>
<li class="<?php if (((is_home()) && !(is_paged())) or (is_archive()) or (is_single()) or (is_paged()) or (is_search())) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>">Home</a>
</li>
<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
</ul>
</div> 

<div id="wrapper">

<div id="wrap">
