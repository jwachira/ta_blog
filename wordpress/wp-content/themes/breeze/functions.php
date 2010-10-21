<?php
/**
 * UniSphere framework functions
 */

/**
 * Define framework contants
 */
define( 'UNISPHERE_THEMENAME', 'Breeze' ); // The theme name
define( 'UNISPHERE_THEMESHORTNAME', 'breeze' ); // The theme short name
define( 'UNISPHERE_THEMEOPTIONS', 'breeze' ); // The theme database option variable

// Folder shortcuts
define( 'UNISPHERE_LIBRARY', TEMPLATEPATH . '/library' ); // Shortcut to point to the /library/ dir
define( 'UNISPHERE_ADMIN', UNISPHERE_LIBRARY . '/admin' ); // Shortcut to point to the /admin/ dir

// URI shortcuts
define( 'UNISPHERE_CSS', get_bloginfo( 'template_url' ) . '/css', true ); // Shortcut to point to the /css/ URI
define( 'UNISPHERE_IMAGES', get_bloginfo( 'template_url' ) . '/images', true ); // Shortcut to point to the /images/ URI
define( 'UNISPHERE_JS', get_bloginfo( 'template_url' ) . '/js', true ); // Shortcut to point to the /js/ URI
define( 'UNISPHERE_ADMIN_CSS', get_bloginfo( 'template_url' ) . '/library/admin/css', true ); // Shortcut to point to the /library/admin/css/ URI
define( 'UNISPHERE_ADMIN_IMAGES', get_bloginfo( 'template_url' ) . '/library/admin/images', true ); // Shortcut to point to the /library/admin/images/ URI
define( 'UNISPHERE_ADMIN_JS', get_bloginfo( 'template_url' ) . '/library/admin/js', true ); // Shortcut to point to the /library/admin/js/ URI


/**
 * Include required framework files
 */
require_once(UNISPHERE_LIBRARY . '/options.php');
require_once(UNISPHERE_LIBRARY . '/misc.php');
require_once(UNISPHERE_LIBRARY . '/post-types.php');
require_once(UNISPHERE_LIBRARY . '/semantic-classes.php');
require_once(UNISPHERE_LIBRARY . '/scripts.php');
require_once(UNISPHERE_LIBRARY . '/menus.php');
require_once(UNISPHERE_LIBRARY . '/media.php');
require_once(UNISPHERE_LIBRARY . '/helpers.php');
require_once(UNISPHERE_LIBRARY . '/widgets.php');
require_once(UNISPHERE_LIBRARY . '/gallery.php');
require_once(UNISPHERE_LIBRARY . '/custom-fields.php');
require_once(UNISPHERE_LIBRARY . '/shortcodes.php');
require_once(UNISPHERE_LIBRARY . '/comments.php');
require_once(UNISPHERE_LIBRARY . '/widgets/popular-posts.php');
require_once(UNISPHERE_LIBRARY . '/widgets/recent-posts.php');
require_once(UNISPHERE_LIBRARY . '/widgets/twitter.php');
require_once(UNISPHERE_LIBRARY . '/widgets/contact-form.php');
require_once(UNISPHERE_ADMIN . '/start.php');

require_once(UNISPHERE_LIBRARY . '/wpml-integration.php'); // Load WPML functions 
require_once(UNISPHERE_LIBRARY . '/wpml-strings.php'); // Prepare the theme's dynamic strings for WPML translation

/**
 * Add default theme options to database on theme activation
 */ 
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	unisphere_add_default_option( 'skin', 'light/blue.css' );
	unisphere_add_default_option( 'layout', 'Wide' );
	unisphere_add_default_option( 'background', 'background1.jpg' );
	unisphere_add_default_option( 'font', 'Sansation' );
	unisphere_add_default_option( 'slider', 'Normal' );
	unisphere_add_default_option( 'slider_posts_number', '3' );
	unisphere_add_default_option( 'slider_seconds', '4000' );
	unisphere_add_default_option( 'slider_transition_seconds', '500' );
	unisphere_add_default_option( 'slider_slices', '15' );
	unisphere_add_default_option( 'slider_effect', 'random' );
	unisphere_add_default_option( 'show_3_home_sections', '1' );
	unisphere_add_default_option( 'home_section_1', "<h3>Box Title 1</h3>\n<span class=\"meta\">box sub-title 1</span>\n<p><img src=\"http://www.unispheredesign.com/demo/assets/breeze/280x110.jpg\" alt=\"placeholder image\" class=\"rounded-all\" /></p>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec.</p>" );
	unisphere_add_default_option( 'home_section_2', "<h3>Box Title 2</h3>\n<span class=\"meta\">box sub-title 2</span>\n<p><img src=\"http://www.unispheredesign.com/demo/assets/breeze/280x110.jpg\" alt=\"placeholder image\" class=\"rounded-all\" /></p>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec.</p>" );
	unisphere_add_default_option( 'home_section_3', "<h3>Box Title 3</h3>\n<span class=\"meta\">box sub-title 3</span>\n<p><img src=\"http://www.unispheredesign.com/demo/assets/breeze/280x110.jpg\" alt=\"placeholder image\" class=\"rounded-all\" /></p>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec.</p>" );
	unisphere_add_default_option( 'show_home_portfolio', '1' );
	unisphere_add_default_option( 'home_portfolio_title', 'Latest from our Portfolio' );
	unisphere_add_default_option( 'home_portfolio_subtitle', 'check out our most recent work' );
	unisphere_add_default_option( 'home_portfolio_button_text', 'View Portfolio' );
	unisphere_add_default_option( 'home_portfolio_button_link', '/portfolio' );
	unisphere_add_default_option( 'show_home_blog', '1' );
	unisphere_add_default_option( 'home_blog_title', 'Latest from our Blog' );
	unisphere_add_default_option( 'home_blog_subtitle', 'check out our most recent news' );
	unisphere_add_default_option( 'home_blog_button_text', 'Read the Blog' );
	unisphere_add_default_option( 'home_blog_button_link', '/blog' );
	unisphere_add_default_option( 'email_success', "<strong>Thanks!</strong> Your email was successfully sent. I check my email all the time, so I should be in touch soon." );
	unisphere_add_default_option( 'email_error', "<strong>There was an error sending your message.</strong> Please try again later." );
	unisphere_add_default_option( 'footer_copyright', "Copyright &copy; 2010 All rights reserved" );
}

function unisphere_add_default_option( $name, $value ) {
	$options = get_option( UNISPHERE_THEMEOPTIONS );
	$options['dummy'] = 'dummy value'; // this initializes the array else the following if will never run on activation
	if ( $options and !isset($options[$name]) ) { // Adds new value...
		$options[$name] = $value;
		update_option( UNISPHERE_THEMEOPTIONS, $options );
	}
}
?>