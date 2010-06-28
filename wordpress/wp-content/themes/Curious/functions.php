<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Right Column',    
        'before_widget' => '<li id="%1$s" class="%2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="sidebartitle">',
        'after_title' => '</h2>',
    ));

// Search 	
	function widget_zone_out_search() {
?>	
<li class="list-search">
	  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</li>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_zone_out_search');
	
/* 
Plugin Name: Recent Posts 
Plugin URI: http://mtdewvirus.com/code/wordpress-plugins/ 
*/ 

function mdv_recent_comments($no_comments = 5, $comment_lenth = 7, $before = '<li>', $after = '</li>', $show_pass_post = false, $comment_style = 0) {
    global $wpdb;
    $request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, post_title FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID WHERE post_status IN ('publish','static') ";
	if(!$show_pass_post) $request .= "AND post_password ='' ";
	$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";
	$comments = $wpdb->get_results($request);
    $output = '';
	if ($comments) {
		foreach ($comments as $comment) {
			$comment_author = stripslashes($comment->comment_author);
			if ($comment_author == "")
				$comment_author = "anonymous"; 
			$comment_content = strip_tags($comment->comment_content);
			$comment_content = stripslashes($comment_content);
			$words=split(" ",$comment_content); 
			$comment_excerpt = join(" ",array_slice($words,0,$comment_lenth));
			$permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;

			if ($comment_style == 1) {
				$post_title = stripslashes($comment->post_title);
				
				$url = $comment->comment_author_url;

				if (empty($url))
					$output .= $before . $comment_author . ' on ' . $post_title . '.' . $after;
				else
					$output .= $before . "<a href='$url' rel='external'>$comment_author</a>" . ' on ' . $post_title . '.' . $after;
			}
			else {
				$output .= $before . '' . $comment_author . ':  <a href="' . $permalink;
				$output .= '" title="View the entire comment by ' . $comment_author.'">' . $comment_excerpt.'</a>' . $after;
			}
		}
		$output = convert_smilies($output);
	} else {
		$output .= $before . "None found" . $after;
	}
    echo $output;
}

//GsL98DGtpo0W
 