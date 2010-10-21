<?php
/**
 * The inner page sub-header footer
 */
 
 global $unisphere_options;
?>
	<div id="sub-header-footer">

        <div id="sub-header-nav">           

			<?php 
			if( $unisphere_options['hide_breadcrumbs'] != '1' ) {
				// Display the Breadcrumbs
				$delimiter = '<span class="delimiter">&raquo;</span>';
				$name = get_page_name_by_ID(get_option('page_on_front'));
				$currentBefore = '<span class="current">';
				$currentAfter = '</span>';
				
				if ( is_front_page() ) {
					echo $name;
				} else {
					global $post;
					$home = get_bloginfo('url');
					echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
					 
					if ( is_home() ) {
						echo $currentBefore;
						echo get_page_name_by_ID(get_option('page_for_posts'));
						echo $currentAfter;
					
					} if ( is_category() ) {
						global $wp_query;
						$cat_obj = $wp_query->get_queried_object();
						$thisCat = $cat_obj->term_id;
						$thisCat = get_category($thisCat);
						$parentCat = get_category($thisCat->parent);
						if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
						echo $currentBefore;
						printf( __( 'Category Archives: %s', 'unisphere' ), single_cat_title( '', false ) );
						echo $currentAfter;
					
					} elseif ( is_day() ) {
						echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
						echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
						echo $currentBefore . get_the_time('d') . $currentAfter;
					
					} elseif ( is_month() ) {
						echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
						echo $currentBefore . get_the_time('F') . $currentAfter;
					
					} elseif ( is_year() ) {
						echo $currentBefore . get_the_time('Y') . $currentAfter;
					
					} elseif ( is_single() && !is_attachment() ) {
						// Check current post's post type
						$post_type = get_post_type( $post->ID );
						
						// if it's not a portfolio item, then it's a blog post
						if( $post_type != 'portfolio' ) { 
							$page_for_posts = get_option('page_for_posts');
							if($page_for_posts != '0' && $page_for_posts != '') {
								echo $currentBefore . '<a href="' . get_permalink(get_option('page_for_posts')) . '">' . get_page_name_by_ID(get_option('page_for_posts')) . '</a>' . $currentAfter;

								echo ' ' . $delimiter . ' ';
															}
								echo $currentBefore;
								if ( have_posts() )	the_post();
								the_title();
								rewind_posts();
								echo $currentAfter;

						} else { // it's a portfolio item
							// Get the portfolio item category (if has more than one use the first)
							if ( have_posts() )	the_post();
							$cat = wp_get_object_terms(get_the_ID(), 'portfolio_category');
							$cat = $cat[0];
		
							// Check in what page this category is being displayed
							$page_id = get_page_ID_by_custom_field_value('_page_portfolio_cat', $cat->term_id);
							
							rewind_posts();
							
							$portfolio_page = get_page( $page_id );
							
							$parent_id  = $portfolio_page;
							$breadcrumbs = array();
							while ($parent_id) {
								$page = get_page($parent_id);
								$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
								$parent_id  = $page->post_parent;
							}
							$breadcrumbs = array_reverse($breadcrumbs);
							foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
							echo $currentBefore;
							the_title();
							echo $currentAfter;
						}
					
					} elseif ( is_page() && !$post->post_parent ) {
						echo $currentBefore;
						the_title();
						echo $currentAfter;
					
					} elseif ( is_page() && $post->post_parent ) {
						$parent_id  = $post->post_parent;
						$breadcrumbs = array();
						$page_on_front = get_option('page_on_front');
						while ($parent_id) {
							if($parent_id == $page_on_front) { break; }
							$page = get_page($parent_id);
							$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
							$parent_id  = $page->post_parent;
						}
						$breadcrumbs = array_reverse($breadcrumbs);
						foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
						echo $currentBefore;
						the_title();
						echo $currentAfter;
					
					} elseif ( is_search() ) {
						echo $currentBefore . sprintf( __( 'Search Results for: %s', 'unisphere' ), get_search_query() ) . $currentAfter;
					
					} elseif ( is_tag() ) {
						echo $currentBefore . sprintf( __( 'Tag Archives: %s', 'unisphere' ), single_tag_title( '', false ) ) . $currentAfter;
					
					} elseif ( is_author() ) {
						global $author;
						$userdata = get_userdata($author);
						echo $currentBefore . sprintf( __( 'Author Archives: %s', 'unisphere' ), $userdata->display_name ) . $currentAfter;
						
					} elseif ( is_attachment() ) {
						echo $currentBefore . sprintf( __( 'Attachment: %s', 'unisphere' ), get_the_title() ) . $currentAfter;                
					
					} elseif ( is_404() ) {
						echo $currentBefore . __( 'The Page could not be found', 'unisphere' ) . $currentAfter;
					} 
				}
            } ?>
            
        </div>

        <div id="sub-header-search">
            <form class="searchform" method="get" action="<?php bloginfo( 'url' ); ?>">
                <p><input class="search" name="s" type="text" value="" /><button class="search-btn" type="submit"></button></p>
            </form>
        </div>

    </div>