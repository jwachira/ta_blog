<?php
/**
 * Creates a line break between two consecutive shortcodes (causes unexpected bugs in shortcode parsing)
 */
function unisphere_texturize_shortcode_before($content)
{
	$content = preg_replace('/\]\[/im', "]\n[", $content);
	return $content;
}
add_filter('the_content', 'unisphere_texturize_shortcode_before'); // BEFORE wpautop() 


/**
 * Removes wrong p and br tags (the wordpress shortcode api needs to fix this...)
 */
function unisphere_texturize_shortcode($content)
{
	$content = preg_replace('/<div(.*?)><\/p>/im', '<div$1>', $content); // replaces <div class="foo"></p> with <div class="foo">
	$content = preg_replace('/<p><\/div>/im', '</div>', $content);  // replaces <p></div> with </div>
	$content = preg_replace('/<div(.*?)><br \/>/im', '<div$1>', $content);  // replaces <div class="foo"><br /> with <div class="foo">
	$content = preg_replace('/<span class="dropcap(.*?)">(.*?)<\/span><br \/>/im', '<span class="dropcap$1">$2</span>', $content);  // replaces <span class="dropcap">A</span><br /> with <span class="dropcap">A</span>
	$content = preg_replace('/<ul(.*?)><\/p>/im', '<ul$1>', $content); // replaces <ul class="foo"></p> with <ul class="foo">
	$content = preg_replace('/<p><\/ul>/im', '</ul>', $content);  // replaces <p></ul> with </ul>
	$content = preg_replace('/<p><div class="slider/im', '<div class="slider', $content);  // replaces <p><div class="slider with <div class="slider
	return $content;
}
add_filter('the_content', 'unisphere_texturize_shortcode', 11); // AFTER wpautop() 


/**
 * Enable Shortcodes in Widgets
 */
if (!is_admin())
  add_filter('widget_text', 'do_shortcode', 11);


/**
 * Column Shortcodes
 */

