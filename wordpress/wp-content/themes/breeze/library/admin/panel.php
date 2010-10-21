<?php
if ( get_magic_quotes_gpc() ) {
    $_POST      = array_map( 'stripslashes_deep', $_POST );
    $_GET       = array_map( 'stripslashes_deep', $_GET );
    $_COOKIE    = array_map( 'stripslashes_deep', $_COOKIE );
    $_REQUEST   = array_map( 'stripslashes_deep', $_REQUEST );
}

$options = array (
 
	array( "name" => "General Settings",
		"type" => "title"),
	 
	array( "type" => "open"),
	
	array( "name" => "Header Logo",
		"desc" => "Upload your logo and enter the absolute path of your logo image here. Max height is 94 pixels.",
		"id" => "logo",
		"type" => "text",
		"std" => ""),
		
	array( "name" => "Skin",
		"desc" => "Select the skin you want for the site.",
		"id" => "skin",
		"type" => "select",
		"options" => array (array( "value" => "light/blue.css", "text" => "Light Blue" ),
							array( "value" => "light/pink.css", "text" => "Light Pink" ),
							array( "value" => "light/green.css", "text" => "Light Green" ),
							array( "value" => "light/yellow.css", "text" => "Light Yellow" ),
							array( "value" => "light/red.css", "text" => "Light Red" ),
							array( "value" => "dark/blue.css", "text" => "Dark Blue" ),
							array( "value" => "dark/pink.css", "text" => "Dark Pink" ),
							array( "value" => "dark/green.css", "text" => "Dark Green" ),
							array( "value" => "dark/yellow.css", "text" => "Dark Yellow" ),
							array( "value" => "dark/red.css", "text" => "Dark Red" ),
							array( "value" => "dark/blue.css#transparent", "text" => "Dark Blue Transparent" ),
							array( "value" => "dark/pink.css#transparent", "text" => "Dark Pink Transparent" ),
							array( "value" => "dark/green.css#transparent", "text" => "Dark Green Transparent" ),
							array( "value" => "dark/yellow.css#transparent", "text" => "Dark Yellow Transparent" ),
							array( "value" => "dark/red.css#transparent", "text" => "Dark Red Transparent" ),
							array( "value" => "extra_dark/blue.css", "text" => "Extra Dark Blue" ),
							array( "value" => "extra_dark/pink.css", "text" => "Extra Dark Pink" ),
							array( "value" => "extra_dark/green.css", "text" => "Extra Dark Green" ),
							array( "value" => "extra_dark/yellow.css", "text" => "Extra Dark Yellow" ),
							array( "value" => "extra_dark/red.css", "text" => "Extra Dark Red" ),
							array( "value" => "extra_dark/blue.css#transparent", "text" => "Extra Dark Blue Transparent" ),
							array( "value" => "extra_dark/pink.css#transparent", "text" => "Extra Dark Pink Transparent" ),
							array( "value" => "extra_dark/green.css#transparent", "text" => "Extra Dark Green Transparent" ),
							array( "value" => "extra_dark/yellow.css#transparent", "text" => "Extra Dark Yellow Transparent" ),
							array( "value" => "extra_dark/red.css#transparent", "text" => "Extra Dark Red Transparent" ),
							array( "value" => "spring/skin.css", "text" => "Spring" ),
							array( "value" => "fancy/skin.css", "text" => "Fancy" ),
							array( "value" => "nature/skin.css", "text" => "Nature" ) ),
		"std" => ""),
		
	array( "name" => "Layout",
		"desc" => "Select the layout you want for the site.",
		"id" => "layout",
		"type" => "select",
		"options" => array ("Narrow","Wide"),
		"std" => ""),
		
	array( "name" => "Background Image",
		"desc" => "Select the background image you want for the site.",
		"id" => "background",
		"type" => "background",
		"options" => array ("background1.jpg", "background2.jpg", "background3.jpg", "background4.jpg", 
							"background5.jpg", "background6.jpg", "background7.jpg", "background8.jpg", 
							"background9.jpg", "background10.jpg", "background11.jpg", "background12.jpg", 
							"background13.jpg", "background14.jpg", "background15.jpg", "background16.jpg"),
		"std" => ""),
		
	array( "name" => "Custom Background Image",
		"desc" => "Upload your custom background image and enter the absolute path of your image here.<br /><strong>NOTE: This will override any background image you've selected above. To stop using the custom background image, just delete the value from this textbox.</strong>",
		"id" => "custom_background",
		"type" => "text",
		"std" => ""),
		
	array( "name" => "Background Color",
		"desc" => "Hexadecimal value for the background color (e.g. #ffffff)",
		"id" => "background_color",
		"type" => "text",
		"std" => "#f0f0f0"),
	
	array( "name" => "Cufon Font",
		"desc" => "Select the Cufon Font you want for the site, or disable it.",
		"id" => "font",
		"type" => "select",
		"options" => array ("Sansation", "Museo", "Diavlo", "Vegur", "Fertigo Pro", "Comfortaa", "Tertre", "Disable Cufon"),
		"std" => ""),
	
	array( "name" => "Hide Search Box in the sub-header?",
		"desc" => "Check this if you want to hide the Search Box in the inner pages sub-header.",
		"id" => "hide_search",
		"type" => "checkbox",
		"std" => ""),
		
	array( "name" => "Hide Breadcrumbs in the sub-header?",
		"desc" => "Check this if you want to hide the Breadcrumbs in the inner pages sub-header.",
		"id" => "hide_breadcrumbs",
		"type" => "checkbox",
		"std" => ""),
	
	array( "name" => "Custom CSS",
		"desc" => "Add your custom css entries here.",
		"id" => "custom_css",
		"type" => "textarea",
		"std" => ""),

	array( "name" => "Custom Scripts",
		"desc" => "Add your custom scripts here like for example your Google Analytics code to track your visitors.",
		"id" => "custom_js",
		"type" => "textarea",
		"std" => ""),
	
	array( "type" => "close"),
	
	array( "name" => "Home Page Settings",
		"type" => "title"),
	 
	array( "type" => "open"),
	
	array( "name" => "Slider",
		"desc" => "Choose the slider you want to use in the Home Page.",
		"id" => "slider",
		"type" => "select",
		"options" => array ( array( "value" => "Disable Slider", "text" => "Disable Slider"),
							array( "value" => "Normal", "text" => "Normal"),
							array( "value" => "Full Width Slider", "text" => "Full Width Slider"),
							array( "value" => "stage_slider_wide", "text" => "Stage Slider Wide"),
							array( "value" => "stage_slider_tall", "text" => "Stage Slider Tall") ),
		"std" => ""),
		
	array( "name" => "Number of Posts in the Slider",
		"desc" => "The number of posts you want to show in the Home page slider.",
		"id" => "slider_posts_number",
		"type" => "text",
		"std" => "3"),
	
	array( "name" => "Slider speed between transitions",
		"desc" => "The number of milliseconds between transitions in the Home page slider. (1 second equals 1000 milliseconds)",
		"id" => "slider_seconds",
		"type" => "text",
		"std" => "4000"),
		
	array( "name" => "Slider transition animation speed<br /><i>(Normal Slider only)</i>",
		"desc" => "The number of milliseconds of each transition animation in the Home page slider. (1 second equals 1000 milliseconds)",
		"id" => "slider_transition_seconds",
		"type" => "text",
		"std" => "500"),
		
	array( "name" => "Number of slices in the animation<br /><i>(Normal Slider only)</i>",
		"desc" => "The number of slices used in the animation",
		"id" => "slider_slices",
		"type" => "text",
		"std" => "15"),
		
	array( "name" => "Animation effect of each slider transition<br /><i>(Normal Slider only)</i>",
		"desc" => "The animation effect used in each slider transition",
		"id" => "slider_effect",		
		"type" => "select",
		"options" => array (array( "value" => "random", "text" => "Random" ),
							array( "value" => "fold", "text" => "Fold" ),
							array( "value" => "fade", "text" => "Fade" ),
							array( "value" => "sliceDown", "text" => "Slice Down" ),
							array( "value" => "sliceUp", "text" => "Slice Up" ),
							array( "value" => "sliceDownRight", "text" => "Slice Down Right" ),
							array( "value" => "sliceDownLeft", "text" => "Slice Down Left" ),
							array( "value" => "sliceUpRight", "text" => "Slice Up Right" ),
							array( "value" => "sliceUpLeft", "text" => "Slice Up Left" ),
							array( "value" => "sliceUpDown", "text" => "Slice Up Down" ),
							array( "value" => "sliceUpDownLeft", "text" => "Slice Up Down Left" ) ),
		"std" => ""),
	
	array( "name" => "Show the 3 Home Sections below the Slider?",
		"desc" => "Check this if you want to show the 3 Home Sections below the Slider.",
		"id" => "show_3_home_sections",
		"type" => "checkbox",
		"std" => ""),
	
	array( "name" => "Home Section 1",
		"desc" => "The content of the Home Page Section 1.",
		"id" => "home_section_1",
		"type" => "textarea",
		"std" => "<h3>Box Title 1</h3>\n<span class=\"meta\">box sub-title 1</span>\n<p><img src=\"http://www.unispheredesign.com/demo/assets/breeze/280x110.jpg\" alt=\"placeholder image\" class=\"rounded-all\" /></p>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec.</p>"),
		
	array( "name" => "Home Section 2",
		"desc" => "The content of the Home Page Section 2.",
		"id" => "home_section_2",
		"type" => "textarea",
		"std" => "<h3>Box Title 2</h3>\n<span class=\"meta\">box sub-title 2</span>\n<p><img src=\"http://www.unispheredesign.com/demo/assets/breeze/280x110.jpg\" alt=\"placeholder image\" class=\"rounded-all\" /></p>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec.</p>"),
		
	array( "name" => "Home Section 3",
		"desc" => "The content of the Home Page Section 3.",
		"id" => "home_section_3",
		"type" => "textarea",
		"std" => "<h3>Box Title 3</h3>\n<span class=\"meta\">box sub-title 3</span>\n<p><img src=\"http://www.unispheredesign.com/demo/assets/breeze/280x110.jpg\" alt=\"placeholder image\" class=\"rounded-all\" /></p>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec.</p>"),
		
	array( "name" => "Show the 3 most recent Portfolio items in the Home Page?",
		"desc" => "Check this if you want to show the 3 most recent Portfolio items in the Home Page.",
		"id" => "show_home_portfolio",
		"type" => "checkbox",
		"std" => ""),
		
	array( "name" => "Home Page Portfolio Section Title",
		"desc" => "The Title of the Portfolio Section in the Home Page.",
		"id" => "home_portfolio_title",
		"type" => "text",
		"std" => "Latest from our Portfolio"),
		
	array( "name" => "Home Page Portfolio Section Sub-Title",
		"desc" => "The Sub-Title of the Portfolio Section in the Home Page.",
		"id" => "home_portfolio_subtitle",
		"type" => "text",
		"std" => "check out our most recent work"),
	
	array( "name" => "\"View Portfolio\" Button Text",
		"desc" => "The text of the \"View Portfolio\" button in the Home Page.",
		"id" => "home_portfolio_button_text",
		"type" => "text",
		"std" => "View Portfolio"),
		
	array( "name" => "\"View Portfolio\" Button Link",
		"desc" => "The destination link of the \"View Portfolio\" button in the Home Page.",
		"id" => "home_portfolio_button_link",
		"type" => "text",
		"std" => "/portfolio"),
		
	array( "name" => "Show the 4 most recent Blog posts in the Home Page?",
		"desc" => "Check this if you want to show the 4 most recent Blog posts in the Home Page.",
		"id" => "show_home_blog",
		"type" => "checkbox",
		"std" => ""),
		
	array( "name" => "Home Page Blog Section Title",
		"desc" => "The Title of the Blog Section in the Home Page.",
		"id" => "home_blog_title",
		"type" => "text",
		"std" => "Latest from our Blog"),
		
	array( "name" => "Home Page Blog Section Sub-Title",
		"desc" => "The Sub-Title of the Blog Section in the Home Page.",
		"id" => "home_blog_subtitle",
		"type" => "text",
		"std" => "check out our most recent news"),
	
	array( "name" => "\"Read the Blog\" Button Text",
		"desc" => "The text of the \"Read the Blog\" button in the Home Page.",
		"id" => "home_blog_button_text",
		"type" => "text",
		"std" => "Read the Blog"),
		
	array( "name" => "\"Read the Blog\" Button Link",
		"desc" => "The destination link of the \"Read the Blog\" button in the Home Page.",
		"id" => "home_blog_button_link",
		"type" => "text",
		"std" => "/blog"),
		
  	array( "type" => "close"),
	
	array( "name" => "Blog Settings",
		"type" => "title"),
	
	array( "type" => "open"),
	
	array( "name" => "Display full post content on the Blog listing?",
		"desc" => "Check this if you want to show the full content of the posts in the blog listing. If unchecked it will only display the post excerpt.",
		"id" => "show_blog_full",
		"type" => "checkbox",
		"std" => ""),
	
  	array( "type" => "close"),
	
	array( "name" => "Contact Page Settings",
		"type" => "title"),
	
	array( "type" => "open"),
	
	array( "name" => "Destination E-mail",
		"desc" => "This is the e-mail account you want your messages to be sent to.",
		"id" => "destination_email",
		"type" => "text",
		"std" => ""),
		
	array( "name" => "Success Message",
		"desc" => "This is the message displayed when someone uses the contact form and the email is sent successfully.",
		"id" => "email_success",
		"type" => "text",
		"std" => "<strong>Thanks!</strong> Your email was successfully sent. I check my email all the time, so I should be in touch soon."),
		
	array( "name" => "Error Message",
		"desc" => "This is the message displayed when someone uses the contact form and an error occurs when sending the email.",
		"id" => "email_error",
		"type" => "text",
		"std" => "<strong>There was an error sending your message.</strong> Please try again later."),
		
  	array( "type" => "close"),
	
	array( "name" => "Footer Settings",
		"type" => "title"),
	
	array( "type" => "open"),
	
	array( "name" => "Copyright Information",
		"desc" => "The copyright information that's displayed below the footer navigation.",
		"id" => "footer_copyright",
		"type" => "text",
		"std" => "Copyright &copy; 2010 All rights reserved"),
	
	array( "name" => "Twitter Link",
		"desc" => "Example: http://www.twitter.com/your_user_name (the icon will not appear if left blank)",
		"id" => "footer_twitter",
		"type" => "text",
		"std" => ""),
	
	array( "name" => "Facebook Link",
		"desc" => "Example: http://www.facebook.com/your_user_name (the icon will not appear if left blank)",
		"id" => "footer_facebook",
		"type" => "text",
		"std" => ""),
	
	array( "name" => "Flickr Link",
		"desc" => "Example: http://www.flickr.com/photos/your_user_name (the icon will not appear if left blank)",
		"id" => "footer_flickr",
		"type" => "text",
		"std" => ""),
	
	array( "name" => "Linkedin Link",
		"desc" => "Example: http://www.linkedin.com/pub/your_user_name (the icon will not appear if left blank)",
		"id" => "footer_linkedin",
		"type" => "text",
		"std" => ""),
	
  	array( "type" => "close")		
);

