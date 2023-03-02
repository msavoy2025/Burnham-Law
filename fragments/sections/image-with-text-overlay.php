<?php
$data = array(
	'image'      => $image,
	'bg_color'   => $bg_color,
	'top_text'   => $top_text,
	'headline'   => $headline,
	'left_text'  => $left_text,
	'right_text' => $right_text,
);

if ( $layout === 1 ) {
	$data['bottom_headline'] = $bottom_headline;
	$data['bottom_content'] = $bottom_content;
} else {
	$data['bottom_text'] = $bottom_text;
}

crb_render_fragment( 'sections/partials/image-with-text-overlay-' . $layout, array(
	'data' => $data
) );
