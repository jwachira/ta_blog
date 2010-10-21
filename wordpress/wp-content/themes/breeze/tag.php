<?php
/**
 * The template for displaying Tag Archive pages.
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
		?>

		<!--BEGIN #content-->
		<div id="content" class="blog tag-archives clearfix">

			<!--BEGIN #primary-->
			<div id="primary">

				<?php
                /* Run the loop to output the posts. */
            	 get_template_part( 'loop' );
                ?>
		
	        <!--END #primary-->
			</div>
            
            <?php get_sidebar(); ?>

		<!--END #content-->
		</div>	

	<!--END #container-->
	</div>	

<?php get_footer(); ?>