// Half
function unisphere_one_half($atts, $content=null) {
   return '<div class="one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'unisphere_one_half');

function unisphere_one_half_last($atts, $content=null) {
   return '<div class="one-half last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('one_half_last', 'unisphere_one_half_last');


// Third
function unisphere_one_third($atts, $content=null) {
   return '<div class="one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'unisphere_one_third');

function unisphere_one_third_last($atts, $content=null) {
   return '<div class="one-third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('one_third_last', 'unisphere_one_third_last');

function unisphere_two_third($atts, $content=null) {
   return '<div class="two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'unisphere_two_third');

function unisphere_two_third_last($atts, $content=null) {
   return '<div class="two-third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('two_third_last', 'unisphere_two_third_last');


// Fourth
function unisphere_one_fourth($atts, $content=null) {
   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'unisphere_one_fourth');

function unisphere_one_fourth_last($atts, $content=null) {
   return '<div class="one-fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('one_fourth_last', 'unisphere_one_fourth_last');

function unisphere_three_fourth($atts, $content=null) {
   return '<div class="three-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'unisphere_three_fourth');

function unisphere_three_fourth_last($atts, $content=null) {
   return '<div class="three-fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('three_fourth_last', 'unisphere_three_fourth_last');


/**
 * Title Shortcode
 */
function unisphere_title_shortcode($atts, $content=null) {
   return '<div class="title">' . do_shortcode($content) . '</div>';
}
add_shortcode('title', 'unisphere_title_shortcode');


/**
 * Horizontal Separator Shortcode
 */
function unisphere_hr_shortcode($atts) {
   return '<div class="hr"><hr /></div>';
}
add_shortcode('hr', 'unisphere_hr_shortcode');


/**
 * Dropcaps Shortcodes
 */
function unisphere_dropcap1_shortcode($atts, $content = null) {	
	return '<span class="dropcap-bg rounded-all">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap1', 'unisphere_dropcap1_shortcode');

function unisphere_dropcap2_shortcode($atts, $content = null) {	
	return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap2', 'unisphere_dropcap2_shortcode');


/**
 * FAQs Shortcode
 */
function unisphere_faq_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
        "question" => '',
        "dropcap_question" => 'Q',
        "dropcap_answer" => 'A'
	), $atts));
	return '<p class="question">' . do_shortcode('[dropcap1]' . $dropcap_question . '[/dropcap1]') . $question . '</p><p>' . do_shortcode('[dropcap1]' . $dropcap_answer . '[/dropcap1]') . do_shortcode($content) . '</p>';
}
add_shortcode('faq', 'unisphere_faq_shortcode');


/**
 * Lists Shortcodes
 */
function unisphere_list_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
        "bullet" => 'circle'
	), $atts));
	return '<ul class="bullet-' . $bullet . '">' . $content . '</ul>';
}
add_shortcode('list', 'unisphere_list_shortcode');


/**
 * Image Shortcode
 */
function unisphere_image_shortcode($atts) {
	extract(shortcode_atts(array(		
		"url" => "",
		"img" => "",
		"alt" => "",
		"rounded" => "",
		"lightbox" => 'true'
	), $atts));
	
	if ( $img == '' )
		return NULL;
	
	if( $lightbox == 'true' )
		$img_rel = 'rel="lightbox"';
	
	$rounded != '' ? $class = 'class="rounded-' . $rounded . '"' : $class = '';
		
	if( $url != '' ) {
		$output  .=  "\n" . '<a href="' . $url . '" title="' . $alt . '" ' . $img_rel . '><img src="' . $img . '" alt="' . $alt . '" title="' . $alt . '" ' . $class . '/></a>';
	} else {
		$output  .=  "\n" . '<img src="' . $img . '" alt="' . $alt . '" title="' . $alt . '" ' . $class . '/>';
	}
	
	return $output;
}
add_shortcode('image', 'unisphere_image_shortcode');


/**
 * Slider Shortcodes
 */
function unisphere_slider_shortcode($atts) {
	global $post;
	extract(shortcode_atts(array(
		"order" => "ASC",
		"orderby" => "menu_order ID",
        "size" => "medium",
		"effect" => "random",
		"slices" => 15,
		"animspeed" => 500,
		"pausetime" => 4000,
		"numberimages" => '20',
		"lightbox" => 'true',
		"exclude" => '',
		"include" => ''
	), $atts));
	
	$rand         =  rand();
	$id           =  intval($post->ID);
	$orderby      =  addslashes($orderby);
	$attachments  =  get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby, 'exclude' => $exclude, 'include' => $include, 'numberposts' => $numberimages) );

	if ( empty($attachments) )
		return NULL;
		
	$output = "<div class=\"slider slider-" . $size . "\" id=\"slider-" . $rand . "\">";

	foreach ( $attachments as $id => $attachment ) {
		$img_lnk = wp_get_attachment_image_src($id, 'full');
		$img_lnk = $img_lnk[0];

		$img_src = wp_get_attachment_image_src( $id, 'slider-' . $size );
		$img_src = $img_src[0];
		
		$img_alt = $attachment->post_excerpt;
		
		if ( $img_alt == null )
			$img_alt = $attachment->post_title;
			
		if( $lightbox == 'true' ) {
			$img_rel = 'rel="lightbox[' . $rand . ']"';
			$output  .=  "\n\t" . '<a href="' . $img_lnk . '" title="' . $img_alt . '" ' . $img_rel . '><img src="' . $img_src . '" alt="' . $img_alt . '" title="' . $img_alt . '" /></a>';
		} else {
			$output  .=  "\n\t" . '<img src="' . $img_src . '" alt="' . $img_alt . '" title="' . $img_alt . '" />';
		}
	}
	$output .= "\n</div>\n";
	
	$output .= "\n<script>";
	$output .= "\n\tjQuery(window).load(function() {";
	$output .= "\n\t\tjQuery('#slider-" . $rand . "').nivoSlider({";
	$output .= "\n\t\t\teffect:'" . $effect . "',";
	$output .= "\n\t\t\tslices:" . $slices . ",";
	$output .= "\n\t\t\tanimSpeed:" . $animspeed . ",";
	$output .= "\n\t\t\tpauseTime:" . $pausetime . ",";
	$output .= "\n\t\t\tstartSlide:0, //Set starting Slide (0 index)";
	$output .= "\n\t\t\tdirectionNav:false, //Next & Prev";
	$output .= "\n\t\t\tdirectionNavHide:true, //Only show on hover";
	$output .= "\n\t\t\tcontrolNav:true, //1,2,3...";
	$output .= "\n\t\t\tcontrolNavThumbs:false, //Use thumbnails for Control Nav";
	$output .= "\n\t\t\tcontrolNavThumbsFromRel:false, //Use image rel for thumbs";
	$output .= "\n\t\t\tcontrolNavThumbsSearch: '.jpg', //Replace this with...";
	$output .= "\n\t\t\tcontrolNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src";
	$output .= "\n\t\t\tkeyboardNav:true, //Use left & right arrows";
	$output .= "\n\t\t\tpauseOnHover:true, //Stop animation while hovering";
	$output .= "\n\t\t\tmanualAdvance:false, //Force manual transitions";
	$output .= "\n\t\t\tcaptionOpacity:1, //Universal caption opacity";
	$output .= "\n\t\t\tbeforeChange: function(){},";
	$output .= "\n\t\t\tafterChange: function(){},";
	$output .= "\n\t\t\tslideshowEnd: function(){} //Triggers after all slides have been shown";
	$output .= "\n\t\t});";
	$output .= "\n\t});";
	$output .= "\n</script>";

	return $output;
}
add_shortcode('slider', 'unisphere_slider_shortcode');


