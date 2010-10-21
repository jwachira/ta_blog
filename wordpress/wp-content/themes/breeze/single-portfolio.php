<?php
/**
 * The Template for displaying portfolio single posts.
 */

get_header(); ?>

	<?php 
	// Set the Portfolio as the selected menu on top
	$portfolio_root_page_ID = get_page_ID_by_page_template('template_portfolio3columns.php');
	if( $portfolio_root_page_ID == '' ) { $portfolio_root_page_ID = get_page_ID_by_page_template('template_portfolio1column.php'); }
	
	$portfolio_root_page_ID = get_root_page($portfolio_root_page_ID);
	?>

	<script type="text/javascript">			
		jQuery(document).ready(function() {			
			jQuery(".menu li.current_page_parent").removeClass('current_page_parent');
			jQuery(".menu li.page-item-<?php echo $portfolio_root_page_ID; ?>").addClass('current_page_item');					
		});			
	</script>

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
		<div id="content" class="portfolio-detail-page full-width-page">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                
                	<div class="title"><?php the_title(); ?></div>

                    <?php the_content(); ?>
                    
                    <?php 
					$custom = get_post_custom($post->ID);
					
                    $photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
        
                    if ($photos) : 

						// Now see if the user wants to display the images in a slider or not
						if( !empty($custom['_portfolio_detail_big_images'][0] ) ) : // Display big images 

							foreach ($photos as $photo) : ?>
								<p>
                                <?php // If video link to it instead of the full image
								if( !empty( $custom['_portfolio_video'][0] ) ) : ?>
                                    <a href="<?php echo $custom['_portfolio_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox[<?php echo $post->ID; ?>]">
                                <?php else : ?>
                                    <a href="<?php $portfolio_full = wp_get_attachment_image_src($photo->ID, 'full'); echo $portfolio_full[0]; ?>" title="<?php the_title(); ?>" rel="lightbox[<?php echo $post->ID; ?>]">
                                <?php endif; ?>
                                <img src="<?php $portfolio_thumb = wp_get_attachment_image_src($photo->ID, 'portfolio-detail-big'); echo $portfolio_thumb[0]; ?>" alt="" class="rounded-all" />
                                </a>
                                </p>
                            <?php endforeach; ?>
						
						<?php else : // Display images in Slider ?>
			
                            <div class="slider slider-big slider-portfolio-detail">
                                
                                <?php
                                    foreach ($photos as $photo) : 
                                        // If video link to it instead of the full image
                                        if( !empty( $custom['_portfolio_video'][0] ) ) : ?>
                                            <a href="<?php echo $custom['_portfolio_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox[<?php echo $post->ID; ?>]">
                                        <?php else : ?>
                                            <a href="<?php $portfolio_full = wp_get_attachment_image_src($photo->ID, 'full'); echo $portfolio_full[0]; ?>" title="<?php the_title(); ?>" rel="lightbox[<?php echo $post->ID; ?>]">
                                        <?php endif; ?>
                                        <?php $portfolio_thumb = wp_get_attachment_image($photo->ID, 'portfolio-detail'); echo $portfolio_thumb; ?>
                                        </a>
                                <?php endforeach; ?>
        
                            </div>
                            
                            <script>
                                jQuery(window).load(function() {
                                
                                    /* Slider */
                                    jQuery('.slider-portfolio-detail').nivoSlider({
                                        effect:'random', //Specify sets like: 'fold,fade,sliceDown'
                                        slices:15,
                                        animSpeed:500,
                                        pauseTime:4500,
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
                    
                    	<?php endif; ?>

                    <?php endif; ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

		<!--END #content-->
		</div>

	<!--END #container-->
	</div>

<?php get_footer(); ?>