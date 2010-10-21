<?php
/**
 * The Sidebar containing the widget areas.
 */
?>

			<!--BEGIN #secondary-->
            <div id="secondary">
                
                <?php 	/* Contact Page Widgetized Area */
                    if ( is_page() && get_page_ID_by_page_template('template_contact.php') == $post->ID ) : ?>
                    
                        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Contact Page Sidebar') ) : ?>
                                        
                        <?php endif; ?>
                        
                <?php else : ?>
                
                    <?php 	/* Show current page sub-menu if it's a page and has cildren */				
                            if ( is_page()) : ?>
                            
                        <?php 	
                            $children = wp_list_pages("title_li=&child_of=".get_root_page($post->ID)."&echo=0"); 
                            if ( $children ) : ?>
                            
                        <!--BEGIN #widget-pages-->
                        <div id="widget-pages" class="widget">
                            <h3 class="widget-title"><?php echo get_page_name_by_ID(get_root_page($post->ID)); ?></h3>
                            <ul>
                                <?php wp_list_pages( 'title_li=&child_of=' . get_root_page($post->ID) ); ?>
                            </ul>
                        <!--END #widget-pages-->
                        </div>
                        
                        <?php endif; ?>
                        
                        <?php	/* This Unique Page Widgetized Area */
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('page_' . $post->ID) ) : ?>
                        
                        <?php endif; ?>
                        
                        <?php	/* Page's Widgetized Area */
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Page Sidebar') ) : ?>
                        
                        <?php endif; ?>
                        
                    <?php else : ?>
                        
                        <?php	/* Blog Widgetized Area */
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Blog Sidebar') ) : ?>
                        
                        <?php endif; ?>
                        
                    <?php endif; ?>
                    
                    
                    <?php	/* Shared (Blog/Page) Widgetized Area */
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Shared Sidebar') ) : ?>
                        
                    <?php endif; ?>
                    
                <?php endif; ?>	        	
                
            <!--END #secondary-->
            </div>