function unisphere_slider_custom_shortcode($atts, $content = null) {
	global $post;
	extract(shortcode_atts(array(		
        "size" => "medium",
		"effect" => "random",
		"slices" => 15,
		"animspeed" => 500,
		"pausetime" => 4000
	), $atts));
	
	$rand = rand();
	
	if ( empty($content) )
		return NULL;
		
	$output = "<div class=\"slider slider-" . $size . "\" id=\"slider-" . $rand . "\">";
	$output .= do_shortcode($content);
	$output .= "</div>\n";
	
	$output .= "\n<script>";
	$output .= "\n\tjQuery(window).load(function() {";
	$output .= "\n\t\tjQuery('#slider-" . $rand . " br').remove();";
	$output .= "\n\t\tjQuery('#slider-" . $rand . "').nivoSlider({";
	$output .= "\n\t\t\teffect:'" . $effect . "',";
	$output .= "\n\t\t\tslices:" . $slices . ",";
	$output .= "\n\t\t\tanimSpeed:" . $animspeed . ",";
	$output .= "\n\t\t\tpauseTime:" . $pausetime . ",";
	$output .= "\n\t\t\tstartSlide:0, //Set starting Slide (0 index)";
	$output .= "\n\t\t\tdirectionNav:false, //Next & Prev";
	$output .= "\n\t\t\tdirectionNavHide:true, //Only show on hover";
	$output .= "\n\t\t\tcontrolNav:true, //1,2,3...";
	$output .= "\n\t\t\tcontrolNavThumbs:false, //Use thumbnails for Control Nav";
	$output .= "\n\t\t\tcontrolNavThumbsFromRel:false, //Use image rel for thumbs";
	$output .= "\n\t\t\tcontrolNavThumbsSearch: '.jpg', //Replace this with...";
	$output .= "\n\t\t\tcontrolNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src";
	$output .= "\n\t\t\tkeyboardNav:true, //Use left & right arrows";
	$output .= "\n\t\t\tpauseOnHover:true, //Stop animation while hovering";
	$output .= "\n\t\t\tmanualAdvance:false, //Force manual transitions";
	$output .= "\n\t\t\tcaptionOpacity:1, //Universal caption opacity";
	$output .= "\n\t\t\tbeforeChange: function(){},";
	$output .= "\n\t\t\tafterChange: function(){},";
	$output .= "\n\t\t\tslideshowEnd: function(){} //Triggers after all slides have been shown";
	$output .= "\n\t\t});";
	$output .= "\n\t});";
	$output .= "\n</script>";

	return $output;
}
add_shortcode('slider_custom', 'unisphere_slider_custom_shortcode');


/**
 * Testimonials Shortcodes
 */
function unisphere_testimonial_shortcode($atts, $content = null) {
	global $post;
	extract(shortcode_atts(array(		
		"img" => "",
		"company" => "",
		"url" => "",
		"person" => "",
		"featured" => "false"
	), $atts));
	
	if ( !empty($img) )
		$img = "<div class=\"testimonial-image\">" . "<img src=\"" . $img . "\" alt=\"" . $person . "\" class=\"rounded-all\" />" . "</div>";
		
	if ( !empty($company) )
		$company = "<span class=\"testimonial-company\">" . ( !empty( $url ) ? "<a href=\"" . $url . "\" title=\"" . $company . "\">" . $company . "</a>" : $company ) . "</span>";
		
	if ( $featured == "true" )
		$class = " featured-testimonial";
	else
		$class = '';
		
	$output = "<div class=\"testimonial rounded-all" . $class . "\">";
	$output .= "\n\t" . $img;
	$output .= "\n\t<div class=\"testimonial-content\">";
	$output .= "\t\t<p>" . do_shortcode($content) . "</p>";
	$output .= "\n\t</div>";
	$output .= "\n\t<div class=\"testimonial-meta\">";
	$output .= "\n\t\t" . $company;
	$output .= "\n\t\t<span class=\"testimonial-person\">" . $person . "</span>";
	$output .= "\n\t</div>";
	$output .= "\n\t<div class=\"testimonial-arrow\"></div>";
	$output .= "</div>";

	return $output;
}
add_shortcode('testimonial', 'unisphere_testimonial_shortcode');


