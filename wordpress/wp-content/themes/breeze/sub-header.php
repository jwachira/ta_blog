<?php
/**
 * The inner page sub-header
 */ 
?>

	<!--BEGIN #sub-header-->
	<div id="sub-header" class="rounded-top">

		<div id="sub-header-content">

			<?php // Sub-header Image
				global $post;
				
				// Check current post's post type
				$post_type = get_post_type( $post->ID );

				$post_id = $post->ID;
											
				if( (is_home() || is_single() || is_archive() || is_search()) && $post_type != 'portfolio' ) { // Keep the image defined in your blog page through the archives, category, tags, single, etc
					$post_id = get_option( 'page_for_posts' ); 
				
					if( $post_id == '0' || $post_id == '' )
						$post_id = get_option( 'page_on_front' ); 
				}
				
				if( is_single() && $post_type == 'portfolio' ) { // Keep the image defined in the portfolio page through the single portfolio posts
				
					// Get the portfolio item category (if has more than one use the first)
					$cat = wp_get_object_terms($post->ID, 'portfolio_category');
					$cat = $cat[0];

					// Check in what page this category is being displayed
					$post_id = get_page_ID_by_custom_field_value('_page_portfolio_cat', $cat->term_id);
				}

                echo unisphere_get_post_image( 'page-header', $post_id ); ?>

			<?php // Sub-header Title				
				$sub_title = '';
				
				// Check current post's post type
				$post_type = get_post_type( $post->ID );
			
				if( (is_home() || is_single()) && !is_attachment() && $post_type != 'portfolio' ) { // Keep the sub-title defined in your blog page through the blog and single posts
					$sub_title = get_post_meta( get_option( 'page_for_posts' ), "_page_sub_title", $single = true ); 
					
					$page_for_posts = get_option( 'page_for_posts' );
					if( $page_for_posts == '0' || $page_for_posts == '' )
						$sub_title = get_post_meta( get_option( 'page_on_front' ), "_page_sub_title", $single = true ); 
				} elseif( is_single() && $post_type == 'portfolio' ) { // Keep the image defined in the portfolio page through the single portfolio posts				
									
					// Get the portfolio item category (if has more than one use the first)
					$cat = wp_get_object_terms($post->ID, 'portfolio_category');
					$cat = $cat[0];

					// Check in what page this category is being displayed
					$post_id = get_page_ID_by_custom_field_value('_page_portfolio_cat', $cat->term_id);
					
					$sub_title = get_post_meta( $post_id, "_page_sub_title", $single = true ); 				
				} elseif( is_tag() ) {
					$sub_title = sprintf( __( 'Tag Archives: %s', 'unisphere' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				} elseif( is_category() ) {
					$sub_title = sprintf( __( 'Category Archives: %s', 'unisphere' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				} elseif( is_author() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Author Archives: %s', 'unisphere' ), '<span>' . get_the_author() . '</span>' );
					rewind_posts();
				} elseif( is_day() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Daily Archives: %s', 'unisphere' ), '<span>' . get_the_date() . '</span>' );
					rewind_posts();
				} elseif( is_month() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Monthly Archives: %s', 'unisphere' ), '<span>' . get_the_date('F Y') . '</span>' );
					rewind_posts();
				} elseif( is_year() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Yearly Archives: %s', 'unisphere' ), '<span>' . get_the_date('Y') . '</span>' );
					rewind_posts();
				} elseif( is_404() ) {					
					$sub_title = __( 'The Page could not be found', 'unisphere' );
				} elseif( is_attachment() ) {
					if ( have_posts() )	the_post();
					$sub_title = sprintf( __( 'Attachment: %s', 'unisphere' ), '<span>' . get_the_title() . '</span>' );
					rewind_posts();
				} elseif( is_search() ) {
					$sub_title = sprintf( __( 'Search Results for: %s', 'unisphere' ), '<span>' . get_search_query() . '</span>' );
				} else {
					$sub_title = get_post_meta( $post->ID, "_page_sub_title", $single = true );
                } 
                
                if( $sub_title != '' ) {
					echo '<h2 class="rounded-right">' . $sub_title . '</h2>';
				} ?>

		</div>

	<!--END #sub-header-->
	</div>