<?php
/**
 * The Slider Images custom post type
 */
add_action('init', 'slider_images_register');

function slider_images_register() {	

	register_post_type( 'slider' , 
						array(
							'label' => 'Slider Items',
							'singular_label' => 'Slider Item',
							'public' => true,
							'show_ui' => true,
							'capability_type' => 'post',
							'hierarchical' => false,
							'rewrite' => true,
							'supports' => array('title', 'thumbnail', 'editor', 'custom-fields')
						)
					);
	
	add_filter('manage_edit-slider_columns', 'slider_edit_columns');
	add_action('manage_posts_custom_column',  'slider_custom_columns');
	
	function slider_edit_columns($columns){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => 'Slider Image Title',
			'slider_image' => 'Image',
			'slider_url' => 'Destination URL',
		);
	
		return $columns;
	}
	
	function slider_custom_columns($column){
		switch ($column)
		{
			case 'slider_image':
				the_post_thumbnail( 'gallery' );
				break;
			case 'slider_url':  
				$custom = get_post_custom();  
				echo $custom['_slider_link'][0];  
				break;  
		}
	}
}


/**
 * The Portfolio custom post type
 */
add_action('init', 'portfolio_register');

function portfolio_register() {	

	register_post_type( 'portfolio' , 
						array(
							'label' => 'Portfolio',
							'singular_label' => 'Portfolio',
							'public' => true,
							'show_ui' => true,
							'capability_type' => 'post',
							'hierarchical' => false,
							'rewrite' => false,
							'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions')
						)
					);

	register_taxonomy( 'portfolio_category', 
						'portfolio', 
						array( 'hierarchical' => true, 
								'label' => 'Categories',
								'singular_label' => 'Category', 
								'rewrite' => false
						)
					);  
	
	add_filter('manage_edit-portfolio_columns', 'portfolio_edit_columns');
	add_action('manage_posts_custom_column',  'portfolio_custom_columns');
	
	function portfolio_edit_columns($columns){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => 'Title',
			'portfolio_category' => 'Category',
			'portfolio_description' => 'Description',
			'portfolio_image' => 'Image',
		);
	
		return $columns;
	}
	
	function portfolio_custom_columns($column){
		switch ($column)
		{
			case "portfolio_category":  
				echo get_the_term_list($post->ID, 'portfolio_category', '', ', ','');  
				break;  

			case 'portfolio_description':
				the_excerpt();  
				break;  

			case 'portfolio_image':
				the_post_thumbnail( 'portfolio1' );
				break;
		}
	}
}
?>