/**
 * Button Shortcodes
 */
function unisphere_button_shortcode($atts) {
	extract(shortcode_atts(array(		
        "size" => "",
		"style" => "",
		"text" => "",
		"url" => ""
	), $atts));
	
	if ( $size == 'big' ) {
		$size = '-big';
	} else {
		$size = '';
	}
	
	if ( $style == 'unselected' ) {
		$style = '-unselected';
	} else {
		$style = '';
	}

	return '<a href="' . $url . '" class="button' . $size . $style . ' rounded-all">' . $text . '</a>';
}
add_shortcode('button', 'unisphere_button_shortcode');


/**
 * Blockquote Shortcodes
 */
function unisphere_blockquote_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "align" => ""
	), $atts));
	
	if ( $align != '' ) {
		return '<blockquote class="align' . $align . '">' . $content . '</blockquote>';
	} else {
		return '<blockquote>' . $content . '</blockquote>';
	}	
}
add_shortcode('blockquote', 'unisphere_blockquote_shortcode');


/**
 * Bar Information Box Shortcodes
 */
function unisphere_bar_info_box_1_shortcode($atts) {
	extract(shortcode_atts(array(		
        "buttonurl" => "",
		"buttontext" => "",
		"text" => ""
	), $atts));
	
	$output  = '<div class="bar-info-box bar-info-box-1 rounded-all">';
	$output .= $text;
	
	if ( $buttonurl != '' && $buttontext != '' )
		$output .= '<a href="' . $buttonurl . '" class="button-big rounded-all">' . $buttontext . '</a>';
		
	$output .= '</div>';
	
	return $output;
}
add_shortcode('bar_info_box_1', 'unisphere_bar_info_box_1_shortcode');

function unisphere_bar_info_box_2_shortcode($atts) {
	extract(shortcode_atts(array(		
        "buttonurl" => "",
		"buttontext" => "",
		"text" => ""
	), $atts));
	
	$output  = '<div class="bar-info-box bar-info-box-2 rounded-all">';
	$output .= $text;
	
	if ( $buttonurl != '' && $buttontext != '' )
		$output .= '<a href="' . $buttonurl . '" class="button-big rounded-all">' . $buttontext . '</a>';
		
	$output .= '</div>';
	
	return $output;
}
add_shortcode('bar_info_box_2', 'unisphere_bar_info_box_2_shortcode');

function unisphere_bar_info_box_3_shortcode($atts) {
	extract(shortcode_atts(array(		
        "buttonurl" => "",
		"buttontext" => "",
		"text" => ""
	), $atts));
	
	$output  = '<div class="bar-info-box bar-info-box-3 rounded-all">';
	$output .= $text;
	
	if ( $buttonurl != '' && $buttontext != '' )
		$output .= '<a href="' . $buttonurl . '" class="button-big-unselected rounded-all">' . $buttontext . '</a>';
		
	$output .= '</div>';
	
	return $output;
}
add_shortcode('bar_info_box_3', 'unisphere_bar_info_box_3_shortcode');


/**
 * Information Box Shortcodes
 */
function unisphere_info_box_1_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => ""
	), $atts));
	
	$output  = '<div class="info-box info-box-1 rounded-all">';
	$output .= '<h4 class="info-box-title rounded-top">' . $title . '</h4>';
	$output .= '<div class="info-box-content rounded-bottom"><p>' . do_shortcode($content) . '</p></div>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('info_box_1', 'unisphere_info_box_1_shortcode');

function unisphere_info_box_2_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => ""
	), $atts));
	
	$output  = '<div class="info-box info-box-2 rounded-all">';
	$output .= '<h4 class="info-box-title rounded-top">' . $title . '</h4>';
	$output .= '<div class="info-box-content rounded-bottom"><p>' . do_shortcode($content) . '</p></div>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('info_box_2', 'unisphere_info_box_2_shortcode');

