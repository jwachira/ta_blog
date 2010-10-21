<!-- Adapted from http://wiki.moxiecode.com/index.php/TinyMCE:Custom_filebrowser -->

<?php // Include WordPress core files for WP function access
file_exists('../../../../wp-load.php') ? require_once('../../../../wp-load.php') : require_once('../../../../../wp-load.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title></title>
	<style>
		fieldset { padding: 15px!important; }
		#insert { float: left; }
		#insert.disabled { color: #ccc; }
		#cancel { float: right; }
		select { padding: 5px!important; width: 100%!important; margin-bottom: 15px!important; font-family: "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif!important; font-size: 11px!important; }
		select option { padding: 2px; }
		#insert.disabled
    </style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
    <script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#insert').attr("disabled", true);
			jQuery('#insert').addClass("disabled");
			jQuery('#select_shortcode').change(function() {
				if( jQuery(this).val() == '' ) {
					jQuery('#insert').attr("disabled", true);
					jQuery('#insert').addClass("disabled");
				} else {
					jQuery('#insert').removeAttr("disabled");
					jQuery('#insert').removeClass("disabled");
				}
			});
		});
		
		function returnShortcodeValue() {
			var ret;
			
			switch(jQuery('#select_shortcode').val())
			{
				case "one_half": 
					ret = "[one_half]<h3>Your title here...</h3><p>Your content here...</p>[/one_half]<br />";
					break;
				case "one_half_last": 
					ret = "[one_half_last]<h3>Your title here...</h3><p>Your content here...</p>[/one_half_last]<br />";
					break;
				case "one_third": 
					ret = "[one_third]<h3>Your title here...</h3><p>Your content here...</p>[/one_third]<br />";
					break;
				case "one_third_last": 
					ret = "[one_third_last]<h3>Your title here...</h3><p>Your content here...</p>[/one_third_last]<br />";
					break;
				case "two_third": 
					ret = "[two_third]<h3>Your title here...</h3><p>Your content here...</p>[/two_third]<br />";
					break;
				case "two_third_last": 
					ret = "[two_third_last]<h3>Your title here...</h3><p>Your content here...</p>[/two_third_last]<br />";
					break;
				case "one_fourth": 
					ret = "[one_fourth]<h3>Your title here...</h3><p>Your content here...</p>[/one_fourth]<br />";
					break;
				case "one_fourth_last": 
					ret = "[one_fourth_last]<h3>Your title here...</h3><p>Your content here...</p>[/one_fourth_last]<br />";
					break;
				case "three_fourth": 
					ret = "[three_fourth]<h3>Your title here...</h3><p>Your content here...</p>[/three_fourth]<br />";
					break;
				case "three_fourth_last": 
					ret = "[three_fourth_last]<h3>Your title here...</h3><p>Your content here...</p>[/three_fourth_last]<br />";
					break;
				case "slider_custom_small":
					ret = "[slider_custom size=\"small\" effect=\"random\" slices=\"8\" /]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" alt=\"Image 1\"/]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" alt=\"Image 2\"/]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" alt=\"Image 3\"/]<br />[/slider_custom]<br />";
					break;
				case "slider_custom_medium":
					ret = "[slider_custom size=\"medium\" effect=\"random\" slices=\"15\" /]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/590x230.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/590x230.jpg\" alt=\"Image 1\"/]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/590x230.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/590x230.jpg\" alt=\"Image 2\"/]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/590x230.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/590x230.jpg\" alt=\"Image 3\"/]<br />[/slider_custom]<br />";
					break;
				case "slider_custom_big":
					ret = "[slider_custom size=\"big\" effect=\"random\" slices=\"15\" /]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/900x300.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/900x300.jpg\" alt=\"Image 1\"/]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/900x300.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/900x300.jpg\" alt=\"Image 2\"/]<br />[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/900x300.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/900x300.jpg\" alt=\"Image 3\"/]<br />[/slider_custom]<br />";
					break;
				case "slider_small":
					ret = "[slider size=\"small\" effect=\"random\" slices=\"8\" numberimages=\"4\" lightbox=\"true\" /]<br />";
					break;
				case "slider_medium":
					ret = "[slider size=\"medium\" effect=\"random\" slices=\"15\" numberimages=\"12\" lightbox=\"true\" /]<br />";
					break;
				case "slider_big":
					ret = "[slider size=\"big\" effect=\"random\" slices=\"15\" numberimages=\"20\" lightbox=\"true\" /]<br />";
					break;
				case "button":
					ret = "[button text=\"Button\" url=\"http://www.google.com\" /]<br />";
					break;
				case "button_big":
					ret = "[button text=\"Button\" size=\"big\" url=\"http://www.google.com\" /]<br />";
					break;
				case "button_unselected":
					ret = "[button text=\"Button\" style=\"unselected\" url=\"http://www.google.com\" /]<br />";
					break;
				case "button_unselected_big":
					ret = "[button text=\"Button\" size=\"big\" style=\"unselected\" url=\"http://www.google.com\" /]<br />";
					break;
				case "bar_info_box_1":
					ret = "[bar_info_box_1 buttontext=\"Learn More!\" buttonurl=\"http://www.google.com\" text=\"<strong>Ready to start building your site?</strong> Click to learn more.\" /]<br />";
					break;
				case "bar_info_box_2":
					ret = "[bar_info_box_2 buttontext=\"Learn More!\" buttonurl=\"http://www.google.com\" text=\"<strong>Ready to start building your site?</strong> Click to learn more.\" /]<br />";
					break;
				case "bar_info_box_3":
					ret = "[bar_info_box_3 buttontext=\"Learn More!\" buttonurl=\"http://www.google.com\" text=\"<strong>Ready to start building your site?</strong> Click to learn more.\" /]<br />";
					break;
				case "info_box_1":
					ret = "[info_box_1 title=\"Title...\"]<br />Content...<br />[/info_box_1]<br />";
					break;
				case "info_box_2":
					ret = "[info_box_2 title=\"Title...\"]<br />Content...<br />[/info_box_2]<br />";
					break;
				case "info_box_3":
					ret = "[info_box_3 title=\"Title...\"]<br />Content...<br />[/info_box_3]<br />";
					break;
				case "faq":
					ret = "[faq question=\"Question...?\" dropcap_question=\"Q\" dropcap_answer=\"A\"]The answer text...[/faq]<br />";
					break;
				case "testimonial":
					ret = "[testimonial img=\"http://www.unispheredesign.com/demo/breeze_html/images/assets/testimonial_small.jpg\" company=\"Google\" url=\"http://www.google.com/\" person=\"John Doe\"]<br />Sagittis fringilla, massa et nunc. Fusce sollicitudin eros non mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor. Sagittis fringilla, massa et nunc. Fusce sollicitudin eros non mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor.<br />[/testimonial]<br />";
					break;
				case "testimonial_featured":
					ret = "[testimonial featured=\"true\" img=\"http://www.unispheredesign.com/demo/breeze_html/images/assets/testimonial_small.jpg\" company=\"Google\" url=\"http://www.google.com/\" person=\"John Doe\"]<br />Sagittis fringilla, massa et nunc. Fusce sollicitudin eros non mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor. Sagittis fringilla, massa et nunc. Fusce sollicitudin eros non mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor.<br />[/testimonial]<br />";
					break;
				case "tabs":
					ret = "[tabs titles=\"Tab 1, Tab 2, Tab 3\"]<br />[tab]Tab 1 content...[/tab]<br />[tab]Tab 2 content...[/tab]<br />[tab]Tab 3 content...[/tab]<br />[/tabs]<br />";
					break;
				case "toggle":
					ret = "[toggle title=\"Toggle title...\"]Toggle content...[/toggle]<br />";
					break;
				case "title":
					ret = "[title]Title Example[/title]<br />";
					break;
				case "hr":
					ret = "[hr/]<br />";
					break;
				case "dropcap1":
					ret = "[dropcap1]A[/dropcap1]<br />";
					break;
				case "dropcap2":
					ret = "[dropcap2]A[/dropcap2]<br />";
					break;
				case "list_circle":
					ret = "[list bullet=\"circle\"]<br /><li>list item...</li><br /><li>list item...</li><br /><li>list item...</li><br /><li>list item...</li><br />[/list]<br />";
					break;
				case "list_arrow":
					ret = "[list bullet=\"arrow\"]<br /><li>list item...</li><br /><li>list item...</li><br /><li>list item...</li><br /><li>list item...</li><br />[/list]<br />";
					break;
				case "blockquote_left":
					ret = "[blockquote align=\"left\"]Lorem ipsum dolor sit amet....[/blockquote]<br />";
					break;
				case "blockquote_right":
					ret = "[blockquote align=\"right\"]Lorem ipsum dolor sit amet....[/blockquote]<br />";
					break;
				case "blockquote_full":
					ret = "[blockquote]Lorem ipsum dolor sit amet....[/blockquote]<br />";
					break;
				case "image":
					ret = "[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" rounded=\"all\" alt=\"title\"/]<br />";
					break;
				case "image_lightbox":
					ret = "[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" url=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/900x300.jpg\" rounded=\"all\" alt=\"title\"/]<br />";
					break;
				case "image_video":
					ret = "[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" url=\"http://vimeo.com/8245346\" rounded=\"all\" alt=\"title\"/]<br />";
					break;
				case "image_custom_url":
					ret = "[image img=\"http://www.unispheredesign.com/demo/breeze_html/images/placeholders/280x230.jpg\" url=\"http://www.google.com\" lightbox=\"false\" rounded=\"all\" alt=\"title\"/]<br />";
					break;
				case "price_table_3":
					ret = "<p><strong>Price Table notes (YOU CAN SAFELY DELETE THIS)</strong><pre><code>The price_column shortcode supports the following colors:<br />green, blue, pink, red, yellow, nature-brown, nature-green, spring-blue, spring-green<br />If you don't set a color then the default current skin color is applied.</code></pre></p><br />[price_table columns=\"3\"]<br />[price_column title=\"First\" color=\"green\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\" color=\"blue\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\" color=\"pink\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				case "price_table_4":
					ret = "<p><strong>Price Table notes (YOU CAN SAFELY DELETE THIS)</strong><pre><code>The price_column shortcode supports the following colors:<br />green, blue, pink, red, yellow, nature-brown, nature-green, spring-blue, spring-green<br />If you don't set a color then the default current skin color is applied.</code></pre></p><br />[price_table columns=\"4\"]<br />[price_column title=\"First\" color=\"green\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\" color=\"blue\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\" color=\"pink\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fourth\" color=\"red\"]<br /><li>[price_tag value=\"$30\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				case "price_table_5":
					ret = "<p><strong>Price Table notes (YOU CAN SAFELY DELETE THIS)</strong><pre><code>The price_column shortcode supports the following colors:<br />green, blue, pink, red, yellow, nature-brown, nature-green, spring-blue, spring-green<br />If you don't set a color then the default current skin color is applied.</code></pre></p><br />[price_table columns=\"5\"]<br />[price_column title=\"First\" color=\"green\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\" color=\"blue\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\" color=\"pink\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fourth\" color=\"red\"]<br /><li>[price_tag value=\"$30\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fifth\" color=\"yellow\"]<br /><li>[price_tag value=\"$40\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				case "price_table_6":
					ret = "<p><strong>Price Table notes (YOU CAN SAFELY DELETE THIS)</strong><pre><code>The price_column shortcode supports the following colors:<br />green, blue, pink, red, yellow, nature-brown, nature-green, spring-blue, spring-green<br />If you don't set a color then the default current skin color is applied.</code></pre></p><br />[price_table columns=\"6\"]<br />[price_column title=\"First\" color=\"green\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\" color=\"blue\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\" color=\"pink\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fourth\" color=\"red\"]<br /><li>[price_tag value=\"$30\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fifth\" color=\"yellow\"]<br /><li>[price_tag value=\"$40\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Sixth\" color=\"nature-brown\"]<br /><li>[price_tag value=\"$50\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				default: 
					ret = '';
			}
			
			window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, ret);
			window.tinyMCE.activeEditor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
    </script>
