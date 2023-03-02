<?php
function crb_filter_phone_number( $number ) {
	return preg_replace( '~[^0-9]~', '', $number );
}

function crb_replace_underscores_with_hyphens( $string ) {
	return str_replace( '_', '-', $string );
}

function crb_sanitize_email_link( $email ) {
	return antispambot( sanitize_email( $email ) );
}

function crb_get_array_with_numeric_select_options( $from, $to, $skip_odds = false ) {
	$array = array();

	for ( $from; $from <= $to; $from++ ) {
		if ( $skip_odds && $from % 2 !== 0 ) {
			continue;
		}

		$array[ $from ] = $from;
	}

	return $array;
}

/**
*	Returns an array with filtered(up to 200) entries from a specific post type
*	@param string, post_type
*	@param array $get_posts_args Those will be passed to get_posts
*	@return array
*/
function crb_get_posts_array( $post_type = '', $get_posts_args = array(), $key_type = 'id', $empty_option = false ) {
	if ( ! $post_type ) {
		return array();
	}

	$posts = get_posts( array_merge( array(
		'posts_per_page' =>	200,
		'post_type'      =>	$post_type
	), $get_posts_args ) );

	$result = [];

	if ( $empty_option ) {
		$result[] = __( 'Please Select', 'crb' );
	}

	foreach ( $posts as $p ) {
		$arr_key = $key_type === 'id' ? $p->ID : $p->post_name ;
		$result[ $arr_key ] = $p->post_title;
	}

	return $result;
}

function crb_get_post_id_by_slug( $post_slug, $post_type ) {
	$the_post = get_page_by_path( $post_slug, '', $post_type );

	if ( is_null( $the_post ) || is_wp_error( $the_post ) ) {
		return '';
	}

	return $the_post->ID;
}

function crb_replace_asterisks_with_strong_tag( $text ) {
	return preg_replace( '~\*(.+)\*~', '<strong>$1</strong>', $text );
}

function crb_get_rich_text_simple_options( $headings_select = false ) {
	$fields_str = 'bold,italic,underline,bullist,numlist,link,unlink,copy,paste';

	if ( $headings_select ) {
		$fields_str = 'formatselect,' . $fields_str;
	}

	return array(
		'media_buttons' => false,
		'quicktags'     => true,
		'tinymce'       => array(
			'toolbar1' => $fields_str,
		),
	);
}

function crb_get_section_bg_color_options() {
	return array(
		'gray'  => __( 'Gray', 'crb' ),
		'white' => __( 'White', 'crb' ),
	);
}

function crb_get_video_provider( $video_url ) {
    if ( strpos( $video_url, 'youtube' ) > 0 ) {
        return 'youtube';
    }

    if ( strpos( $video_url, 'vimeo' ) > 0 ) {
        return 'vimeo';
    }

    return false;
}

function crb_get_post_excerpt( $post_id, $length = 20 ) {
	$post_obj = get_post( $post_id );

	if ( ! empty( $post_obj->post_excerpt ) ) {
		return esc_html( $post_obj->post_excerpt );
	}

	return esc_html( wp_trim_words( $post_obj->post_content, $length, '...' ) );
}

function crb_replace_spaces_with_hyphens( $string ) {
	return str_replace( ' ', '-', $string );
}

function crb_convert_string_to_id( $string ) {
	return crb_replace_spaces_with_hyphens( preg_replace( '/[^a-z0-9 ]/', '', strtolower( $string ) ) );
}

function crb_is_blog() {
	return ( ! is_front_page() && is_home() );
}

function crb_get_practice_areas_arr() {
	$arr[] = __( 'None', 'crb' );

	$practice_areas = get_terms( array(
		'taxonomy'   => 'crb_practice_area_cat',
		'hide_empty' => true,
	) );

	foreach ( $practice_areas as $practice_area ) {
		$arr[ $practice_area->term_id ] = esc_html( $practice_area->name );
	}

	return $arr;
}

function crb_replace_char_with( $value, $char, $tagname ) {
	$regex = '~' . preg_quote( $char ) . '(.+?)' . preg_quote( $char ) . '~';
	return nl2br( preg_replace( $regex, "<${tagname}>$1</${tagname}>", $value ) );
}
