<?php
/**
 * unisphere_scripts() loads cripts
 */
function unisphere_scripts() {
	
	global $unisphere_options;
	
	if( is_admin() ) return;
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, ''); // add the newest version of jQuery from Google CDN
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery.easing' , UNISPHERE_JS . '/jquery.easing.1.3.js', array('jquery') );
	wp_enqueue_script( 'swfobject' );
	wp_enqueue_script( 'cufon', UNISPHERE_JS . '/cufon-yui.js', array( 'jquery' ) );
	
	if ( $unisphere_options['font'] == 'Sansation' ) { wp_enqueue_script( 'sansation', UNISPHERE_JS . '/fonts/Sansation.font.js', array( 'jquery' ) ); } // Sansation Font
	if ( $unisphere_options['font'] == 'Museo' ) { wp_enqueue_script( 'museo', UNISPHERE_JS . '/fonts/Museo.font.js', array( 'jquery' ) ); } // Museo Font
	if ( $unisphere_options['font'] == 'Diavlo' ) { wp_enqueue_script( 'diavlo', UNISPHERE_JS . '/fonts/Diavlo.font.js', array( 'jquery' ) ); } // Diavlo Font
	if ( $unisphere_options['font'] == 'Vegur' ) { wp_enqueue_script( 'vegur', UNISPHERE_JS . '/fonts/Vegur.font.js', array( 'jquery' ) ); } // Vegur Font
	if ( $unisphere_options['font'] == 'Fertigo Pro' ) { wp_enqueue_script( 'fertigo_pro', UNISPHERE_JS . '/fonts/Fertigo_Pro.font.js', array( 'jquery' ) ); } // Fertigo Pro Font
	if ( $unisphere_options['font'] == 'Comfortaa' ) { wp_enqueue_script( 'comfortaa', UNISPHERE_JS . '/fonts/Comfortaa.font.js', array( 'jquery' ) ); } // Comfortaa Font
	if ( $unisphere_options['font'] == 'Tertre' ) { wp_enqueue_script( 'tertre', UNISPHERE_JS . '/fonts/Tertre.font.js', array( 'jquery' ) ); } // Tertre Font
	
	wp_enqueue_script( 'hoverintent', UNISPHERE_JS . '/hoverIntent.js', array( 'jquery' ) );
	wp_enqueue_script( 'bgiframe', UNISPHERE_JS . '/jquery.bgiframe.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'superfish', UNISPHERE_JS . '/superfish.js', array( 'jquery' ) );		
	wp_enqueue_script( 'supersubs', UNISPHERE_JS . '/supersubs.js', array( 'jquery' ) );
	wp_enqueue_script( 'prettyphoto', UNISPHERE_JS . '/jquery.prettyPhoto.js', array( 'jquery' ) );
	wp_enqueue_script( 'nivoslider', UNISPHERE_JS . '/jquery.nivo.slider.js', array( 'jquery' ) );
	wp_enqueue_script( 'cycle', UNISPHERE_JS . '/jquery.cycle.js', array( 'jquery' ) );
	wp_enqueue_script( 'innerfade', UNISPHERE_JS . '/jquery.innerfade.js', array( 'jquery' ) );
	wp_enqueue_script( 'quicksand', UNISPHERE_JS . '/jquery.quicksand.js', array( 'jquery' ) );
	wp_enqueue_script( 'flowplayer', UNISPHERE_JS . '/flowplayer.3.2.4.js', array( 'jquery' ) );
	wp_enqueue_script( 'screen', UNISPHERE_JS . '/screen.js', array( 'jquery' ) );
}

add_action( 'init', 'unisphere_scripts' ); // unisphere_scripts() loads scripts
?>