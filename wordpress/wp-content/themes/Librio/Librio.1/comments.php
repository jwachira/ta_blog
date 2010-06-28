<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>   
    <?php die('You can not access this page directly!'); ?>   
<?php endif; ?>


       
<?php if(!empty($post->post_password)) : ?>   
    <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>   
    <?php endif; ?>   
<?php endif; ?>


  
<?php if($comments) : ?>   
	<h3><?php comments_number('0 Comments', '1 Comment', '% Comments');?></h3>
	
    <div id="comments">
	
	    <?php foreach($comments as $comment) : ?>   
			<div class="comment <?php if ($comment->user_id == 1) echo "admincomment"; ?>"  id="comment-<?php comment_ID(); ?>">
				<div class="comment-info"><em><?php comment_author_link() ?></em> says: <span><?php comment_date('j F Y') ?> - <?php comment_time() ?></span></div>
				<?php echo get_avatar( get_comment_author_email(), $size = '50'); ?><?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>   
					<p class="notice">Your comment is awaiting moderation.</p>   
				<?php endif; ?>  		
			</div>
	    <?php endforeach; ?>   
		
    </div>
<?php endif; ?>  


  
<?php if(comments_open()) : ?>  
<div id="comment-form">
	<h3>Leave a comment</h3>
    <?php if(get_option('comment_registration') && !$user_ID) : ?>   
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>   
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">   	
            <textarea name="comment" id="comment"></textarea>
			<?php if($user_ID) : ?>  
                <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> [<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out</a>]</p>   				
			<?php else : ?>
				<p><input type="text" class="text" name="author" id="author" value="<?php echo $comment_author; ?>" /><label for="author">Name</label></p>
				<p><input type="text" class="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" /><label for="email">Email</label></p>
				<p><input type="text" class="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" /><label for="url">Site</label></p>
            <?php endif; ?>   
            <input type="submit" class="submit" name="submit" id="submit" value="Leave a comment" /> 
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /> 
            <?php do_action('comment_form', $post->ID); ?>   
        </form>   
    <?php endif; ?> 
</div>
<?php endif; ?>  
