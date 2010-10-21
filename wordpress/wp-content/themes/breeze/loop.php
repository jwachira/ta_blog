<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 */
 
global $unisphere_options;
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post clearfix error404 not-found post-no-image">
    	<div class="post-content-wrapper">
			<h2 class="post-title"><?php _e( 'Not Found', 'unisphere' ); ?></h2>
			<div class="post-text">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'unisphere' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php
	/* 
	 * Start the Loop.
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php if( $unisphere_options['show_blog_full'] != '1') : // User has not checked the option to display full posts in the blog, so use the excerpt template... ?>
    
		<div id="post-<?php the_ID(); ?>" class="post-excerpt clearfix <?php semantic_entries(); ?><?php if( unisphere_get_post_image("blog") == '' ) echo ' post-no-image'; ?>">
		
			<div class="post-image">    
			
				<a href="<?php the_permalink(); ?>"><?php echo unisphere_get_post_image("blog"); ?></a>  
						  
			<?php if( 'open' == $post->comment_status ) : ?>
				<?php comments_popup_link( __( 'Leave a comment', 'unisphere' ), __( '1 Comment', 'unisphere' ), __( '% Comments', 'unisphere' ), 'comment-count button-unselected rounded-all' ); ?>
			<?php endif; ?>
					
				<a href="<?php the_permalink(); ?>" class="more-link button rounded-all"><?php _e( 'Read more &raquo;', 'unisphere' ); ?></a>
				
			</div>
			
			<div class="post-content-wrapper">
	
				<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				
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
					<?php the_excerpt(); ?>   
				</div>
	
			</div>
			
		</div>
        
	<?php else : // User wants to display full post content ?>
    
    	<!--BEGIN .post-detail-->
        <div id="post-<?php the_ID(); ?>" class="post-full clearfix <?php semantic_entries(); ?><?php if( unisphere_get_post_image("blog-detail") == '' ) echo ' post-no-image'; ?>">
        
            <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            
            <div class="post-image">
                <a href="<?php the_permalink(); ?>"><?php echo unisphere_get_post_image("blog-detail"); ?></a>
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
                <?php wp_link_pages('before=<div class="wp-pagenavi post_linkpages">&after=</div><br />&link_before=<span>&link_after=</span>'); ?>
                <?php if( 'open' == $post->comment_status ) : ?>
					<?php comments_popup_link( __( 'Leave a comment', 'unisphere' ), __( '1 Comment', 'unisphere' ), __( '% Comments', 'unisphere' ), 'comment-count button-unselected rounded-all' ); ?>
                <?php endif; ?>
            </div>

        <!--END .post-detail-->
        </div>
	<?php endif; ?>
    
    <div class="hr"><hr /></div>

    <?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php
 // Show the pagination from navigation.php
 get_template_part( 'navigation' );
?>