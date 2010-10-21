<?php 
/*
Template Name: Home Page
*/

get_header();

global $unisphere_options;

// Check what Slider the user has selected.
switch ( $unisphere_options['slider'] ) {
	case '': 
	case 'Disable Slider': // don't use a Slider, display the inner page sub-header ?>
    
    <?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #container-->
	<div id="container">

		<?php
		 // Get the sub-header footer from sub-header_footer.php
		 get_template_part( 'sub-header_footer' );
		?>

		<!--BEGIN #content-->
		<div id="content" class="clearfix">
        
<?php	
	break; // End Disable Slider
	
	case 'Normal': // use the Normal Slider
?>
    <!--BEGIN #slider-container-->
	<div id="slider-container" class="rounded-top">
		<div id="slider">
            <?php
				$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$custom = get_post_custom($post->ID);
			?>
            	<?php // If an embedded video is present, don't render it because this slider doesn't support it
					if ( empty ( $custom['_stage_slider_video'][0] ) ) : ?>
					<?php // Lightbox Video takes precedence before the slider link
                        if ( !empty ( $custom['_slider_video'][0] ) ) : ?>
                        <a href="<?php echo $custom['_slider_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox"><?php echo unisphere_get_post_image( 'normal-slider' ); ?></a>
                    <?php else : // No video... ?>
                        <?php if ( !empty ( $custom['_slider_link'][0] ) ) : // ...check if there's a link for the slider item ?>
                            <a href="<?php echo $custom['_slider_link'][0]; ?>" title="<?php the_title(); ?>"><?php echo unisphere_get_post_image( 'normal-slider' ); ?></a>
                        <?php else : ?>
                            <?php echo unisphere_get_post_image( 'normal-slider' ); // No video or link ?>
                        <?php endif; ?>
                    <?php endif; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<!--END #slider-container-->
	</div>
    
    <!--BEGIN Nivo Slider jQuery initializer-->
    <script>
		jQuery(window).load(function() {
	
			/* Home page slider */
			jQuery('#slider').nivoSlider({
				effect:'<?php if ( trim( $unisphere_options['slider_effect'] ) != '' ) { echo $unisphere_options['slider_effect']; } else { echo "random"; } ?>',
				slices:<?php if ( trim( $unisphere_options['slider_slices'] ) != '' ) { echo $unisphere_options['slider_slices']; } else { echo "15"; } ?>,
				animSpeed:<?php if ( trim( $unisphere_options['slider_transition_seconds'] ) != '' ) { echo $unisphere_options['slider_transition_seconds']; } else { echo "500"; } ?>,
				pauseTime:<?php if ( trim( $unisphere_options['slider_seconds'] ) != '' ) { echo $unisphere_options['slider_seconds']; } else { echo "4000"; } ?>,
				startSlide:0, //Set starting Slide (0 index)
				directionNav:false, //Next & Prev
				directionNavHide:true, //Only show on hover
				controlNav:true, //1,2,3...
				controlNavThumbs:false, //Use thumbnails for Control Nav
				controlNavThumbsFromRel:false, //Use image rel for thumbs
				controlNavThumbsSearch: '.jpg', //Replace this with...
				controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
				keyboardNav:true, //Use left & right arrows
				pauseOnHover:true, //Stop animation while hovering
				manualAdvance:false, //Force manual transitions
				captionOpacity:1, //Universal caption opacity
				beforeChange: function(){},
				afterChange: function(){},
				slideshowEnd: function(){} //Triggers after all slides have been shown
			});					
		});
	</script>
    <!--END Nivo Slider jQuery initializer-->

	<!--BEGIN #container-->
	<div id="container">

		<!--BEGIN #content-->
		<div id="content" class="clearfix">

			<!-- #slider-footer -->
			<div id="slider-footer"></div>

<?php	
	break; // End Normal
	
	case 'stage_slider_tall': // use the Stage Slider Tall
?>
    <!--BEGIN #stage-slider-tall-container-->
	<div id="stage-slider-tall-container" class="rounded-top">
		<ul id="stage-slider">
            <?php
				$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$custom = get_post_custom($post->ID);
			?>
            	<li>
					<?php // Display Stage Video (takes precedence before everything)
                        if ( !empty ( $custom['_stage_slider_video'][0] ) ) :
                        $rand = Rand(); ?>
                        <div class="stage-slider-video" id="video<?php echo $rand; ?>" videourl="<?php echo $custom['_stage_slider_video'][0]; ?>"><div id="objectvideo<?php echo $rand; ?>"></div></div>
                    <?php else : // No video... ?>
                        <?php // Lightbox Video takes precedence before the slider link
                            if ( !empty ( $custom['_slider_video'][0] ) ) : ?>
                            <a href="<?php echo $custom['_slider_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox"><?php echo unisphere_get_post_image( 'stage-slider-tall' ); ?></a>
                        <?php else : // No video... ?>
                            <?php if ( !empty ( $custom['_slider_link'][0] ) ) : // ...check if there's a link for the slider item ?>
                                <a href="<?php echo $custom['_slider_link'][0]; ?>" title="<?php the_title(); ?>"><?php echo unisphere_get_post_image( 'stage-slider-tall' ); ?></a>
                            <?php else : ?>
                                <?php echo unisphere_get_post_image( 'stage-slider-tall' ); // No video or link ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="description-wrapper<?php echo ( !empty( $custom['_stage_slider_text_position'][0] ) ? ' description-wrapper-' . $custom['_stage_slider_text_position'][0] : ' description-wrapper-none' ) ?><?php echo ( !empty( $custom['_stage_slider_text_transparent'][0] ) ? ' description-wrapper-transparent' : '' ) ?>">
                            <h3><?php the_title(); ?></h3>
                            <?php if( get_the_content() != '') : ?>
                                <div class="description"><?php the_content() ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </li>
			<?php endwhile; ?>
		</ul>
	<!--END #stage-slider-tall-container-->
	</div>
    
    <!--BEGIN Stage Slider jQuery initializer-->
    <script>
		jQuery(document).ready(function(){
			
			jQuery('#stage-slider')
			.after('<div id="stage-slider-nav">') 
			.cycle({ 
				fx: 'fade', 
				easing: 'easeInOutExpo', 
				cleartype: 1, // enable cleartype corrections 
				timeout: <?php if ( trim( $unisphere_options['slider_seconds'] ) != '' ) { echo $unisphere_options['slider_seconds']; } else { echo "4000"; } ?>,
				pause: 1,
				pager: '#stage-slider-nav',
				before: onCycleBefore
			});			
		});
		
		
	</script>
    <!--END Stage Slider jQuery initializer-->

	<!--BEGIN #container-->
	<div id="container">

		<!--BEGIN #content-->
		<div id="content" class="clearfix">

			<!-- #slider-footer -->
			<div id="stage-slider-footer"></div>

<?php	
	break; // End Stage Slider Tall
	
	case 'stage_slider_wide': // use the Stage Slider Wide
?>
    <!--BEGIN #stage-slider-wide-container-->
	<div id="stage-slider-wide-container" class="rounded-top">
		<ul id="stage-slider">
            <?php
				$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$custom = get_post_custom($post->ID);
			?>
            	<li>
					<?php // Display Stage Video (takes precedence before everything)
                        if ( !empty ( $custom['_stage_slider_video'][0] ) ) :
                        $rand = Rand(); ?>
                        <div class="stage-slider-video<?php echo ( !empty( $custom['_stage_slider_text_position'][0] ) ? ' description-position-' . $custom['_stage_slider_text_position'][0] : ' description-position-none' ) ?>" id="video<?php echo $rand; ?>" videourl="<?php echo $custom['_stage_slider_video'][0]; ?>"><div id="objectvideo<?php echo $rand; ?>"></div></div>
                    <?php else : // No video... ?>
                        <?php // Lightbox Video takes precedence before the slider link
                            if ( !empty ( $custom['_slider_video'][0] ) ) : ?>
                            <a href="<?php echo $custom['_slider_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox"><?php echo unisphere_get_post_image( 'stage-slider-wide' ); ?></a>
                        <?php else : // No video... ?>
                            <?php if ( !empty ( $custom['_slider_link'][0] ) ) : // ...check if there's a link for the slider item ?>
                                <a href="<?php echo $custom['_slider_link'][0]; ?>" title="<?php the_title(); ?>"><?php echo unisphere_get_post_image( 'stage-slider-wide' ); ?></a>
                            <?php else : ?>
                                <?php echo unisphere_get_post_image( 'stage-slider-wide' ); // No video or link ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                        <div class="description-wrapper<?php echo ( !empty( $custom['_stage_slider_text_position'][0] ) ? ' description-wrapper-' . $custom['_stage_slider_text_position'][0] : ' description-wrapper-none' ) ?><?php echo ( !empty( $custom['_stage_slider_text_transparent'][0] ) ? ' description-wrapper-transparent' : '' ) ?>">
    	                <h3><?php the_title(); ?></h3>
        	            <?php if( get_the_content() != '') : ?>
            	            <div class="description"><?php the_content() ?></div>
                	    <?php endif; ?>
	                </div>
                </li>
			<?php endwhile; ?>
		</ul>
	<!--END #stage-slider-wide-container-->
	</div>
    
    <!--BEGIN Stage Slider jQuery initializer-->
    <script>
		jQuery(document).ready(function(){
			
			jQuery('#stage-slider')
			.after('<div id="stage-slider-nav">') 
			.cycle({ 
				fx: 'fade', 
				easing: 'easeInOutExpo', 
				cleartype: 1, // enable cleartype corrections 
				timeout: <?php if ( trim( $unisphere_options['slider_seconds'] ) != '' ) { echo $unisphere_options['slider_seconds']; } else { echo "4000"; } ?>,
				pause: 1,
				pager: '#stage-slider-nav',
				before: onCycleBefore
			});			
		});
		
		
	</script>
    <!--END Stage Slider jQuery initializer-->

	<!--BEGIN #container-->
	<div id="container">

		<!--BEGIN #content-->
		<div id="content" class="clearfix">

			<!-- #slider-footer -->
			<div id="stage-slider-footer"></div>

<?php	
	break; // End Stage Slider Wide

	case 'Full Width Slider': // use the Full Width Slider ?>
	
    <!--BEGIN #container-->
	<div id="container">

		<!--BEGIN #content-->
		<div id="content" class="clearfix">

			<!--BEGIN #slider-full-width-->
			<div id="slider-full-width">
				<ul id="slider-full-width-items">
                	<?php
						$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
						while ($my_query->have_posts()) : $my_query->the_post();
						
						$custom = get_post_custom($post->ID);
					?>
                    <?php // If an embedded video is present, don't render it because this slider doesn't support it
					if ( empty ( $custom['_stage_slider_video'][0] ) ) : ?>
						<?php if ( !empty( $custom['_slider_bgcolor'][0] ) ) : ?>
                        <li style="background-color: <?php echo $custom['_slider_bgcolor'][0]; ?>;">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                            <?php // Lightbox Video takes precedence before the slider link
                                if ( !empty ( $custom['_slider_video'][0] ) ) : ?>
                                <a href="<?php echo $custom['_slider_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox"><?php echo unisphere_get_post_image( 'fullwidth-slider' ); ?></a>
                            <?php else : // No video... ?>
                                <?php if ( !empty ( $custom['_slider_link'][0] ) ) : // ...check if there's a link for the slider item ?>
                                    <a href="<?php echo $custom['_slider_link'][0]; ?>" title="<?php the_title(); ?>"><?php echo unisphere_get_post_image( 'fullwidth-slider' ); ?></a>
                                <?php else : ?>
                                    <?php echo unisphere_get_post_image( 'fullwidth-slider' ); // No video or link ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="caption-bg"></div>
                            <div class="caption"><?php the_title(); ?></div>
                        </li>
                    <?php endif; ?>
					<?php endwhile; ?>
				</ul>

				<ul id="slider_nav">
                <?php
				$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
				$postnum = $my_query->post_count;
				while ($my_query->have_posts()) : $my_query->the_post();
					$custom = get_post_custom($post->ID);
					$postnum = $postnum - 1; ?>                
                	<?php // If an embedded video is present, don't render it because this slider doesn't support it
					if ( empty ( $custom['_stage_slider_video'][0] ) ) : ?>
					<li class="slide_<?php echo $postnum; ?>"></li>
                    <?php endif; ?>
				<?php endwhile; ?>				
				</ul>

			<!--END #slider-full-width-->
			</div>

            <!--BEGIN slider-full-width jQuery initializer-->
            <script>
				jQuery(document).ready(function(){
					jQuery("#slider-full-width").css("display", "block");
					jQuery("body, html").css("overflow-x", "hidden");
					<?php
						$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
						if( $my_query->post_count > 1 ) :
					?>	
					jQuery("#slider-full-width-items").innerfade({ animationtype: "fade", speed: 1000, timeout: <?php if ( trim( $unisphere_options['slider_seconds'] ) != '' ) { echo $unisphere_options['slider_seconds']; } else { echo "4000"; } ?>, type: "sequence", containerheight: "350px", slide_timer_on: "yes", slide_ui_parent: "slider-full-width-items", slide_ui_text: "null", pause_button_id: "null", slide_nav_id: "slider_nav" });
					jQuery.setOptionsButtonEvent();
					<?php else : ?>
					jQuery("#slider_nav").css("display", "none");
					<?php endif; ?>
				});			
			</script>
			<!--END slider-full-width jQuery initializer-->

<?php
	break; // end 'Full Width Slider'
} // end switch ?>


			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; 
			endif; ?>

			<?php if ( $unisphere_options['show_3_home_sections'] == '1' ) : ?>
            
			<!--BEGIN #home-3-sections-->
			<div id="home-3-sections" class="clearfix">

				<div class="home-section">
					<?php	/* Widgetized Area */
						if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Section 1') ) : ?>
	        
						<?php echo wpml_t( 'unisphere', 'Home Section 1', do_shortcode( $unisphere_options['home_section_1'] ) ) ?>
	        	
	    	    	<?php endif; ?>
				</div>

				<div class="home-section">
					<?php	/* Widgetized Area */
						if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Section 2') ) : ?>
	        
						<?php echo wpml_t( 'unisphere', 'Home Section 2', do_shortcode( $unisphere_options['home_section_2'] ) ); ?>
	        	
	    	    	<?php endif; ?>
				</div>

				<div class="home-section">
					<?php	/* Widgetized Area */
						if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Section 3') ) : ?>
	        
						<?php echo wpml_t( 'unisphere', 'Home Section 3', do_shortcode( $unisphere_options['home_section_3'] ) ); ?>
	        	
	    	    	<?php endif; ?>
				</div>

			<!--END #home-3-sections-->
			</div>
			           
            <?php endif; ?>
            
  			<?php if ( $unisphere_options['show_3_home_sections'] == '1' && ( $unisphere_options['show_home_portfolio'] == '1' || $unisphere_options['show_home_blog'] == '1' ) ) : ?>
            
            <!-- Separator -->
			<div class="hr"><hr /></div>
            
			<?php endif; ?>

			<?php if ( $unisphere_options['show_home_portfolio'] == '1' ) : ?>
            
            <!--BEGIN #home-portfolio-->
			<div id="home-portfolio">

				<?php if ( trim( $unisphere_options['home_portfolio_title'] ) != '' ) echo '<h3>' . wpml_t( 'unisphere', 'Home Page Portfolio Section Title', $unisphere_options['home_portfolio_title'] ) . '</h3>'; ?>
                <?php if ( trim( $unisphere_options['home_portfolio_subtitle'] ) != '' ) echo '<span class="meta">' . wpml_t( 'unisphere', 'Home Page Portfolio Section Sub-Title', $unisphere_options['home_portfolio_subtitle'] ) . '</span>'; ?>

				<?php if ( trim( $unisphere_options['home_portfolio_button_text'] ) != '' ) echo '<a href="' . wpml_t( 'unisphere', '"View Portfolio" Button Link', $unisphere_options['home_portfolio_button_link'] ) . '" class="button rounded-all" title="' . wpml_t( 'unisphere', '"View Portfolio" Button Text', $unisphere_options['home_portfolio_button_text'] ) . '">' . wpml_t( 'unisphere', '"View Portfolio" Button Text', $unisphere_options['home_portfolio_button_text'] ) . '</a>'; ?>

				<ul class="portfolio-3-columns-list clearfix">
					<?php
                        $my_query = new WP_Query( array( 'post_type' => 'portfolio', 'showposts' => '3' ) ); 
                        while ($my_query->have_posts()) : $my_query->the_post();
                        
                        $custom = get_post_custom($post->ID);
                    ?>
                    <li class="portfolio-item">
                    	<?php // Lightbox Video takes precedence before the portfolio link
							if( !empty ( $custom['_portfolio_video'][0] ) ) : // Check if there's a video to be displayed in the lightbox when clicking the thumb ?>
                            <a href="<?php echo $custom['_portfolio_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox[portfolio]">
                    	<?php elseif( $custom['_portfolio_link'][0] != '' ) : // User has set a custom destination link for this portfolio item ?>
                    		<a href="<?php echo $custom['_portfolio_link'][0]; ?>" title="<?php the_title(); ?>">
                    	<?php elseif( $custom['_portfolio_no_lightbox'][0] == '1' ) : // User has selected to link the thumb directly to the portfolio item detail page or the custom url ?>
                    		<a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php else : // just open the full image in the lightbox ?>
                            <a href="<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); echo $full_image[0]; ?>" title="<?php the_title(); ?>" rel="lightbox[portfolio]">
                        <?php endif; ?>
                        <?php echo unisphere_get_post_image("portfolio1"); ?>
                        </a>                            
						<div class="label-container">
							<span class="label"><?php the_title(); ?></span>
							<a href="<?php echo !empty( $custom['_portfolio_link'][0] ) ? $custom['_portfolio_link'][0] : the_permalink(); ?>" class="read-more"><?php _e('view project &raquo;', 'unisphere'); ?></a>
						</div>
                    </li>
                    <?php endwhile; ?>
				</ul>
                
			<!--END #home-portfolio-->
			</div>

			<?php endif; ?>
            
  			<?php if ( $unisphere_options['show_home_portfolio'] == '1' && $unisphere_options['show_home_blog'] == '1' ) : ?>
            
            <!-- Separator -->
			<div class="hr"><hr /></div>
            
			<?php endif; ?>
            
            <?php if ( $unisphere_options['show_home_blog'] == '1' ) : ?>
            
            <!--BEGIN #home-blog-->
			<div id="home-blog">

				<?php if ( trim( $unisphere_options['home_blog_title'] ) != '' ) echo '<h3>' . wpml_t( 'unisphere', 'Home Page Blog Section Title', $unisphere_options['home_blog_title'] ) . '</h3>'; ?>
                <?php if ( trim( $unisphere_options['home_blog_subtitle'] ) != '' ) echo '<span class="meta">' . wpml_t( 'unisphere', 'Home Page Blog Section Sub-Title', $unisphere_options['home_blog_subtitle'] ) . '</span>'; ?>

				<?php if ( trim( $unisphere_options['home_blog_button_text'] ) != '' ) echo '<a href="' . wpml_t( 'unisphere', '"Read the Blog" Button Link', $unisphere_options['home_blog_button_link'] ) . '" class="button rounded-all" title="' . wpml_t( 'unisphere', '"Read the Blog" Button Text', $unisphere_options['home_blog_button_text'] ) . '">' . wpml_t( 'unisphere', '"Read the Blog" Button Text', $unisphere_options['home_blog_button_text'] ) . '</a>'; ?>

			<!--END #home-portfolio-->
			</div>
            
			<!--BEGIN #primary-->
			<div id="primary">

				<?php
					$my_query = new WP_Query( array( 'post_type' => 'post', 'showposts' => '1' ) ); 
					while ($my_query->have_posts()) : $my_query->the_post();
				?>
                    <div id="post-<?php the_ID(); ?>" class="post-excerpt post home-post clearfix rounded-all<?php if( unisphere_get_post_image("blog") == '' ) echo ' post-no-image'; ?>">
    
                        <div class="post-image">                        
                            <a href="<?php the_permalink(); ?>"><?php echo unisphere_get_post_image("blog"); ?></a>
                        </div>
                        
                        <div class="post-content-wrapper">
                
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                            
                            <div class="post-meta rounded-all">
                                
                                <?php printf( __( '<span class="published">Posted on %1$s</span> <span class="author">by %2$s</span>', 'unisphere' ),
                                        sprintf( '<abbr class="published-time" title="%1$s">%2$s</abbr>',
                                            esc_attr( get_the_time() ),
                                            get_the_date()
                                        ),
                                        sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
                                            get_author_posts_url( get_the_author_meta( 'ID' ) ),
                                            sprintf( esc_attr__( 'View all posts by %s', 'unisphere' ), get_the_author() ),
                                            get_the_author()
                                        )
                                    ); ?>
                                
                                <br />
                                
                                <?php if ( count( get_the_category() ) ) : ?>
                                    <span class="post-categories"><?php printf( __( 'Posted in %s', 'unisphere' ), get_the_category_list( ', ' ) ); ?></span>
                                <?php endif; ?>
                                
                                <?php
                                    $tags_list = get_the_tag_list( '', ', ' );
                                    if ( $tags_list ) : ?>
                                    <span class="post-tags"><?php printf( __( 'Tagged %s', 'unisphere' ), $tags_list ); ?></span>
                                <?php endif; ?>
                                
                            </div>
                
                            <div class="post-text">                
                                <?php echo unisphere_custom_excerpt( get_the_excerpt(), 16 ); ?>   
                            </div>
                
                        </div>
                        
                    </div>
					<?php endwhile; ?>
                    
			<!--END #primary-->
			</div>

			<!--BEGIN #secondary-->
			<div id="secondary">

				<div class="widget widget-posts widget-home-posts">
					<ul>

						<?php
							$my_query = new WP_Query( array( 'post_type' => 'post', 'offset' => '1', 'showposts' => '3' ) ); 
							while ($my_query->have_posts()) : $my_query->the_post();
						?>
                        
                        <li class="clearfix">
							<a href="<?php the_permalink(); ?>"><?php echo unisphere_get_post_image("sidebar-post"); ?></a>
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a><?php echo unisphere_custom_excerpt( get_the_excerpt(), 8 ); ?>
						</li>

						<?php endwhile; ?>
					
                    </ul>
				</div>                        

			<!--END #secondary-->
			</div>
                
			<?php endif; ?>
            
		<!--END #content-->
		</div>

	<!--END #container-->
	</div>

<?php get_footer(); ?>