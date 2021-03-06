<?php
/**
 * The template for displaying 404 pages (Not Found).
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
		<div id="content" class="full-width-page clearfix">

			<div class="error404 not-found">
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'unisphere' ); ?></p>
				<?php get_search_form(); ?>                        
			</div>
		
		<!--END #content-->
		</div>	

	<!--END #container-->
	</div>	

<?php get_footer(); ?>