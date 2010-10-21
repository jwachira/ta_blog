<?php
/**
 * Post/Page Custom Fields Meta Boxes
 */

global $new_meta_boxes;
$new_meta_boxes =
array(
	
	"_page_sub_title" => array(
	"name" => "_page_sub_title",
	"std" => "",
	"title" => "Page Sub-Title",
	"description" => "",
	"type" => "text",
	"location" => "Page"),
	
	"_page_img" => array(
	"name" => "_page_img",
	"std" => "",
	"title" => "Override the default Image generated for this Page",
	"description" => "Set the path of the image to display in this <strong>Page</strong> if you want to <strong>override the default wordpress generated image</strong>.<br /><strong>Size</strong>: width 900px, height 100px",
	"type" => "text",
	"location" => "Page"),
	
	"_page_portfolio_cat" => array(
	"name" => "_page_portfolio_cat",
	"std" => "",
	"title" => "Portfolio Categories",
	"description" => "If this page uses a Portfolio page template, then set the categories to be displayed",
	"type" => "portfolio_cat",
	"location" => "Page"),
	
	"_page_portfolio_num_items_page" => array(
	"name" => "_page_portfolio_num_items_page",
	"std" => "",
	"title" => "Number of Portfolio items per Page",
	"description" => "If this page uses a Portfolio page template, you can set the number of items displayed per page and the template will paginate the items<br />Leave blank if you don't want to paginate the portfolio items",
	"type" => "text",
	"location" => "Page"),
	
	
	
	"_slider_shared_title" => array(
	"name" => "_slider_shared_title",
	"title" => "Settings that apply to all Slider types",
	"type" => "title",
	"location" => "Slider"),

	"_slider_img" => array(
	"name" => "_slider_img",
	"std" => "",
	"title" => "Override the default image generated for this Slider Item",
	"description" => "Set the path of the image to display in this <strong>Home Page Slider Item</strong> if you want to <strong>override the default wordpress generated image</strong>.<br /><strong>Normal Slider size</strong>: width 900px, height 300px<br/ ><strong>Full Width Slider size</strong>: width up to 1920px, height 350px<br/ ><strong>Stage Slider Wide size</strong>: width 900px, height 315px<br /><strong>Stage Slider Tall size</strong>: width 900px, height 506px",
	"type" => "text",
	"location" => "Slider"),

	"_slider_link" => array(
	"name" => "_slider_link",
	"std" => "",
	"title" => "Slider Item custom destination URL",
	"description" => "Set the destination link of the slider item when a user clicks it (doesn't work with embedded videos), leave blank if you don't want to link anywhere.<br />Example: http://www.google.com/<br />(Note: if you set a video in the field below then this property will be ignored and the video will still display in a lightbox)",
	"type" => "text",
	"location" => "Slider"),	
	
	"_slider_video" => array(
	"name" => "_slider_video",
	"std" => "",
	"title" => "Play Video in Lightbox when clicking an image",
	"description" => "Examples:<br /><strong>Flash:</strong> http://www.adobe.com/products/flashplayer/include/marquee/design.swf?width=792&height=294<br /><strong>YouTube:</strong> http://www.youtube.com/watch?v=B0ky-VMi9fI<br /><strong>Vimeo:</strong> http://vimeo.com/8245346<br /><strong>QuickTime:</strong> http://trailers.apple.com/movies/universal/despicableme/despicableme-tlr1_r640s.mov?width=640&height=360<br /><strong>FLV</strong><br /><strong>MP4</strong>",
	"type" => "text",
	"location" => "Slider"),
	
	"_stage_slider_title" => array(
	"name" => "_stage_slider_title",
	"title" => "Settings that apply just to the Stage Slider",
	"type" => "title",
	"location" => "Slider"),	
	
	"_stage_slider_video" => array(
	"name" => "_stage_slider_video",
	"std" => "",
	"title" => "Play Video directly in Slider",
	"description" => "Supports: <br /><strong>YouTube</strong> (example: http://www.youtube.com/watch?v=B0ky-VMi9fI)<br /><strong>Vimeo</strong> (example: http://vimeo.com/14824441)<br /><strong>FLV</strong><br /><strong>MP4</strong>",
	"type" => "text",
	"location" => "Slider"),
	
	"_stage_slider_text_position" => array(
	"name" => "_stage_slider_text_position",
	"std" => "",
	"title" => "Text description position",
	"description" => "Select the text description position to be displayed in this stage slider item.<br />(Note: if a video is present, the description will only be displayed if using the Stage Slider Wide)",
	"type" => "select",
	"options" => array ( array( "value" => "none", "text" => "Don't display"),
						array( "value" => "left", "text" => "Left"),
						array( "value" => "right", "text" => "Right") ),
	"location" => "Slider"),
	
	"_stage_slider_text_transparent" => array(
	"name" => "_stage_slider_text_transparent",
	"std" => "",
	"title" => "Make text description background transparent?",
	"description" => "Check this if you want to make the text description background transparent.",
	"type" => "checkbox",
	"location" => "Slider"),	
	
	"_slider_fullwidth_title" => array(
	"name" => "_slider_fullwidth_title",
	"title" => "Settings that apply just to the Full Width Slider",
	"type" => "title",
	"location" => "Slider"),	
	
	"_slider_bgcolor" => array(
	"name" => "_slider_bgcolor",
	"std" => "",
	"title" => "Background Color",
	"description" => "When using the full width slider with smaller images than 1920px, you can set the background color for the slider item so it blends well with your image.<br />Just add your desired hex color. Example: #ffffff",
	"type" => "text",
	"location" => "Slider"),
	
	
	

	"_blog_hide_related_posts" => array(
	"name" => "_blog_hide_related_posts",
	"std" => "",
	"title" => "Hide related posts list",
	"description" => "Check this if you want to hide the related posts list at the bottom of the post before the comments. Related posts are found by similar tags in other posts.",
	"type" => "checkbox",
	"location" => "Post"),	

	"_blog_thumb" => array(
	"name" => "_blog_thumb",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Blog posts listing",
	"description" => "Set the path of the image to display when this <strong>Blog Post is listed</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Width</strong>: 280px, height 230px",
	"type" => "text",
	"location" => "Post"),
	
	"_blog_detail" => array(
	"name" => "_blog_detail",
	"std" => "",
	"title" => "Override the default image generated for the Blog post detail",
	"description" => "Set the path of the image to display in this <strong>Blog Post Detail</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Width</strong>: 590px, height 230px",
	"type" => "text",
	"location" => "Post"),
	
	"_blog_related_thumb" => array(
	"name" => "_blog_related_thumb",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Related Blog post listing",
	"description" => "Set the path of the thumbnail to display when this <strong>Blog Post is listed in the Related Blog Posts</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Width</strong>: 100px, height 100px",
	"type" => "text",
	"location" => "Post"),
	
	"_blog_popular_recent_thumb" => array(
	"name" => "_blog_popular_recent_thumb",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Popular and Recent posts widget",
	"description" => "Set the path of the thumbnail to display when this <strong>Blog Post is listed in the Popular or Recent Posts widget</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Width</strong>: 60px, height 60px",
	"type" => "text",
	"location" => "Post"),
	
	
	
	"_portfolio_detail_big_images" => array(
	"name" => "_portfolio_detail_big_images",
	"std" => "",
	"title" => "Display Full-width Images in detail page instead of Slider?",
	"description" => "Check this if you want to display Full-width images in the detail page instead of the slider",
	"type" => "checkbox",
	"location" => "Portfolio"),
	
	"_portfolio_no_lightbox" => array(
	"name" => "_portfolio_no_lightbox",
	"std" => "",
	"title" => "Thumbnail links to Portfolio Item Detail?",
	"description" => "Check this if you want the thumbnail to link directly to the portfolio item detail or your custom defined URL below instead of opening the full image in the lightbox.<br />(Note: if you set a video in the field below then this property will be ignored and the video will still display in a lightbox)",
	"type" => "checkbox",
	"location" => "Portfolio"),
	
	"_portfolio_link" => array(
	"name" => "_portfolio_link",
	"std" => "",
	"title" => "Portfolio Item custom destination URL",
	"description" => "Set the destination link of the Portfolio Item when a user clicks it, leave blank to link to the default Portfolio Item detail page.<br />Example: http://www.google.com/<br />(Note: if you set a video in the field below then this property will be ignored and the video will still display in a lightbox)",
	"type" => "text",
	"location" => "Portfolio"),

	"_portfolio_video" => array(
	"name" => "_portfolio_video",
	"std" => "",
	"title" => "Portfolio Video in lightbox",
	"description" => "Examples:<br /><strong>Flash:</strong> http://www.adobe.com/products/flashplayer/include/marquee/design.swf?width=792&height=294<br /><strong>YouTube:</strong> http://www.youtube.com/watch?v=B0ky-VMi9fI<br /><strong>Vimeo:</strong> http://vimeo.com/8245346<br /><strong>QuickTime:</strong> http://trailers.apple.com/movies/universal/despicableme/despicableme-tlr1_r640s.mov?width=640&height=360<br /><strong>FLV</strong><br /><strong>MP4</strong>",
	"type" => "text",
	"location" => "Portfolio"),
	
	"_portfolio_thumb" => array(
	"name" => "_portfolio_thumb",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Portfolio items",
	"description" => "Set the path of the image to display in this <strong>Portfolio item</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Portfolio 3 Columns thumb size</strong>: width 280px, height: 230px<br /><strong>Portfolio 1 Columns thumb 2 size</strong>: width 590px, height 230px",
	"type" => "text",
	"location" => "Portfolio"),	
);

