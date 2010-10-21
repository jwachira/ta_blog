<?php
/**
 * The theme's image sizes definitions and helper functions
 */
 

/**
 * Add the new thumbnail support introduced in WP 2.9
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'slider', 'portfolio' ) );
}


/**
 * Set the different image sizes for the images used in several places across the theme
 */
define( 'UNISPHERE_FULLWIDTH_SLIDER_W', 1920 );
define( 'UNISPHERE_FULLWIDTH_SLIDER_H', 350 ); 
add_image_size( 'fullwidth-slider', UNISPHERE_FULLWIDTH_SLIDER_W, UNISPHERE_FULLWIDTH_SLIDER_H, true ); // fullwidth home page slider image size

define( 'UNISPHERE_NORMAL_SLIDER_W', 900 );
define( 'UNISPHERE_NORMAL_SLIDER_H', 300 ); 
add_image_size( 'normal-slider', UNISPHERE_NORMAL_SLIDER_W, UNISPHERE_NORMAL_SLIDER_H, true ); // normal home page slider image size

define( 'UNISPHERE_STAGE_SLIDER_TALL_W', 900 );
define( 'UNISPHERE_STAGE_SLIDER_TALL_H', 506 ); 
add_image_size( 'stage-slider-tall', UNISPHERE_STAGE_SLIDER_TALL_W, UNISPHERE_STAGE_SLIDER_TALL_H, true ); // home page tall stage slider image size 

define( 'UNISPHERE_STAGE_SLIDER_WIDE_W', 900 );
define( 'UNISPHERE_STAGE_SLIDER_WIDE_H', 315 ); 
add_image_size( 'stage-slider-wide', UNISPHERE_STAGE_SLIDER_WIDE_W, UNISPHERE_STAGE_SLIDER_WIDE_H, true ); // home page wide stage slider image size 

define( 'UNISPHERE_PORTFOLIO1_W', 280 );
define( 'UNISPHERE_PORTFOLIO1_H', 230 ); 
add_image_size( 'portfolio1', UNISPHERE_PORTFOLIO1_W, UNISPHERE_PORTFOLIO1_H, true ); // 3 columns portfolio thumb size

define( 'UNISPHERE_PORTFOLIO2_W', 590 );
define( 'UNISPHERE_PORTFOLIO2_H', 230 ); 
add_image_size( 'portfolio2', UNISPHERE_PORTFOLIO2_W, UNISPHERE_PORTFOLIO2_H, true ); // 1 column portfolio  thumb size

define( 'UNISPHERE_PORTFOLIO4_W', 210 );
define( 'UNISPHERE_PORTFOLIO4_H', 170 ); 
add_image_size( 'portfolio4', UNISPHERE_PORTFOLIO4_W, UNISPHERE_PORTFOLIO4_H, true ); // 4 column portfolio  thumb size

define( 'UNISPHERE_PORTFOLIO_DETAIL_W', 900 );
define( 'UNISPHERE_PORTFOLIO_DETAIL_H', 300 ); 
add_image_size( 'portfolio-detail', UNISPHERE_PORTFOLIO_DETAIL_W, UNISPHERE_PORTFOLIO_DETAIL_H, true ); // portfolio detail thumb size

define( 'UNISPHERE_PORTFOLIO_DETAIL_BIG_W', 900 );
define( 'UNISPHERE_PORTFOLIO_DETAIL_BIG_H', 9999 ); 
add_image_size( 'portfolio-detail-big', UNISPHERE_PORTFOLIO_DETAIL_BIG_W, UNISPHERE_PORTFOLIO_DETAIL_BIG_H ); // portfolio detail big image size

define( 'UNISPHERE_BLOG_W', 280 );
define( 'UNISPHERE_BLOG_H', 230 ); 
add_image_size( 'blog', UNISPHERE_BLOG_W, UNISPHERE_BLOG_H, true ); // blog thumb size

define( 'UNISPHERE_BLOG_DETAIL_W', 590 );
define( 'UNISPHERE_BLOG_DETAIL_H', 230 );
add_image_size( 'blog-detail', UNISPHERE_BLOG_DETAIL_W, UNISPHERE_BLOG_DETAIL_H, true ); // blog post detail thumb size

define( 'UNISPHERE_GALLERY_W', 100 );
define( 'UNISPHERE_GALLERY_H', 100 );
add_image_size( 'gallery', UNISPHERE_GALLERY_W, UNISPHERE_GALLERY_H, true ); // gallery thumb size