if ( 'save' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		if( $_REQUEST[ $value['id'] ] == '' ) {
			unisphere_update_option( $value['id'], ' ' );
		} else {
			if ( is_array($_REQUEST[ $value['id'] ]) ) {
				$cats = "-1";
				foreach($_REQUEST[ $value['id'] ] as $cat){
					$cats .= "," . $cat;
				}
				unisphere_update_option( $value['id'], str_replace("-1,", "", $cats) );
			}
			else { unisphere_update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ]) ); }
		}
	}

} else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); 
	}
}

$i = 0;
 
if ( $_REQUEST['action'] == 'save' ) echo '<div id="message" class="updated fade"><p><strong>' . UNISPHERE_THEMENAME . ' settings saved.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2><?php echo UNISPHERE_THEMENAME ?> Settings</h2>
    <br />
    
    <div class="rm_opts"> 
	 
		<form method="post">
	 
			<?php foreach ($options as $value) {
            
            switch ( $value['type'] ) {
             
            case "open":
            ?>
             
            <?php break;
             
            case "close":
            ?>
             
			</div></div><br />
             
            <?php break;
             
            case "title":
			
			$i++;
			
            ?>
            
            <div class="rm_section">  
				<div class="rm_title">
                	<h3><img src="<?php echo UNISPHERE_ADMIN_IMAGES . '/trans.png' ?>" class="inactive" alt=""><?php echo $value['name']; ?></h3>
                    <span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" /></span><div class="clearfix"></div>
            	</div>
                <div class="rm_options">
			
            <?php break;
             
            case 'text':
            ?>
			
            <div class="rm_input rm_text">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    	        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( unisphere_get_option( $value['id'] ) != "") { echo stripslashes(unisphere_get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
        	    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>
                         
            <?php
            break;
             
            case 'textarea':
            ?>

            <div class="rm_input rm_textarea">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    	        <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( unisphere_get_option( $value['id'] ) != "") { echo stripslashes(unisphere_get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
        	    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
            </div>
             
            <?php
            break;
             
            case 'select':
            ?>
            
            <div class="rm_input rm_select">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
    	        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
        		    <?php foreach ($value['options'] as $option) { 
	                    if(is_array($option)) { ?>
                        	<option <?php if (unisphere_get_option( $value['id'] ) == $option['value']) { echo 'selected="selected"'; } ?> value='<?php echo $option['value']; ?>'><?php echo $option['text']; ?></option>
                        <?php } else { ?>
		            		<option <?php if (unisphere_get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
                        <?php }
					}?>
	            </select>
    	        <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>

            <?php
            break;
			
			case 'background':
            ?>
            
            <div class="rm_input rm_select">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                <input type="radio" name="<?php echo $value['id']; ?>" value="disable" <?php if (unisphere_get_option( $value['id'] ) == 'disable') { echo 'checked="checked"'; } ?>>&nbsp;Disable Background
                <div class="backgrounds">                	
       		    <?php foreach ($value['options'] as $option) : ?>
                	<div class="background-wrapper">
    	               	<div class="background" style="background-image: url('<?php echo UNISPHERE_IMAGES . '/backgrounds/' . $option ?>');"></div>
						<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php if (unisphere_get_option( $value['id'] ) == $option) { echo 'checked="checked"'; } ?>>
                    </div>
				<?php endforeach; ?>
                </div>
    	        <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>

            <?php
            break;
             
            case "checkbox":
            ?>
            
            <div class="rm_input rm_checkbox">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    	        <?php if(unisphere_get_option($value['id']) == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
        	    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="1" <?php echo $checked; ?> />
            	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>

            <?php break;
             
            case "cat":
            
			$selected_cats = explode(",", unisphere_get_option($value['id']));
            
            ?>
            
			<div class="rm_input rm_multi_checkbox">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                <ul id="<?php echo $value['id']; ?>" class="sort-children">
                
                <?php // If building the portfolio categories list, bring the already selected and ordered cats to the top					
					if ( $value['id'] == 'portfolio_cats' ) {
						foreach ($selected_cats as $selected_cat) { 
							if ($selected_cat != ' ' && $selected_cat != '') {?>

    	                    	<li class="sortable"><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $selected_cat; ?>" checked="checked" />&nbsp;<?php echo get_cat_name($selected_cat); ?></li>

                <?php		}
						}
						$portfolio_unselected_cats = get_categories('orderby=name&use_desc_for_title=1&hierarchical=1&style=0&hide_empty=0&exclude=' . unisphere_get_option($value['id']));
                		foreach($portfolio_unselected_cats as $portfolio_unselected_cat) { ?>

    	                    <li class="sortable"><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $portfolio_unselected_cat->cat_ID; ?>" />&nbsp;<?php echo $portfolio_unselected_cat->cat_name; ?></li>

                <?php	} 
					} else { // build the normal categories list 
						$cats = get_categories('orderby=name&use_desc_for_title=1&hierarchical=1&style=0&hide_empty=0');
						
						foreach($cats as $cat) { 
                    
    	                    foreach ($selected_cats as $selected_cat) {
        	                    if($selected_cat == $cat->cat_ID){ $checked = "checked=\"checked\""; break; }else{ $checked = "";}				
            	            }?>
                
                	        <li><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $cat->cat_ID; ?>" <?php echo $checked; ?> />&nbsp;<?php echo $cat->cat_name; ?></li>
                <?php 	} 
					} ?>
                </ul>
            	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>
             
            <?php break;
             
            case "pag":
            
            $pags = get_pages('orderby=name&use_desc_for_title=1&hierarchical=1&style=0&hide_empty=0');
            
            $selected_pags = explode(",", unisphere_get_option($value['id']));
            ?>
			<div class="rm_input rm_multi_checkbox">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                <ul>
	            <?php foreach($pags as $pag) { 
                
    	            foreach ($selected_pags as $selected_pag) {
        	            if($selected_pag == $pag->ID){ $checked = "checked=\"checked\""; break; }else{ $checked = "";}				
            	    }?>
            
	                <li><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $pag->ID; ?>" <?php echo $checked; ?> />&nbsp;<?php echo $pag->post_title; ?></li>
	            <?php } ?>		
                </ul>
            	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>
                         
            <?php break;
            }
            }
            ?>
             
            <input type="hidden" name="action" value="save" />
        </form>
	</div>
</div>

<?php 
/**
 * Returns the value of an option from the db if it exists.
 */
function unisphere_get_option( $name ) {
	$options = get_option( UNISPHERE_THEMEOPTIONS );
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return false;
	}
}

/**
 * Updates/Adds an option to the options db.
 */
function unisphere_update_option( $name, $value ) {
	$options = get_option( UNISPHERE_THEMEOPTIONS );
	if ( $options and !isset($options[$name]) ) { // Adds new value...
		$options[$name] = $value;
		return update_option( UNISPHERE_THEMEOPTIONS, $options );
	} else {
		if ( $value != $options[$name] ) { // ...or updates it
			$options[$name] = $value;
			return update_option( UNISPHERE_THEMEOPTIONS, $options );
		} else {
			return false;
		}
	}
}
?>