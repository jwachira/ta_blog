<?php if (!is_search()) {
		$search_text = "Looking for something?";
	} else {
		$search_text = "$s";
	}
?>
		
<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="image" id="searchsubmit" src="<?php bloginfo('template_directory'); ?>/images/button_search.gif" /> 
	<input type="text" value="<?php echo wp_specialchars($search_text, 1); ?>" name="s" id="s" onfocus="if (this.value == 'Looking for something?') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Looking for something?';}" />
	
</form>