function unisphere_info_box_3_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => ""
	), $atts));
	
	$output  = '<div class="info-box info-box-3 rounded-all">';
	$output .= '<h4 class="info-box-title rounded-top">' . $title . '</h4>';
	$output .= '<div class="info-box-content rounded-bottom"><p>' . do_shortcode($content) . '</p></div>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('info_box_3', 'unisphere_info_box_3_shortcode');


/**
 * Tab Shortcode
 */
function unisphere_tabs_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "titles" => ""
	), $atts));
	
	$content = preg_replace('/\[\/tab\](.*?)\[tab\]/im', "[/tab]\n[tab]", $content);
	
	$tabs = explode( ",", $titles );
	$tab_number = 1;
	
	$output  = '<ul class="tabs">';
	foreach ($tabs as $tab) {
		$output .= '<li class="rounded-top"><a href="#tab' . $tab_number . '">' . trim( $tab ) . '</a></li>';
		$tab_number++;
	}
	$output .= '</ul>';

	$output .= '<div class="tab-container rounded-bottom">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	$output .= '<div class="clearfix"></div>';
	
	return $output;
}
add_shortcode('tabs', 'unisphere_tabs_shortcode');

function unisphere_tab_shortcode($atts, $content = null) {
   return '<div class="tab-content">' . do_shortcode($content) . '</div>';
}
add_shortcode('tab', 'unisphere_tab_shortcode');


/**
 * Toggle Shortcode
 */
function unisphere_toggle_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => ""
	), $atts));
	
	$output  = '<div class="toggle-container rounded-all">';
	$output .= '<a href="#" class="toggle"><span class="toggle-sign rounded-all"></span><span class="toggle-title">' . $title . '</span></a>';
	$output .= '<div class="toggle-content rounded-bottom">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('toggle', 'unisphere_toggle_shortcode');


/**
 * Price Table Shortcode
 */
function unisphere_price_table_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "columns" => ""
	), $atts));
	
	if( $columns == '' ) {
		
		return '<strong>Please set a number of columns for the pricing table.</strong>';
		
	} else {
	
		$content = preg_replace('/\[\/price_column\](.*?)\[price_column\]/im', "[/price_column]\n[price_column]", $content);
		
		$semantic_columns = array(2 => "two", 3 => "three", 4 => "four", 5 => "five", 6 => "six");
		
		$output  = '<div class="price-table price-table-' . $semantic_columns[$columns] . '">';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
		
		return $output;
	}
}
add_shortcode('price_table', 'unisphere_price_table_shortcode');

function unisphere_price_column_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "color" => "",
		"featured" => "",
		"title" => ""
	), $atts));
	
	if( $color != "") {
		$color = 'price-column-' . $color;
	}
	
	if( $featured == "true") {
		$featured = 'price-column-featured rounded-all';
	}
	
	$output  = '<div class="price-column ' . $color . ' ' . $featured . '">';
	$output .= '<h3' . ($featured != "" ? ' class="rounded-top"' : '') . '>' . $title . '</h3>';
	$output .= '<ul>';
	$output .= do_shortcode($content);
	$output .= '</ul>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('price_column', 'unisphere_price_column_shortcode');

function unisphere_price_tag_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "value" => "",
		"period" => ""
	), $atts));
	
	$output  = '<div class="price-tag">';
	$output .= '<span class="price-value' . ($period == "" ? ' big' : '') . '">' . $value . '</span>';
	
	if( $period != "" ) {
		$output .= '<span class="price-period">' . $period . '</span>';
	}
	
	$output .= '</div>';
	
	return $output;
}
add_shortcode('price_tag', 'unisphere_price_tag_shortcode');


/**
 * Add Shortcode Button to the Rich Editor
 */
function unisphere_shortcode_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "unisphere_add_shortcode_tinymce_plugin");
		add_filter('mce_buttons', 'unisphere_register_shortcode_button');
	}
}
 
/**
 * Register the TinyMCE Shortcode Button
 */
function unisphere_register_shortcode_button($buttons) {
	array_push($buttons, "|", "unisphereshortcode");
	return $buttons;
}

/**
 * Load the TinyMCE plugin: shortcode_plugin.js
 */
function unisphere_add_shortcode_tinymce_plugin($plugin_array) {
   $plugin_array['unisphereshortcode'] = get_bloginfo('template_url') . '/js/shortcode_plugin.js';
   return $plugin_array;
}
 
function unisphere_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

/**
 * Init process for button control
 */
add_filter( 'tiny_mce_version', 'unisphere_refresh_mce');
add_action( 'init', 'unisphere_shortcode_button' );

?>