function new_meta_boxes_page() {
	new_meta_boxes('Page');
}

function new_meta_boxes_post() {
	new_meta_boxes('Post');
}

function new_meta_boxes_slider() {
	new_meta_boxes('Slider');
}

function new_meta_boxes_portfolio() {
	new_meta_boxes('Portfolio');
}

function new_meta_boxes( $type ) {
	global $post, $new_meta_boxes;
	
	// Use nonce for verification
    echo '<input type="hidden" name="unisphere_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<div class="form-wrap">';

	foreach($new_meta_boxes as $meta_box) {
		if( $meta_box['location'] == $type) {
			
			if ( $meta_box['type'] == 'title' ) {
				echo '<p style="font-size: 18px; font-weight: bold; font-style: normal; color: #e5e5e5; text-shadow: 0 1px 0 #111; line-height: 40px; background-color: #464646; border: 1px solid #111; padding: 0 10px; -moz-border-radius: 6px;">' . $meta_box[ 'title' ] . '</p>';
			} else {			
				$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
		
				if($meta_box_value == "")
					$meta_box_value = $meta_box['std'];
		
				echo '<div class="form-field form-required">';
				
				switch ( $meta_box['type'] ) {
					case 'text':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<input type="text" name="' . $meta_box[ 'name' ] . '" value="' . htmlspecialchars( $meta_box_value ) . '" />';
						break;
						
					case 'checkbox':
						if($meta_box_value == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong>&nbsp;<input style="width: 20px;" type="checkbox" name="' . $meta_box[ 'name' ] . '" value="1" ' . $checked . ' /></label>';
						break;
						
					case 'select':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						
                        echo	'<select name="' . $meta_box[ 'name' ] . '">';

						// Loop through each option in the array
						foreach ($meta_box[ 'options' ] as $option) {
							if(is_array($option)) {
								echo '<option ' . ( $meta_box_value == $option['value'] ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							} else {
   								echo '<option ' . ( $meta_box_value == $option ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							}
						}
                        
						echo	'</select>';
                        break;
						
					case 'portfolio_cat':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						
						// Get the categories first
						$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0' );
						$categories = get_categories( $args ); 
						
						$selected_cats = explode( ",", $meta_box_value );
						
						echo '<ul style="margin-top: 5px;">';

						// Loop through each category
						foreach ($categories as $category) {
														
							foreach ($selected_cats as $selected_cat) {
        	           			if($selected_cat == $category->cat_ID){ $checked = 'checked="checked"'; break; } else { $checked = ""; }
		            	    }
							
			                echo '<li><input style="width: 20px;" type="checkbox" name="' . $meta_box[ 'name' ] . '[]" value="' . $category->cat_ID . '" ' . $checked . ' />&nbsp;' . $category->name . '</li>';
						}
						
						echo '</ul>';
						break;
				}

				echo 	'<p>' . $meta_box[ 'description' ] . '</p>';
				echo '</div>';
			}
		}
	}
	
	echo '</div>';
}

function create_meta_box() {
	global $theme_name;
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new_meta_boxes_post', UNISPHERE_THEMENAME . ' Post Settings', 'new_meta_boxes_post', 'post', 'normal', 'high' );
		add_meta_box( 'new_meta_boxes_page', UNISPHERE_THEMENAME . ' Page Settings', 'new_meta_boxes_page', 'page', 'normal', 'high' );
		add_meta_box( 'new_meta_boxes_slider', UNISPHERE_THEMENAME . ' Slider Settings', 'new_meta_boxes_slider', 'slider', 'normal', 'high' );
		add_meta_box( 'new_meta_boxes_portfolio', UNISPHERE_THEMENAME . ' Portfolio Settings', 'new_meta_boxes_portfolio', 'portfolio', 'normal', 'high' );
	}
}

function save_postdata( $post_id ) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['unisphere_meta_box_nonce'], basename(__FILE__)) ) {
		return $post_id;
	}
	
	if ( wp_is_post_revision( $post_id ) or wp_is_post_autosave( $post_id ) )
		return $post_id;
		
	global $post, $new_meta_boxes;

	foreach($new_meta_boxes as $meta_box) {
		
		if ( $meta_box['type'] != 'title)' ) {
		
			if ( 'page' == $_POST['post_type'] ) {
				if ( !current_user_can( 'edit_page', $post_id ))
					return $post_id;
			} else {
				if ( !current_user_can( 'edit_post', $post_id ))
					return $post_id;
			}
			
			if ( is_array($_POST[$meta_box['name']]) ) {
				
				foreach($_POST[$meta_box['name']] as $cat){
					$cats .= $cat . ",";
				}
				$data = substr($cats, 0, -1);
			}
			else { $data = $_POST[$meta_box['name']]; }			
	
			if(get_post_meta($post_id, $meta_box['name']) == "")
				add_post_meta($post_id, $meta_box['name'], $data, true);
			elseif($data != get_post_meta($post_id, $meta_box['name'], true))
				update_post_meta($post_id, $meta_box['name'], $data);
			elseif($data == "")
				delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
				
		}
	}
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>