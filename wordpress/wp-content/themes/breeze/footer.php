<?php global $unisphere_options; ?>

    <!--BEGIN #footer-container-->
    <div id="footer-container" class="rounded-bottom">

        <!--BEGIN #footer-->
        <div id="footer" class="clearfix">

			<p id="copyright"><?php echo $unisphere_options['footer_copyright']; ?></p>
            
            <ul id="social">
                <li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><img src="<?php echo UNISPHERE_IMAGES . '/rss.png' ?>" alt="RSS" /></a></li>
                
				<?php if ( trim( $unisphere_options['footer_twitter']) != '' ) : ?>
                <li><a href="<?php echo $unisphere_options['footer_twitter']; ?>" title="Twitter"><img src="<?php echo UNISPHERE_IMAGES . '/twitter.png' ?>" alt="Twitter" /></a></li>
                <?php endif; ?>
                
				<?php if ( trim( $unisphere_options['footer_facebook']) != '' ) : ?>
                <li><a href="<?php echo $unisphere_options['footer_facebook']; ?>" title="Facebook"><img src="<?php echo UNISPHERE_IMAGES . '/facebook.png' ?>" alt="Facebook" /></a></li>
                <?php endif; ?>
                
				<?php if ( trim( $unisphere_options['footer_flickr']) != '' ) : ?>
                <li><a href="<?php echo $unisphere_options['footer_flickr']; ?>" title="Flickr"><img src="<?php echo UNISPHERE_IMAGES . '/flickr.png' ?>" alt="Flickr" /></a></li>
                <?php endif; ?>
                
				<?php if ( trim( $unisphere_options['footer_linkedin']) != '' ) : ?>
                <li><a href="<?php echo $unisphere_options['footer_linkedin']; ?>" title="LinkedIn"><img src="<?php echo UNISPHERE_IMAGES . '/linkedin.png' ?>" alt="LinkedIn" /></a></li>
                <?php endif; ?>
            </ul>

        <!--END #footer-->
        </div>

	<!--END #footer-container-->
	</div>
	
    <?php // Display the custom scripts defined in the admin panel
		if( trim($unisphere_options['custom_js']) != '' ) : ?>
	    <script>
			<?php echo $unisphere_options['custom_js']; ?>
		</script>
	<?php endif; ?>
    
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
	
<!--END body-->
</body>
<!--END html-->
</html>