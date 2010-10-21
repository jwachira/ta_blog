<?php
/**
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );


/**
 * Remove junk from head
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


/**
 * Sets the post excerpt length to 45 words.
 */
function unisphere_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'unisphere_excerpt_length' );


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis
 */
function unisphere_auto_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'unisphere_auto_excerpt_more' );


/**
 * Styles read more link
 */
function unisphere_more_link($link) {
  $link = str_replace( 'more-link', 'button rounded-all more-link-full', $link );
  $link = preg_replace('/<a(.*?)>(.*?)<\/a>/im', '<a$1>' . __( 'Read more &raquo;', 'unisphere' ) . '</a>', $link);
  
  return $link;
}

add_filter( 'the_content_more_link', 'unisphere_more_link' );



/**
 * Gets a specific number of words from a string and appends an ellipsis.
 */
function unisphere_custom_excerpt( $excerpt, $num_words ) {
	$excerpt = explode (' ', $excerpt);
	$excerpt = array_slice ($excerpt, 0, $num_words);
	return implode (' ', $excerpt) . '&hellip;';
}


/**
 * Exclude slider images from showing in the search results
 */
function unisphere_search_filter($query) {
    if ($query->is_search) {
		$query->set('post_type', array('post', 'page', 'portfolio'));
    }
    return $query;
}
add_filter('pre_get_posts', 'unisphere_search_filter');


function unisphere_portfolio_preset_content() {
	global $post;

	if ( $post->post_content == '' && $post->post_type == 'portfolio' ) {
		$default_content = '
[one_half]
	<p>
		<strong>Client:</strong> John Doe<br>
		<strong>Project:</strong> Breeze Corporate and Portfolio Wordpress Theme<br>
		<strong>Expertise:</strong> Web Design/HTML and Wordpress Development
	</p>
[/one_half]

[one_half_last]
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra lobortis dapibus. Vestibulum et purus sed ipsum molestie blandit quis vitae quam. In et erat vel dui lacinia ultrices vitae in augue. Nunc erat est, pharetra ut iaculis at, posuere ac eros. Nullam eu enim ligula, mattis luctus augue. Phasellus eget egestas risus. Aliquam eget tortor a leo accumsan semper. Sed tincidunt fermentum lobortis. Vivamus volutpat volutpat diam non laoreet. Cras imperdiet sem felis. Praesent et tortor tortor.</p>
[/one_half_last]';
	} else {
		$default_content = $post->post_content;
	} 

	return $default_content;
}

add_filter('the_editor_content', 'unisphere_portfolio_preset_content');


/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'unisphere', TEMPLATEPATH . '/languages' );
?>