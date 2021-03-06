<?php
/**
 * Popular Posts Widget
 */


/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'unisphere_load_popular_posts_widget' );


/**
 * Register our widget.
 * 'UniSphere_Popular_Posts_Widget' is the widget class used below.
 */
function unisphere_load_popular_posts_widget() {
	register_widget( 'UniSphere_Popular_Posts_Widget' );
}


/**
 * UniSphere_Popular_Posts_Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 */
class UniSphere_Popular_Posts_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function UniSphere_Popular_Posts_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-posts widget-popular-posts', 'description' => 'The most popular posts on your site' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'unisphere-popular-posts-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'unisphere-popular-posts-widget', 'UniSphere Popular Posts', $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$numberposts = $instance['numberposts'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by theme). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display popular posts. */

		$popular = new WP_Query('orderby=comment_count&posts_per_page=' . $numberposts);
		
		echo '<ul>';

		while ($popular->have_posts()) : $popular->the_post();
    
			echo '<li class="clearfix">';
			echo '<a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">' . unisphere_get_post_image( 'sidebar-post' ) . '</a>';
			echo '<a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">' . get_the_title() . '</a>' . unisphere_custom_excerpt( get_the_excerpt(), 8 );
			echo '</li>';
    
		endwhile;
		
		echo '</ul>';

		/* After widget (defined by theme). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['numberposts'] = strip_tags( $new_instance['numberposts'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'numberposts' => 3 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
		<!-- Widget Number of Posts: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'numberposts' ); ?>">Number of posts to show:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'numberposts' ); ?>" name="<?php echo $this->get_field_name( 'numberposts' ); ?>" value="<?php echo $instance['numberposts']; ?>" size="3" />
		</p>

	<?php
	}
}
?>