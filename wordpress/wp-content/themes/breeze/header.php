<?php global $unisphere_options; ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />	
	<title><?php semantic_title(); ?></title>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />

	<!-- PrettyPhoto -->
	<link rel="stylesheet" href="<?php echo UNISPHERE_CSS . '/prettyPhoto.css'; ?>" type="text/css" />
    
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) // loads the javascript required for threaded comments 
		wp_enqueue_script( 'comment-reply' ); ?>
        
	<!-- Theme Hook -->
	<?php wp_head(); ?>

    <?php // If no skin has been chosen yet then set style as "light/blue.css"
		if( !empty( $unisphere_options['skin'] ) ) $skin = $unisphere_options['skin'];
		else $skin = 'light/blue.css';
		
		// If no background has been chosen yet then set background as "background1.jpg"
		if( !empty( $unisphere_options['background'] ) ) $background = $unisphere_options['background'];
		else $background = 'background1.jpg';
		
		// If a custom background has been chosen...
		if( !empty( $unisphere_options['custom_background'] ) ) $custom_background = $unisphere_options['custom_background'];
		
		// If no background color has been chosen yet then set background color as "#f0f0f0"
		if( !empty( $unisphere_options['background_color'] ) ) $background_color = $unisphere_options['background_color'];
		else $background_color = '#f0f0f0';
		
		// If no layout has been chosen yet then set layout as "Wide"
		if( !empty( $unisphere_options['layout'] ) ) $layout = $unisphere_options['layout'];
		else $layout = 'Wide';
		
		// See if the user has chosen a transparent skin
		if( strpos( $skin, '#transparent' ) === false ) $transparent = '';
		else $transparent = substr( $skin, 0, strpos( $skin, '/' ) );
		
		// Remove the string "#transparent" from the $skin variable, no further use for it now
		$skin = str_replace( '#transparent', '', $skin );
	?>

   	<!-- Skin -->
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo UNISPHERE_CSS . '/skins/' . $skin; ?>" />

	<style>
		<?php if( trim( $custom_background ) != '' ) : // CUSTOM BACKGROUND IMAGE ?>
		body { background: url('<?php echo $custom_background; ?>') repeat scroll center top; }
		<?php elseif( $background != 'disable' ) : // BACKGROUND IMAGE ?>
		body { background: url('<?php echo UNISPHERE_IMAGES . '/backgrounds/' . $background; ?>') repeat scroll center top; }
		<?php endif; ?>

		<?php if( trim( $background_color ) != '' && $background == 'disable' ) : // BACKGROUND COLOR ?>
		body { background-color: <?php echo $background_color; ?>!important; }
		<?php endif; ?>

		<?php if( $transparent != '' ) : // TRANSPARENCY ?>
		#container, #slider-container, #stage-slider-wide-container, #stage-slider-tall-container, #sub-header, #footer-container { background-color: transparent!important; background-image: url('<?php echo UNISPHERE_CSS . '/skins/' . $transparent . '/transparent_bg.png'; ?>')!important; }
		<?php endif; ?>
		
		<?php if( $layout == 'Narrow' ) : // LAYOUT WIDTH ?>
		#container { width: 960px!important; }
		<?php endif; ?>
	</style>
    
    <script>
		<?php //TOP NAVIGATION FONT
		$skin_left = substr( $skin, 0, strpos( $skin, '/' ) );
		
		// If using one of the LIGHT or SPRING skins...
		if( $skin_left == 'light' || $skin_left == 'spring' ) : ?>
		Cufon.replace('.menu .nav > li > a', { textShadow: '1px 1px rgba(255, 255, 255, 1)', fontFamily: 'Cufon', hover: true });
		<?php endif; ?>
		
		<?php 
		// If using one of the DARK, EXTRA DARK or FANCY skins...
		if( $skin_left == 'dark' || $skin_left == 'extra_dark' || $skin_left == 'fancy' ) : ?>
		Cufon.replace('.menu .nav > li > a', { textShadow: '-1px -1px rgba(51, 51, 51, 1)', fontFamily: 'Cufon', hover: true });
		<?php endif; ?>

		<?php 
		// If using the NATURE skin...
		if( $skin_left == 'nature' ) : ?>
		Cufon.replace('.menu .nav > li > a', { textShadow: '-1px -1px rgba(12, 147, 47, 1)', fontFamily: 'Cufon', hover: true });
		<?php endif; ?>
	</script>

	<?php // Show/Hide the search box in the inner pages sub-header 
		if( $unisphere_options['hide_search'] == '1' ) : ?>
	    <style>
			#sub-header-search { display: none; }
		</style>
	<?php endif; ?>
    
    <?php // Display the custom CSS defined in the admin panel
		if( trim($unisphere_options['custom_css']) != '' ) : ?>
	    <style>
			<?php echo $unisphere_options['custom_css']; ?>
		</style>
	<?php endif; ?>
    
    <!-- PHP value needed for JavaScript -->
    <meta name="search" content="<?php _e( 'search...', 'unisphere' ); ?>" />
	<meta name="unisphere_js" content="<?php echo UNISPHERE_JS; ?>" />
    <meta name="breeze_version" content="1.9" />

<!--END head-->
</head>

<!--BEGIN body-->
<body class="<?php echo semantic_body() . ' ' . $unisphere_options['font']; ?>">

	<!--BEGIN #header-->
	<div id="header">
		
		<!--BEGIN #logo-->
		<h1 id="logo">
			<a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>">
				<?php if( $unisphere_options['logo'] != " ") : ?>
					<img src="<?php echo $unisphere_options['logo'] ?>" alt="<?php bloginfo( 'name' ) ?>" />
				<?php else : ?>
					<?php bloginfo( 'name' ) ?>
				<?php endif; ?>
			</a>
		<!--END #logo-->
		</h1>

		<?php if ( function_exists('wp_nav_menu') ) { // if 3.0 menus exist
			wp_nav_menu( array(
				'show_home' => '0',
       			'sort_column' => 'menu_order',
       			'container_class' => 'menu rounded-all',
       			'menu_class' => 'nav',
       	        'theme_location' => 'header_menu',
       	        'fallback_cb' => 'unisphere_header_navigation'
		    ) );
		} else {
			wp_page_menu( 'show_home=0&sort_column=menu_order&menu_class=menu rounded-all' ); 
		} ?>	        	

	<!--END #header-->
	</div>