</head>
<body>
	<fieldset>
    <legend>Select a Shortcode</legend>
	<div>
        <select size="8" id="select_shortcode">
        	<option value="">Bar Information Boxes</option>
			<option value="bar_info_box_1">&nbsp;&nbsp;&nbsp;Style 1</option>
            <option value="bar_info_box_2">&nbsp;&nbsp;&nbsp;Style 2</option>
            <option value="bar_info_box_3">&nbsp;&nbsp;&nbsp;Style 3</option>
        	<option value="">Blockquotes</option>
            <option value="blockquote_left">&nbsp;&nbsp;&nbsp;Floated Left</option>
            <option value="blockquote_right">&nbsp;&nbsp;&nbsp;Floated Right</option>
            <option value="blockquote_full">&nbsp;&nbsp;&nbsp;Full-width</option>
        	<option value="">Buttons</option>
			<option value="button">&nbsp;&nbsp;&nbsp;Normal</option>
            <option value="button_big">&nbsp;&nbsp;&nbsp;Big</option>
            <option value="button_unselected">&nbsp;&nbsp;&nbsp;Normal (alternate style)</option>
            <option value="button_unselected_big">&nbsp;&nbsp;&nbsp;Big (alternate style)</option>
            <option value="">Columns</option>
            <option value="one_half">&nbsp;&nbsp;&nbsp;Half</option>
            <option value="one_half_last">&nbsp;&nbsp;&nbsp;Half Last</option>
            <option value="one_third">&nbsp;&nbsp;&nbsp;One Third</option>
            <option value="one_third_last">&nbsp;&nbsp;&nbsp;One Third Last</option>
            <option value="two_third">&nbsp;&nbsp;&nbsp;Two Thirds</option>
            <option value="two_third_last">&nbsp;&nbsp;&nbsp;Two Thirds Last</option>
            <option value="one_fourth">&nbsp;&nbsp;&nbsp;One Fourth</option>
            <option value="one_fourth_last">&nbsp;&nbsp;&nbsp;One Fourth Last</option>
            <option value="three_fourth">&nbsp;&nbsp;&nbsp;Three Fourth</option>
            <option value="three_fourth_last">&nbsp;&nbsp;&nbsp;Three Fourth Last</option>
            <option value="">Dropcaps</option>
            <option value="dropcap1">&nbsp;&nbsp;&nbsp;With Background</option>
            <option value="dropcap2">&nbsp;&nbsp;&nbsp;Without Background</option>
            <option value="faq">FAQ</option>
            <option value="hr">Horizontal Separator</option>
        	<option value="">Images</option>
            <option value="image">&nbsp;&nbsp;&nbsp;Single Image</option>
            <option value="image_lightbox">&nbsp;&nbsp;&nbsp;Full Image in Lightbox</option>
            <option value="image_video">&nbsp;&nbsp;&nbsp;Video in Lightbox</option>
            <option value="image_custom_url">&nbsp;&nbsp;&nbsp;Custom destination URL</option>
            <option value="">Information Boxes</option>
			<option value="info_box_1">&nbsp;&nbsp;&nbsp;Style 1</option>
            <option value="info_box_2">&nbsp;&nbsp;&nbsp;Style 2</option>
            <option value="info_box_3">&nbsp;&nbsp;&nbsp;Style 3</option>        	
			<option value="">Lists</option>
            <option value="list_circle">&nbsp;&nbsp;&nbsp;Circle Bullets</option>
            <option value="list_arrow">&nbsp;&nbsp;&nbsp;Arrow Bullets</option>
			<option value="">Price Tables</option>
            <option value="price_table_3">&nbsp;&nbsp;&nbsp;3 Columns</option>
            <option value="price_table_4">&nbsp;&nbsp;&nbsp;4 Columns</option>
            <option value="price_table_5">&nbsp;&nbsp;&nbsp;5 Columns</option>
            <option value="price_table_6">&nbsp;&nbsp;&nbsp;6 Columns</option>
        	<option value="">Sliders</option>
            <option value="slider_custom_small">&nbsp;&nbsp;&nbsp;Small from custom images url</option>
            <option value="slider_custom_medium">&nbsp;&nbsp;&nbsp;Medium from custom images url</option>
            <option value="slider_custom_big">&nbsp;&nbsp;&nbsp;Big from custom images url</option>
            <option value="slider_small">&nbsp;&nbsp;&nbsp;Small from attached images</option>
            <option value="slider_medium">&nbsp;&nbsp;&nbsp;Medium from attached images</option>
            <option value="slider_big">&nbsp;&nbsp;&nbsp;Big from attached images</option>
            <option value="tabs">Tabs</option>
            <option value="">Testimonials</option>
			<option value="testimonial">&nbsp;&nbsp;&nbsp;Normal</option>
			<option value="testimonial_featured">&nbsp;&nbsp;&nbsp;Featured</option>
            <option value="title">Title</option>
			<option value="toggle">Toggle</option>
        </select>
	</div>
    <div>
        <input type="submit" value="Add" onclick="returnShortcodeValue()" id="insert" /> <input type="button" value="Close" onclick="tinyMCEPopup.close()" id="cancel" />
	</div>
    </fieldset>
</body>
</html>