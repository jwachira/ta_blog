<?php
/**
 * Function to filter the [gallery] shortcode. Also eliminates css style rules added when using the [gallery] shortcode.
 */
function unisphere_gallery( $null, $attr = array( )) {
	global $post;
	if ( isset($attr['orderby']) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract( shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 5,
		'size'       => 'gallery',
		'exclude'    => '',
		'include'    => ''
	), $attr ) );

	$id           =  intval($id);
	$orderby      =  addslashes($orderby);
	$attachments  =  get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby, 'exclude' => $exclude, 'include' => $include) );

	if ( empty($attachments) )
		return NULL;

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $key => $value )
			$output .= wp_get_attachment_link( $key, $size, true, true ) . "\n";
		return $output;
	}

	$itemtag     =  tag_escape($itemtag);
	$captiontag  =  tag_escape($captiontag);
	$columns     =  intval($columns);
	$itemwidth   =  $columns > 0 ? floor(100/$columns) : 100;

	$output = apply_filters( 'gallery_style', (string) "\n" . '<div class="gallery gallery-row">', 9 ); // Available filter: gallery_style

	$count = 1;

	foreach ( $attachments as $id => $attachment ) {
		$img_lnk = wp_get_attachment_image_src($id, 'full');
		$img_lnk = $img_lnk[0];

		$img_src = wp_get_attachment_image_src( $id, $size );
		$img_src = $img_src[0];
		
		$img_alt = $attachment->post_excerpt;
		
		if ( $img_alt == null )
			$img_alt = $attachment->post_title;
			
		$img_rel = 'lightbox[' . $post->ID . ']';
		$img_class = apply_filters( 'gallery_img_class', (string) 'gallery-image rounded-all' ); // Available filter: gallery_img_class

		$output  .=  "\n\t" . '<' . $itemtag . ' class="gallery-item gallery-columns-' . $columns .' gallery-column-' . $count . '">';
		$output  .=  "\n\t\t" . '<' . $icontag . ' class="gallery-icon"><a href="' . $img_lnk . '" title="' . $img_alt . '" rel="' . $img_rel . '"><img src="' . $img_src . '" alt="' . $img_alt . '" class="' . $img_class . ' attachment-' . $size . '" /></a></' . $icontag . '>';

		/*if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "\n\t\t" . '<' . $captiontag . ' class="gallery-caption">' . $attachment->post_excerpt . '</' . $captiontag . '>';
		}*/

		$output .= "\n\t" . '</' . $itemtag . '>';
		if ( $columns > 0 && ++$i % $columns == 0 ) {
			$count = 0;
			$output .= "\n</div>\n" . '<div class="gallery gallery-row">';
		}
			
		$count++;
	}
	$output .= "\n</div>\n";

	return $output;
}
add_filter( 'post_gallery', 'unisphere_gallery', 10, 2 );
?>