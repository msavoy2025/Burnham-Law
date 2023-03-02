<?php
/**
 * Hide the WYSIWYG editor on templates.
 */
add_action( 'admin_init', 'crb_hide_wysiwyg_editor' );
function crb_hide_wysiwyg_editor() {
    if ( ! isset( $_GET['post'] ) ) {
        return;
    }

    $templates_with_hidden_wysiwyg_editor = array(
    	'templates/the-team.php',
    	'templates/page-builder.php',
    	'templates/help-center.php',
    	'templates/get-started.php',
    	'templates/seo-page.php',
    	'templates/ppc.php',
    	'templates/ppc-v2.php',
    );

    $page_template = get_post_meta( $_GET['post'], '_wp_page_template', true );

    if ( in_array( $page_template, $templates_with_hidden_wysiwyg_editor ) ) {
        remove_post_type_support( 'page', 'editor' );
    }
}

/**
 * Enable upload of svg files.
 *
 * @param  array $mimes Array of accepted file mimes.
 * @return array
 */
add_filter( 'upload_mimes', 'crb_filter_add_svg_support' );
function crb_filter_add_svg_support( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'crb_check_filetype', 10, 4 );
function crb_check_filetype( $data, $file, $filename, $mimes ) {
  $filetype = wp_check_filetype( $filename, $mimes );
  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];
}

/**
 * Fix svg preview in media
 */
function crb_fix_svg_preview_in_admin($response, $attachment, $meta){
    if( $response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists( 'SimpleXMLElement' ) ) {
        try {
            $path = get_attached_file( $attachment->ID );
            if( @file_exists( $path ) ) {
                $svg = new SimpleXMLElement(@file_get_contents($path));
                $src = $response['url'];
                $width = (int) $svg['width'];
                $height = (int) $svg['height'];

                //media gallery
                $response['image'] = compact( 'src', 'width', 'height' );
                $response['thumb'] = compact( 'src', 'width', 'height' );

                //media single
                $response['sizes']['full'] = array(
                    'height'        => $height,
                    'width'         => $width,
                    'url'           => $src,
                    'orientation'   => $height > $width ? 'portrait' : 'landscape',
                );
            }
        }
        catch( Exception $e ){}
    }

    return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'crb_fix_svg_preview_in_admin', 10, 3 );

/**
 * Fix svg insert in editor
 */
function crb_before_insert_image( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
  if ( strpos($html, '.svg') !== false ) {
    $url  = wp_get_attachment_url( $id );
    $html = '<img src="' . $url . '" alt="' . $alt . '" width="312" class="align' . $align . ' size-full wp-image-' . $id . '"  />';
  }
  return $html;
}
add_filter( 'image_send_to_editor', 'crb_before_insert_image', 10, 8 );

/**
 * Prevent svg images from crop
 */
add_filter( 'wp_get_attachment_image_src', function( $image, $id, $size ){
  if ( get_post_mime_type( $id ) === 'image/svg+xml' ) {
    return array( wp_get_attachment_url( $id ), 0, 0 );
  }

  return $image;
}, 3, 10 );

add_action( 'pre_get_posts', 'crb_exclude_resent_category_posts' );
function crb_exclude_resent_category_posts( $query ) {
	if ( is_admin() ) {
		return;
	}

	if ( ! $query->is_main_query() ) {
		return;
	}

	if ( ! $query->is_home() ) {
		return;
	}

	$featured_cats = carbon_get_theme_option( 'crb_blog_featured_categories' );
	$post_ids_to_exclude = array();

	foreach ( $featured_cats as $featured_cat ) {
		$recent_posts = wp_get_recent_posts( array(
			'post_type'      => 'post',
			'posts_per_page' => 2,
			'cat'            => $featured_cat['id'],
		) );

		if ( empty( $recent_posts ) ) {
			continue;
		}

		$post_ids_to_exclude = array_merge( $post_ids_to_exclude, array_column( $recent_posts, 'ID' ) );
	}

	$location = crb_request_param('location');
	if ( $location ) {
		$query->set( 'tax_query', array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $location
			)
		) );
	}

	$query->set( 'post__not_in', $post_ids_to_exclude );
}

// Send Get Started form data to CallRail
add_action( 'gform_after_submission', 'crb_send_form_data_to_callrail', 10, 2 );
function crb_send_form_data_to_callrail( $entry, $form ) {
	$gs_form_id = carbon_get_theme_option( 'crb_get_started_form' );

	if ( $gs_form_id != $form['id'] ) {
		return;
	}

	$account_id = carbon_get_theme_option( 'crb_callrail_acc_id' );
	$api_key    = carbon_get_theme_option( 'crb_callrail_api_key' );
	$company_id = carbon_get_theme_option( 'crb_callrail_company_id' );

	if ( ! $account_id || ! $api_key || ! $company_id ) {
		return;
	}

	$api_url   = 'https://api.callrail.com/v3/a/' . $account_id . '/form_submissions.json';

	$form_data = [
		'Name'             => $entry[1],
		'Email Address'    => $entry[3],
		'Phone Number'     => $entry[5],
		'May we call'      => $entry[12],
		'What\'s going on' => $entry[9],
	];

	$referrer 	  = isset( $_COOKIE['calltrk_referrer'] ) ? $_COOKIE['calltrk_referrer'] : get_bloginfo( 'name' );
	$landing_page = isset( $_COOKIE['calltrk_landing'] ) ? $_COOKIE['calltrk_landing'] : 'https://burnhamlaw.com/get-started/';

	$data = [
		'form_submission' => [
			'company_id'       => $company_id,
			'referrer'         => $referrer,
			'referring_url'    => $referrer,
			'landing_page_url' => $landing_page,
			'form_url'         => 'https://burnhamlaw.com/get-started/',
			'form_data'        => $form_data
		]
  	];

	$response = wp_remote_post( $api_url, array(
	    'body'    => json_encode( $data ),
	    'headers' => array(
			'Authorization' => 'Token token=' . $api_key,
			'Content-Type'  => 'application/json',
	    ),
	) );
}