define( 'UNISPHERE_SIDEBAR_POSTS_W', 60 );
define( 'UNISPHERE_SIDEBAR_POSTS_H', 60 );
add_image_size( 'sidebar-post', UNISPHERE_SIDEBAR_POSTS_W, UNISPHERE_SIDEBAR_POSTS_H, true ); // sidebar posts thumb size

define( 'UNISPHERE_RELATED_POSTS_W', 100 );
define( 'UNISPHERE_RELATED_POSTS_H', 100 );
add_image_size( 'related-post', UNISPHERE_RELATED_POSTS_W, UNISPHERE_RELATED_POSTS_H, true ); // related posts thumb size

define( 'UNISPHERE_PAGE_HEADER_W', 900 );
define( 'UNISPHERE_PAGE_HEADER_H', 100 );
add_image_size( 'page-header', UNISPHERE_PAGE_HEADER_W, UNISPHERE_PAGE_HEADER_H, true ); // page header image size

define( 'UNISPHERE_SLIDER_BIG_W', 900 );
define( 'UNISPHERE_SLIDER_BIG_H', 300 );
add_image_size( 'slider-big', UNISPHERE_SLIDER_BIG_W, UNISPHERE_SLIDER_BIG_H, true ); // big slider image size

define( 'UNISPHERE_SLIDER_MEDIUM_W', 590 );
define( 'UNISPHERE_SLIDER_MEDIUM_H', 230 );
add_image_size( 'slider-medium', UNISPHERE_SLIDER_MEDIUM_W, UNISPHERE_SLIDER_MEDIUM_H, true ); // medium slider image size

define( 'UNISPHERE_SLIDER_SMALL_W', 280 );
define( 'UNISPHERE_SLIDER_SMALL_H', 230 );
add_image_size( 'slider-small', UNISPHERE_SLIDER_SMALL_W, UNISPHERE_SLIDER_SMALL_H, true ); // small slider image size


/**
 * Get thumbnail based on the context passed as a parameter
 * If there are images defined in custom fields, return these instead of the default thumbnail
 */
function unisphere_get_post_image( $context, $post_id = -1 )
{
	global $post;
	
	if( $post_id != -1 ) {
		$current_post = get_post( $post_id );
	} else {
		$current_post = $post;
	}
	
	switch ( $context ) {
		
		case "fullwidth-slider":
		case "normal-slider":
		case "stage-slider-tall":
		case "stage-slider-wide":
			if( get_post_meta($current_post->ID, "_slider_img", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_slider_img", $single = true) . '" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title ) );
			}
			break;

		case "portfolio1":
			if( get_post_meta($current_post->ID, "_portfolio_thumb", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_portfolio_thumb", $single = true) . '" class="rounded-top" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title, 'class' => 'rounded-top' ) );
			}
			break;
			
		case "portfolio2":
			if( get_post_meta($current_post->ID, "_portfolio_thumb", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_portfolio_thumb", $single = true) . '" class="rounded-top" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title, 'class' => 'rounded-all' ) );
			}
			break;
			
		case "portfolio4":
			if( get_post_meta($current_post->ID, "_portfolio_thumb", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_portfolio_thumb", $single = true) . '" class="rounded-top" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title, 'class' => 'rounded-top' ) );
			}
			break;
		
		case "blog":
			if( get_post_meta($current_post->ID, "_blog_thumb", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_blog_thumb", $single = true) . '" class="rounded-all" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title, 'class' => 'rounded-all' ) );
			}
			break;
			
		case "blog-detail":
			if( get_post_meta($current_post->ID, "_blog_detail", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_blog_detail", $single = true) . '" class="rounded-all" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title, 'class' => 'rounded-all' ) );
			}
			break;
		
		case "page-header":
			if( get_post_meta($current_post->ID, "_page_img", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_page_img", $single = true) . '" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'id' => 'sub-header-image' ) );
			}
			break;
		
		case "sidebar-post":
			if( get_post_meta($current_post->ID, "_blog_popular_recent_thumb", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_blog_popular_recent_thumb", $single = true) . '" class="rounded-all" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title, 'class' => 'rounded-all' ) );
			}
			break;			
			
		case "related-post":
			if( get_post_meta($current_post->ID, "_blog_related_thumb", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_blog_related_thumb", $single = true) . '" class="rounded-all" />'; 
			} else {
				return get_the_post_thumbnail( $current_post->ID, $context, array( 'alt' => $current_post->post_title, 'title' => $current_post->post_title, 'class' => 'rounded-all' ) );
			}
			break;	
	}
}
?>