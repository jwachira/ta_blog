<?php 
/*
Template Name: Portfolio 3 Columns
*/

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #container-->
	<div id="container">

		<?php
		 // Get the sub-header footer from sub-header_footer.php
		 get_template_part( 'sub-header_footer' );
		 
		// If the user as set a number of items per page...
		if( get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = true) != '' ) { 
			$items_per_page = get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = true);
		} else { // else don't paginate
			$items_per_page = 9999;
		}
		
		// The selected categories to show
		$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
		?>

		<!--BEGIN #content-->
		<div id="content" class="portfolio-page-3-columns">
        
        	<div class="portfolio-content"><?php the_content(); ?></div>
        
        	<?php 
			if( $cats == '' ) {
				echo '<div class="portfolio-content"><p>No categories have been selected for this portfolio page. Please login to your Wordpress Admin area and set the categories you want to show by editing this page and setting one or more categories in the multi checkbox field "Portfolio Categories".</p></div>';
			} else { 
				// If the user hasn't set a number of items per page, then use JavaScript filtering
				if( $items_per_page == 9999 ) :
			?>
                <span class="portfolio-browse"><?php _e( 'browse:', 'unisphere' ); ?></span>
    
                <ul class="portfolio-filters">
                    <li class="all"><a class="button rounded-all" href="#"><?php _e( 'All', 'unisphere' ); ?></a></li>
                    <?php
                    // display only the selected portfolio categories
                    $tax_terms = get_terms( 'portfolio_category', array( 'include' => $cats ) );

                    // list selected terms in the portfolio_category taxonomy
                    foreach ($tax_terms as $tax_term) {
                        echo '<li class="' . $tax_term->slug . '">' . '<a class="button-unselected rounded-all" href="#">' . $tax_term->name . '</a></li>';
                    } ?>
                </ul>
    
                <div class="clearfix"></div>
                
                <?php endif; ?>
    
                <ul class="portfolio-3-columns-list clearfix">
                    <?php
                        // because Wordpress doesn't yet provide an API for querying multiple terms in a taxonomy 
                        // we have to use a not so elegant solution: query just the posts in the selected terms
                        $portfolio_posts_to_query = get_objects_in_term( explode( ",", $cats ), 'portfolio_category');
                        
                        $wp_query = new WP_Query( array( 'post_type' => 'portfolio', 'post__in' => $portfolio_posts_to_query, 'paged' => $paged, 'showposts' => $items_per_page ) ); 
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            
                            $custom = get_post_custom($post->ID);
                            
                            // Get the portfolio item categories
                            $cats = wp_get_object_terms($post->ID, 'portfolio_category');
                            
                            // If no category was assigned, don't show the item
                            if ( $cats ) :
								$cat_slugs = '';
								foreach( $cats as $cat ) {
									$cat_slugs .= $cat->slug . ",";
								}
								$cat_slugs = substr($cat_slugs, 0, -1);
                    ?>
                            <li class="portfolio-item" data-type="<?php echo $cat_slugs; ?>" data-id="<?php echo $post->ID; ?>">
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
                        <?php endif; ?> 
                    <?php endwhile; ?>
                </ul>
            
				<?php
                // If the user has set a number of items per page, then display pagination
                if( $items_per_page != 9999 ) {
                    echo '<div class="hr"><hr /></div>';				
                    // Show the pagination from navigation.php
                    get_template_part( 'navigation' );
                } 
			} ?>

		<!--END #content-->
		</div>

	<!--END #container-->
	</div>

<?php get_footer(); ?>