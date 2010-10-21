<?php 
/*
Template Name: Full Width Page
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

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
				<?php comments_template( '', true ); ?>

			<?php endwhile; ?>

		<!--END #content-->
		</div>

	<!--END #container-->
	</div>

<?php get_footer(); ?>