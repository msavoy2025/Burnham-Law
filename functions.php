<?php
define( 'CRB_THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );
//Testing Git Updates
# Enqueue JS and CSS assets on the front-end
add_action( 'wp_enqueue_scripts', 'crb_enqueue_assets' );
function crb_enqueue_assets() {
	$template_dir = get_template_directory_uri();

	# Enqueue Custom JS files
	wp_enqueue_script(
		'theme-js-bundle',
		$template_dir . crb_assets_bundle( 'js/bundle.js' ),
		array( 'jquery' ), // deps
		null, // version -- this is handled by the bundle manifest
		true // in footer
);

	# Enqueue Custom CSS files
	wp_enqueue_style(
		'theme-css-bundle',
		$template_dir . crb_assets_bundle( 'css/bundle.css' )
	);

	# The theme style.css file may contain overrides for the bundled styles
	crb_enqueue_style( 'theme-styles', $template_dir . '/style.css' );

	# Enqueue Comments JS file
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

# Enqueue JS and CSS assets on admin pages
add_action( 'admin_enqueue_scripts', 'crb_admin_enqueue_scripts' );
add_action( 'login_enqueue_scripts', 'crb_admin_enqueue_scripts' );
function crb_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue Scripts
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	crb_enqueue_script( 'magnific-popup-functions', $template_dir . '/resources/admin/magnific-popup/jquery.magnific-popup.js', array( 'jquery' ) );
    crb_enqueue_script( 'theme-admin-functions', $template_dir . '/resources/admin/js/admin-functions.js', array( 'jquery' ) );

	# Enqueue Styles
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	crb_enqueue_style( 'admin-styles', $template_dir . '/resources/admin/admin-styles.css' );
	crb_enqueue_style( 'magnific-popup-styles', $template_dir . '/resources/admin/magnific-popup/magnific-popup.css' );

	# Editor Styles
	# add_editor_style( 'css/custom-editor-style.css' );
}

add_action( 'login_enqueue_scripts', 'crb_login_enqueue' );
function crb_login_enqueue() {
  crb_enqueue_style( 'theme-login-styles', get_template_directory_uri() . '/scss/login-style.scss' );
}

# Attach Custom Post Types and Custom Taxonomies
add_action( 'init', 'crb_attach_post_types_and_taxonomies', 0 );
function crb_attach_post_types_and_taxonomies() {
  # Attach Custom Post Types
	include_once( CRB_THEME_DIR . 'options/post-types.php' );

  # Attach Custom Taxonomies
	include_once( CRB_THEME_DIR . 'options/taxonomies.php' );
}

add_action( 'after_setup_theme', 'crb_setup_theme' );

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'crb_setup_theme' ) ) {
	function crb_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Autoload dependencies
		$autoload_dir = CRB_THEME_DIR . 'vendor/autoload.php';
		if ( ! is_readable( $autoload_dir ) ) {
			wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'crb' ) );
		}
		include_once( $autoload_dir );
		\Carbon_Fields\Carbon_Fields::boot();

		# Additional libraries and includes
		include_once( CRB_THEME_DIR . 'includes/admin-login.php' );
		include_once( CRB_THEME_DIR . 'includes/utils.php' );
		include_once( CRB_THEME_DIR . 'includes/hooks.php' );
		include_once( CRB_THEME_DIR . 'includes/blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/boot-blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/comments.php' );
		include_once( CRB_THEME_DIR . 'includes/title.php' );
		include_once( CRB_THEME_DIR . 'includes/gravity-forms.php' );

		# Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'gallery' ) );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations
		register_nav_menus( array(
		  'footer-menu' => __( 'Footer Menu', 'crb' ),
		) );

		# Attach custom widgets
		include_once( CRB_THEME_DIR . 'options/widgets.php' );

		# Attach custom shortcodes
		include_once( CRB_THEME_DIR . 'options/shortcodes.php' );

		# Add Actions
		add_action( 'widgets_init', 'crb_widgets_init' );
		add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

		# Add Filters
		add_filter( 'excerpt_more', 'crb_excerpt_more' );
		add_filter( 'excerpt_length', 'crb_excerpt_length', 999 );
		add_filter( 'crb_theme_favicon_uri', function() {
			return get_template_directory_uri() . '/dist/images/favicon.ico';
		} );
		add_filter( 'carbon_fields_map_field_api_key', 'crb_get_google_maps_api_key' );

		# Image sizes
		add_image_size( 'crb_fullwidth', 1900, 0, false );
		add_image_size( 'crb_fullwidth@2x', 3800, 0, false );
		add_image_size( 'crb_content_fullwidth', 1290, 0, false );
		add_image_size( 'crb_member_medium', 732, 1180, true );
		add_image_size( 'crb_member_large', 1020, 0, false );
		add_image_size( 'crb_slider_img', 1290, 668, true );
		add_image_size( 'crb_help_center_img', 1290, 731, true );
		add_image_size( 'crb_img_with_overlay', 900, 1065, true );
		add_image_size( 'crb_callout_img', 1750, 828, true );
		add_image_size( 'crb_callout_img2', 1474, 1200, true );
		add_image_size( 'crb_article', 1160, 836, true );
		add_image_size( 'crb_icon_small', 50, 0, false );
		add_image_size( 'crb_logo', 276, 276, true );
		add_image_size( 'crb_logo2', 680, 0, false );
		add_image_size( 'crb_author_img', 280, 280, true );
		add_image_size( 'crb_hp_listing_img', 402, 492, true );
		add_image_size( 'crb_narrow_img', 900, 0, false );
		add_image_size( 'crb_intro_img', 1480, 1740, true );
		add_image_size( 'crb_box_img', 604, 936, true );
		add_image_size( 'crb_post_img', 780, 488, true );
		add_image_size( 'crb_post_large_img', 1772, 1148, true );
		add_image_size( 'crb_person', 645, 600, true );
		add_image_size( 'crb_person@2x', 1290, 1200, true );
		add_image_size( 'crb_content_img', 1140, 707, true );
		add_image_size( 'crb_content_img@2x', 2280, 1414, true );
		add_image_size( 'crb_intro_img_2', 793, 642, true );
		add_image_size( 'crb_intro_img_2@2x', 1586, 1284, true );
		add_image_size( 'crb_intro_img_3', 1900, 660, true );
		add_image_size( 'crb_intro_img_3@2x', 3800, 1320, true );
		add_image_size( 'crb_video_img', 1290, 725, true );
		add_image_size( 'crb_video_img_2', 1140, 641, true );
		add_image_size( 'crb_video_img_2@2x', 2280, 1282, true );
		add_image_size( 'crb_video_img_3', 500, 281, true );
		add_image_size( 'crb_video_img_3@2x', 1000, 562, true );
	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	$sidebar_options = array_merge( crb_get_default_sidebar_options(), array(
		'name' => __( 'Default Sidebar', 'crb' ),
		'id'   => 'default-sidebar',
	) );

	register_sidebar( $sidebar_options );
}

