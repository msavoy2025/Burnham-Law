<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

$link_targets = array(
	'_self'  => __( 'The same window', 'crb' ),
	'_blank' => __( 'A new window', 'crb' ),
);

Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->set_page_file( 'crbn-theme-options.php' )

	->add_tab( __( 'Global', 'crb' ), array(
		Field::make( 'image', 'crb_post_fallback_img', __( 'Post Fallback Image', 'crb' ) )
			->set_width( 33 )
			->set_required( true )
			->help_text( __( 'The recommended image size is 1290px x 731px.', 'crb' ) ),
		Field::make( 'image', 'crb_hc_fallback_img', __( 'Help Center Fallback Image', 'crb' ) )
			->set_width( 33 )
			->set_required( true )
			->help_text( __( 'The recommended image size is 1290px x 731px.', 'crb' ) ),
		Field::make( 'image', 'crb_new_listing_img', __( 'Help Center Listing Image', 'crb' ) )
			->set_width( 33 )
			->set_required( true ),
		Field::make( 'gravity_form', 'crb_get_started_form', __( 'Get Started Form', 'crb' ) )
			->set_required( true ),
	) )

	->add_tab( __( 'Header', 'crb' ), array(
		Field::make( 'text', 'crb_header_bar_text', __( 'Bar Text', 'crb' ) )
			->set_width( 40 )
			->help_text( __( 'You can surround some of the text with asterisks to change its color to green.', 'crb' ) ),
		Field::make( 'text', 'crb_header_bar_url', __( 'Bar Link', 'crb' ) )
			->set_width( 40 ),
		Field::make( 'select', 'crb_header_bar_target', __( 'Open link in', 'crb' ) )
			->set_width( 20 )
			->add_options( $link_targets ),
		Field::make( 'textarea', 'crb_header_side_text', __( 'Side Text', 'crb' ) )
			->set_rows( 2 )
			->set_width( 20 ),
		Field::make( 'text', 'crb_header_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'text', 'crb_header_btn_url', __( 'Button URL', 'crb' ) )
			->set_width( 40 ),
		Field::make( 'select', 'crb_header_btn_target', __( 'Open link in', 'crb' ) )
			->set_width( 20 )
			->add_options( $link_targets ),
	) )

	->add_tab( __( 'Main Menu', 'crb' ), array(
		Field::make( 'complex', 'crb_menu_items', __( 'Menu Items', 'crb' ) )
			->set_max( 4 )
			->set_layout( 'tabbed-horizontal' )
			->setup_labels( array(
				'singular_name' => __( 'Menu Item', 'crb' ),
				'plural_name'   => __( 'Menu Items', 'crb' ),
			) )
			->add_fields( array(
				Field::make( 'text', 'top_level_label', __( 'Top Level Menu Item Label', 'crb' ) )
					->set_width( 20 )
					->set_required( true ),
				Field::make( 'text', 'top_level_url', __( 'URL', 'crb' ) )
					->set_width( 60 )
					->set_required( true )
					->set_conditional_logic( array(
						array(
							'field'   => 'second_level',
							'value'   => false,
							'compare' => '=',
						)
					) ),
				Field::make( 'select', 'top_level_target', __( 'Open link in', 'crb' ) )
					->set_width( 20 )
					->add_options( $link_targets )
					->set_conditional_logic( array(
						array(
							'field'   => 'second_level',
							'value'   => false,
							'compare' => '=',
						)
					) ),
				Field::make( 'checkbox', 'second_level', __( 'Second Level Menu Items', 'crb' ) ),
				Field::make( 'separator', 'second_level_sep', __( 'Second Level', 'crb' ) )
					->set_conditional_logic( array(
						array(
							'field'   => 'second_level',
							'value'   => true,
							'compare' => '=',
						)
					) ),
				Field::make( 'text', 'second_level_top_text', __( 'Top Text', 'crb' ) )
					->set_conditional_logic( array(
						array(
							'field'   => 'second_level',
							'value'   => true,
							'compare' => '=',
						)
					) ),
				Field::make( 'complex', 'second_level_items', __( 'Items (Boxes)', 'crb' ) )
					->set_max( 4 )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => __( 'Item', 'crb' ),
						'plural_name'   => __( 'Items', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'image', 'bg_image', __( 'Background Image', 'crb' ) )
							->set_width( 20 )
							->set_required( true )
							->help_text( __( 'The recommended image size is 1920px x 1057px.', 'crb' ) ),
						Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
							->set_rows( 2 )
							->set_width( 15 )
							->set_required( true ),
						Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
							->set_width( 15 ),
						Field::make( 'text', 'url', __( 'URL', 'crb' ) )
							->set_width( 30 )
							->set_required( true )
							->set_conditional_logic( array(
								array(
									'field'   => 'third_level',
									'value'   => false,
									'compare' => '=',
								)
							) ),
						Field::make( 'select', 'target', __( 'Open link in', 'crb' ) )
							->set_width( 20 )
							->add_options( $link_targets )
							->set_conditional_logic( array(
								array(
									'field'   => 'third_level',
									'value'   => false,
									'compare' => '=',
								)
							) ),
						Field::make( 'checkbox', 'third_level', __( 'Third Level Menu Items', 'crb' ) ),
						Field::make( 'textarea', 'box_content', __( 'Box Content', 'crb' ) )
							->set_rows( 10 )
							->set_width( 40 )
							->set_conditional_logic( array(
								array(
									'field'   => 'third_level',
									'value'   => false,
									'compare' => '=',
								)
							) ),
						Field::make( 'text', 'third_level_top_text', __( 'Third Level Items Top Text', 'crb' ) )
							->set_conditional_logic( array(
								array(
									'field'   => 'third_level',
									'value'   => true,
									'compare' => '=',
								)
							) ),
						Field::make( 'separator', 'third_level_sep', __( 'Third Level', 'crb' ) )
							->set_conditional_logic( array(
								array(
									'field'   => 'third_level',
									'value'   => true,
									'compare' => '=',
								)
							) ),
						Field::make( 'complex', 'third_level_items', __( 'Third Level Items', 'crb' ) )
							->set_layout( 'tabbed-vertical' )
							->setup_labels( array(
								'singular_name' => __( 'Item', 'crb' ),
								'plural_name'   => __( 'Items', 'crb' ),
							) )
							->add_fields( array(
								Field::make( 'text', 'label', __( 'Label', 'crb' ) )
									->set_width( 20 )
									->set_required( true ),
								Field::make( 'text', 'url', __( 'URL', 'crb' ) )
									->set_width( 60 )
									->set_required( true ),
								Field::make( 'select', 'target', __( 'Open link in', 'crb' ) )
									->set_width( 20 )
									->add_options( $link_targets ),
							) )
							->set_conditional_logic( array(
								array(
									'field'   => 'third_level',
									'value'   => true,
									'compare' => '=',
								)
							) )
							->set_header_template( '<%- label %>' ),

					) )
					->set_conditional_logic( array(
						array(
							'field'   => 'second_level',
							'value'   => true,
							'compare' => '=',
						)
					) )
					->set_header_template( '<%- headline %>' ),
			) )
			->set_header_template( '<%- top_level_label %>' )
	) )

	->add_tab( __( 'Footer', 'crb' ), array(
		Field::make( 'textarea', 'crb_footer_side_content', __( 'Side Content', 'crb' ) )
			->set_rows( 4 )
			->set_width( 25 ),
		Field::make( 'text', 'crb_footer_phone_number', __( 'Phone Number', 'crb' ) )
			->set_width( 25 ),
		Field::make( 'textarea', 'crb_footer_headline', __( 'Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 25 ),
		Field::make( 'association', 'crb_footer_locations', __( 'Select Locations', 'crb' ) )
			->set_width( 50 )
			->set_types(array(
				array(
					'type'      => 'post',
					'post_type' => 'crb_location',
				),
			) ),
		Field::make( 'text', 'crb_footer_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'text', 'crb_footer_btn_url', __( 'Button URL', 'crb' ) )
			->set_width( 60 ),
		Field::make( 'select', 'crb_footer_btn_target', __( 'Open link in', 'crb' ) )
			->set_width( 20 )
			->add_options( $link_targets ),
		Field::make( 'text', 'crb_footer_menu_headline', __( 'Menu Headline', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_footer_socials_headline', __( 'Socials Headline', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_footer_locations_headline', __( 'Locations Headline', 'crb' ) )
			->set_width( 33 ),
	) )

	->add_tab( __( 'Blog', 'crb' ), array(
		Field::make( 'rich_text', 'crb_blog_top_content', __( 'Top Content', 'crb' ) )
			->set_required( true )
			->set_settings( crb_get_rich_text_simple_options( true ) ),
		Field::make( 'association', 'crb_blog_featured_categories', __( 'Featured Categories', 'crb' ) )
			->set_max( 3 )
			->set_required( true )
			->set_types(array(
				array(
					'type'     => 'term',
					'taxonomy' => 'category',
				),
			) )
			->help_text( __( 'You should select three categories.', 'crb' ) ),
	) )

	->add_tab( __( 'Socials', 'crb' ), array(
		Field::make( 'complex', 'crb_socials', __( 'Links', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Link', 'crb' ),
				'plural_name'   => __( 'Links', 'crb' ),
			) )
			->add_fields( array(
				Field::make( 'text', 'name', __( 'Name', 'crb' ) )
					->set_width( 30 )
					->set_required( true ),
				Field::make( 'text', 'url', __( 'URL', 'crb' ) )
					->set_width( 70 )
					->set_required( true ),
			) )
			->set_header_template( '<%- name %>' )
	) )

	->add_tab( __( 'CallRail Credentials', 'crb' ), array(
		Field::make( 'text', 'crb_callrail_acc_id', __( 'Account ID', 'crb' ) )
			->set_width( 33 )
			->help_text( __( 'If the fields are empty or with invalid values, the Get Started form entries will not be saved in CallRail account.', 'crb' ) ),
		Field::make( 'text', 'crb_callrail_company_id', __( 'Company ID', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_callrail_api_key', __( 'API Key', 'crb' ) )
			->set_width( 33 ),
	) )

	->add_tab( __( 'Misc', 'crb' ), array(
		Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script', 'crb' ) ),
		Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script', 'crb' ) ),
	) );
