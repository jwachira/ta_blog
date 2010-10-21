<?php
/**
 * The Template for displaying all single posts.
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
		<div id="content" class="blog-post clearfix">

			<!--BEGIN #primary-->
			<div id="primary">
            
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<!--BEGIN .post-detail-->
					<div id="post-<?php the_ID(); ?>" class="post-detail clearfix <?php if( unisphere_get_post_image("blog-detail") == '' ) echo ' post-no-image'; ?>">
                    
                        <h2 class="post-title"><?php the_title(); ?></h2>
    
                        <div class="post-image">
							<?php echo unisphere_get_post_image("blog-detail"); ?>
                        </div>
    
                        <div class="post-meta rounded-all">
				
							<?php printf( __( '<span class="published">Posted on %1$s</span> <span class="author">by %2$s</span>', 'unisphere' ),
                                    sprintf( '<abbr class="published-time" title="%1$s">%2$s</abbr>',
                                        esc_attr( get_the_time() ),
                                        get_the_date()
                                    ),
                                    sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
                                        get_author_posts_url( get_the_author_meta( 'ID' ) ),
                                        sprintf( esc_attr__( 'View all posts by %s', 'unisphere' ), get_the_author() ),
                                        get_the_author()
                                    )
                                ); ?>
                            
                            <br />
                            
                            <?php if ( count( get_the_category() ) ) : ?>
                                <span class="post-categories"><?php printf( __( 'Posted in %s', 'unisphere' ), get_the_category_list( ', ' ) ); ?></span>
                            <?php endif; ?>
                            
                            <?php
                                $tags_list = get_the_tag_list( '', ', ' );
                                if ( $tags_list ) : ?>
                                <span class="post-tags"><?php printf( __( 'Tagged %s', 'unisphere' ), $tags_list ); ?></span>
                            <?php endif; ?>
                            
                        </div>
    
                        <div class="post-text">
                            <?php the_content(); ?>
                        </div>
                        
                        <?php wp_link_pages('before=<div class="wp-pagenavi post_linkpages">&after=</div>&link_before=<span>&link_after=</span>'); ?>
    
                    <!--END .post-detail-->
                    </div>
                    
					<div class="hr"><hr /></div>
                    
<?php  // show related posts of current post by tags (if not disabled in post by custom field)
$custom = get_post_custom($post->ID);
if( empty( $custom['_blog_hide_related_posts'][0] ) ) {
					$backup = $post;  // backup the current object
					$tags = wp_get_post_tags($post->ID);
					$tagIDs = array();
					
					if ($tags) :
						$tagcount = count($tags);
					
						for ($i = 0; $i < $tagcount; $i++) {
							$tagIDs[$i] = $tags[$i]->term_id;
						}
						
						$args = array(
							'tag__in' => $tagIDs,
							'post__not_in' => array($post->ID),
							'showposts' => 5,
							'caller_get_posts'=>1
						);
						
						$my_query = new WP_Query($args);
						if( $my_query->have_posts() ) : ?>
                        	<h3 class="related-posts-title"><?php _e( 'Related Posts', 'unisphere' ); ?></h3>
                            <div class="related-posts rounded-all clearfix">
                            	<ul class="related-posts-list">
									<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
										<li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo unisphere_get_post_image("related-post"); ?><span class="tooltip rounded-all"><?php the_title() ?></span></a></li>
									<?php endwhile; ?>
								</ul>
							</div>
							<div class="hr"><hr /></div>
						<?php endif; ?>
					<?php endif; 

					$post = $backup;  // copy it back
					wp_reset_query(); // to use the original query again
}
?>
    
<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<h3 id="author-title"><?php printf( esc_attr__( 'About %s', 'unisphere' ), get_the_author() ); ?></h3>
					<div id="author-info" class="rounded-all">	
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?>
						</div>
						<div id="author-description">
							<?php the_author_meta( 'description' ); ?>
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s', 'unisphere' ), get_the_author() ); ?>
							</a>
						</div>

					</div>
                    
                    <div class="clearfix"></div>
                    
					<div class="hr"><hr /></div>
<?php endif; ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

			<!--END #primary-->
			</div>

			<?php get_sidebar(); ?>
            
		<!--END #content-->
		</div>

	<!--END #container-->
	</div>

<?php get_footer(); ?>