# Sidebar Options
function crb_get_default_sidebar_options() {
	return array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	);
}

function crb_attach_theme_options() {
	# Attach fields
	include_once( CRB_THEME_DIR . 'options/theme-options.php' );
	include_once( CRB_THEME_DIR . 'options/post-meta.php' );
	include_once( CRB_THEME_DIR . 'options/user-meta.php' );
	include_once( CRB_THEME_DIR . 'options/term-meta.php' );
}

function crb_excerpt_more() {
	return '...';
}

function crb_excerpt_length() {
	return 55;
}

/**
 * Returns the Google Maps API Key set in Theme Options.
 *
 * @return string
 */
function crb_get_google_maps_api_key() {
	return carbon_get_theme_option( 'crb_google_maps_api_key' );
}

/**
 * Get the path to a versioned bundle relative to the theme directory.
 *
 * @param  string $path
 * @return string
 */
function crb_assets_bundle( $path ) {
	static $manifest = null;

	if ( is_null( $manifest ) ) {
		$manifest_path = CRB_THEME_DIR . 'dist/manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}
	}

	$path = isset( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

	return '/dist/' . $path;
}

/**
 * Sometimes, when using Gutenberg blocks the content output
 * contains empty unnecessary paragraph tags.
 *
 * In WP v5.2 this will be fixed, however, until then this function
 * acts as a temporary solution.
 *
 * @see https://core.trac.wordpress.org/ticket/45495
 *
 * @param  string $content
 * @return string
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'crb_fix_empty_paragraphs_in_blocks' );
function crb_fix_empty_paragraphs_in_blocks( $content ) {
	global $wp_version;

	if ( version_compare( $wp_version, '5.2', '<' ) && has_blocks() ) {
		return $content;
	}

	return wpautop( $content );
}

/* Script/CSS addons */
function style_scripts() {
    wp_enqueue_script('Burnham', get_theme_file_uri('/resources/js/burnham.js'), false, microtime(), false);
}
add_action( 'wp_enqueue_scripts', 'style_scripts' );


// gravity forms on submit
add_filter( 'gform_submit_button', 'add_onclick', 10, 2 );
function add_onclick( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $onclick = $input->getAttribute( 'onclick' );
    $onclick .= " addAdditionalAction('Additional Action');"; // Here's the JS function we're calling on click.
    $input->setAttribute( 'onclick', $onclick );
    return $dom->saveHtml( $input );
}
