<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

include_once( CRB_THEME_DIR . 'options' . DIRECTORY_SEPARATOR . 'location-sections.php' );
include_once( CRB_THEME_DIR . 'options' . DIRECTORY_SEPARATOR . 'global-sections.php' );
include_once( CRB_THEME_DIR . 'options' . DIRECTORY_SEPARATOR . 'get-started-sections.php' );

Container::make( 'post_meta', __( 'Member Details', 'crb' ) )
	->where( 'post_type', '=', 'crb_team' )
	->add_fields( array(
		Field::make( 'checkbox', 'crb_link_disabled', __( 'Disable Page Link in the Listing Sections', 'crb' ) ),
		Field::make( 'text', 'crb_position', __( 'Position', 'crb' ) )
			->set_width( 30 ),
		Field::make( 'text', 'crb_avvo_rating', __( 'AVVO Rating', 'crb' ) )
			->set_width( 20 )
			->set_attribute( 'type', 'number' )
			->set_attribute( 'min', 0 )
			->set_attribute( 'max', 100 )
			->set_attribute( 'step', '.01' ),
		Field::make( 'text', 'crb_litigation_percentage', __( 'Litigation Percentage', 'crb' ) )
			->set_width( 20 )
			->set_attribute( 'type', 'number' )
			->set_attribute( 'min', 0 )
			->set_attribute( 'max', 100 )
			->set_attribute( 'step', '.01' ),
		Field::make( 'select', 'crb_location', __( 'Location', 'crb' ) )
			->set_width( 30 )
			->set_options( crb_get_posts_array( 'crb_location' ) ),
		Field::make( 'text', 'crb_green_areas_of_practice', __( 'Areas of Practice (Green)', 'crb' ) )
			->set_width( 80 ),
		Field::make( 'text', 'crb_green_aop_percentage', __( 'Percentage', 'crb' ) )
			->set_width( 20 )
			->set_attribute( 'type', 'number' )
			->set_attribute( 'min', 0 )
			->set_attribute( 'max', 100 )
			->set_attribute( 'step', '.01' ),
		Field::make( 'text', 'crb_black_areas_of_practice', __( 'Areas of Practice (Black)', 'crb' ) ),
		Field::make( 'complex', 'crb_details', __( 'Detail Lists', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Detail List', 'crb' ),
				'plural_name'   => __( 'Detail Lists', 'crb' ),
			) )
			->add_fields( array(
				Field::make( 'text', 'list_title', __( 'List Title', 'crb' ) ),
				Field::make( 'complex', 'items', __( 'List Items', 'crb' ) )
					->set_layout( 'tabbed-vertical' )

					->setup_labels( array(
						'singular_name' => __( 'List Item', 'crb' ),
						'plural_name'   => __( 'List Items', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'text', __( 'Text', 'crb' ) )

					) )
					->set_header_template( '<%- text %>' )
			) )
			->set_header_template( '<%- list_title %>' )
	) );





Container::make( 'post_meta' , __( 'Assistant Details', 'crb') )
	->where( 'post_type', '=', 'crb_team')
	->add_fields( array(
		Field::make( 'image', 'crb_assistant_img', __( 'Image', 'crb' ) )

			->help_text( __( 'The recommended image size is 402px x 492px. For retina displays, you should use double values.', 'crb' ) ),
		Field::make( 'text', 'crb_assistant_name', __('Name', 'crb') )
			->set_width(50),
		Field::make( 'text', 'crb_assistant_position', __('Position', 'crb') )
			->set_width(50),
		Field::make( 'rich_text', 'crb_assistant_description', __('Description', 'crb') )
			->set_rows( 8 )
			->set_width(100),
	) );






Container::make( 'post_meta', __( 'Location Details', 'crb' ) )
	->where( 'post_type', '=', 'crb_location' )
	->add_tab( __( 'General Information', 'crb' ), array(
		Field::make( 'textarea', 'crb_address', __( 'Address', 'crb' ) )
			->set_rows( 4 )
			->set_width( 33 ),
		Field::make( 'text', 'crb_directions_link', __( 'Directions Link', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_phone', __( 'Phone', 'crb' ) )
			->set_width( 33 ),
	) )

	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'text', 'crb_intro_headline', __( 'Headline', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'textarea', 'crb_intro_subhead', __( 'Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 50 )
			->help_text( __( 'You can surround some of the text with asterisks to make it thicker', 'crb' ) ),
		Field::make( 'textarea', 'crb_intro_content', __( 'Content', 'crb' ) )
	) )

	->add_tab( __( 'Sections', 'crb' ), crb_get_location_sections() );

Container::make( 'post_meta', __( 'Article Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_help_center' )
	->set_context( 'side' )

	->add_fields( array(
		Field::make( 'image', 'crb_listing_img', __( 'Listing Image', 'crb' ) )
			->set_required( true )
			->help_text( __( 'The recommended image size is 402px x 492px. For retina displays, you should use double values.', 'crb' ) ),
	) );

Container::make( 'post_meta', __( 'Team Template Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/the-team.php' )

	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'textarea', 'crb_intro_headline', __( 'Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_intro_subhead', __( 'Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_intro_content', __( 'Content', 'crb' ) )
			->set_width( 40 ),
	) );

Container::make( 'post_meta', __( 'Related Articles', 'crb' ) )
	->where( 'post_type', '=', 'crb_help_center' )
	->add_fields( array(
		Field::make( 'checkbox', 'crb_checkbox_related_articles', __( 'Check to hide Related Articles', 'crb' ) ),
	) );

Container::make( 'post_meta', __( 'CTA', 'crb' ) )
	->where( 'post_type', '=', 'crb_help_center' )

	->add_fields( array(
		Field::make( 'checkbox', 'crb_overwrite_cta', __( 'Overwrite CTA Details for this Article', 'crb' ) ),
		Field::make( 'text', 'crb_cta_headline', __( 'Headline', 'crb' ) )
			->set_width( 50 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_cta_subhead', __( 'Subhead', 'crb' ) )
			->set_width( 50 )
			->set_default_value( __( 'How can we help?', 'crb' ) )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'textarea', 'crb_cta_content', __( 'Content', 'crb' ) )
			->set_rows( 2 )
			->set_width( 50 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_cta_phone', __( 'Phone', 'crb' ) )
			->set_width( 50 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'association', 'crb_cta_locations', __( 'Locations', 'crb' ) )
			->set_width( 50 )
			->set_types(array(
				array(
					'type'      => 'post',
					'post_type' => 'crb_location',
				),
			) )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'association', 'crb_cta_members', __( 'Members', 'crb' ) )
			->set_width( 50 )
			->set_required( true )
			->help_text( __( 'If you leave this field blank, the section will not be displayed.', 'crb' ) )
			->set_types(array(
				array(
					'type'      => 'post',
					'post_type' => 'crb_team',
				),
			) )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_cta_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 20 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_cta_btn_url', __( 'Button URL', 'crb' ) )
			->set_width( 60 )
			->set_conditional_logic( array(
					array(
						'field'   => 'crb_overwrite_cta',
						'value'   => true,
						'compare' => '=',
					)
				) ),
		Field::make( 'select', 'crb_cta_btn_target', __( 'Open link in', 'crb' ) )
			->set_width( 20 )
			->add_options( $link_targets )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_overwrite_cta',
					'value'   => true,
					'compare' => '=',
				)
			) ),
	) );

Container::make( 'post_meta', __( 'Page Builder Template Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/page-builder.php' )

	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'checkbox', 'crb_show_intro', __( 'Show', 'crb' ) ),
		Field::make( 'image', 'crb_intro_image', __( 'Image', 'crb' ) )
			->set_width( 25 )
			->set_required( true )
			->help_text( __( 'The recommended image size is 740px x 870px. For retina displays, you should use double values.', 'crb' ) )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_intro_first_headline', __( 'First Headline', 'crb' ) )
			->set_width( 25 )
			->set_required( true )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'textarea', 'crb_intro_second_headline', __( 'Second Headline', 'crb' ) )
			->set_rows( 5 )
			->set_width( 25 )
			->set_required( true )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_intro_subhead', __( 'Subhead', 'crb' ) )
			->set_width( 25 )
			->set_required( true )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'textarea', 'crb_intro_content', __( 'Bottom Content', 'crb' ) )
			->set_width( 30 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_intro_left_text', __( 'Left Text (Vertical)', 'crb' ) )
			->set_width( 25 )
			->set_required( true )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_intro_right_text', __( 'Right Text (Vertical)', 'crb' ) )
			->set_width( 25 )
			->set_required( true )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_intro_scroll_label', __( 'Scroll Label', 'crb' ) )
			->set_width( 20 )
			->set_required( true )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_intro',
					'value'   => true,
					'compare' => '=',
				)
			) ),
	) )

	->add_tab( __( 'Sections', 'crb' ), crb_get_global_sections() );

Container::make( 'post_meta', __( 'Help Center Template Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/help-center.php' )

	->add_fields( array(
		Field::make( 'text', 'crb_search_placeholder', __( 'Search Field Placeholder Text', 'crb' ) )
			->set_width( 50 )
			->set_required( true ),
		Field::make( 'text', 'crb_no_results_text', __( 'No Results Text', 'crb' ) )
			->set_width( 50 )
			->set_required( true ),
	) );

Container::make( 'post_meta', __( 'Practice Area Details', 'crb' ) )
	->where( 'post_type', '=', 'crb_area' )

	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'image', 'crb_intro_image', __( 'Image', 'crb' ) )
			->set_width( 20 )
			->set_required( true )
			->help_text( __( 'The recommended image width is up to 1290px.', 'crb' ) ),
		Field::make( 'textarea', 'crb_intro_headline', __( 'Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 40 ),
		Field::make( 'textarea', 'crb_intro_subhead', __( 'Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 40 )
			->help_text( __( 'You can surround some of the text with asterisks to make it thicker', 'crb' ) ),
		Field::make( 'rich_text', 'crb_intro_content', __( 'Content', 'crb' ) )
			->set_required( true )
			->set_settings( crb_get_rich_text_simple_options( true ) ),
		Field::make( 'text', 'crb_intro_side_text', __( 'Side Text', 'crb' ) )
	) )

	->add_tab( __( 'Cards (Repeater)', 'crb' ), array(
		Field::make( 'complex', 'crb_cards', __( 'Entries', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Entry', 'crb' ),
				'plural_name'   => __( 'Entries', 'crb' ),
			) )
			->add_fields( array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 20 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 450px x 583px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 30 ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) )
					->set_width( 50 )
					->set_required( true ),
			) )
			->set_header_template( '<%- headline %>' )
	) )

	->add_tab( __( 'Sections', 'crb' ), crb_get_global_sections() );

Container::make( 'post_meta', __( 'Get Started Template Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/get-started.php' )

	->add_fields( crb_get_started_sections() );

Container::make( 'post_meta', __( 'Callout Settings', 'crb' ) )
	->where( 'post_type', 'IN', array( 'page', 'crb_area' ) )
	->where( 'post_template', 'NOT IN', array(
		'templates/ppc.php',
		'templates/ppc-v2.php',
	) )

	->add_fields( array(
		Field::make( 'checkbox', 'crb_show_callout', __( 'Show', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'checkbox', 'crb_cta_small_paddings', __( 'Small Paddings', 'crb' ) )
			->set_width( 33 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'select', 'crb_cta_bg_color', __( 'Background Color', 'crb' ) )
			->set_width( 33 )
			->set_options( crb_get_section_bg_color_options() )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'textarea', 'crb_cta_first_headline', __( 'First Headline', 'crb' ) )
			->set_rows( 4 )
			->set_width( 33 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'textarea', 'crb_cta_second_headline', __( 'Second Headline', 'crb' ) )
			->set_rows( 4 )
			->set_width( 33 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'textarea', 'crb_cta_small_text', __( 'Small Text', 'crb' ) )
			->set_rows( 4 )
			->set_width( 33 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_cta_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 20 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_cta_btn_url', __( 'Button URL', 'crb' ) )
			->set_width( 60 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
		Field::make( 'select', 'crb_cta_btn_target', __( 'Open link in', 'crb' ) )
			->set_width( 20 )
			->add_options( $link_targets )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_show_callout',
					'value'   => true,
					'compare' => '=',
				)
			) ),
	) );

	Container::make( 'post_meta', __( 'Email Signature Details', 'crb' ) )
		->where( 'post_type', '=', 'crb_email' )

		->add_tab( __( 'Description', 'crb' ), array(
			Field::make( 'image', 'crb_email_image', __( 'Your Image', 'crb' ) )
				->set_width( 50 )
				->help_text( __( 'The recommended image width is up 500px.', 'crb' ) ),
			Field::make( 'text', 'crb_email_pronoun', __( 'Your Pronoun', 'crb' ) )
				->set_width( 50 ),
			Field::make( 'text', 'crb_email_firstname', __( 'Your First Name', 'crb' ) )
				->set_width( 20 ),
			Field::make( 'text', 'crb_email_lastname', __( 'Your Last Name', 'crb' ) )
				->set_width( 20 ),
			Field::make( 'text', 'crb_email_position', __( 'Your Position', 'crb' ) )
				->set_width( 20 ),
			Field::make( 'text', 'crb_email_address', __( 'Your Address', 'crb' ) )
				->set_width( 20 )
				->help_text( __( 'Example: 2760 29th Street', 'crb' ) ),
			Field::make( 'text', 'crb_email_cityzip', __( 'Your City, State and Zipcode', 'crb' ) )
				->set_width( 20 )
				->help_text( __( 'Example: Boulder, Colorado 80301', 'crb' ) ),
				Field::make( 'text', 'crb_email_office', __( 'Your Office Number', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'crb_email_fax', __( 'Your Fax Number', 'crb' ) )
					->set_width( 50 ),
		) );

Container::make( 'post_meta', __( 'SEO Template Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/seo-page.php' )

	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'textarea', 'crb_intro_headline', __( 'Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_intro_subhead', __( 'Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'image', 'crb_intro_image', __( 'Image', 'crb' ) )
			->set_width( 40 )
			->set_required( true )
			->help_text( __( 'The recommended image size is 793px x 642px. For retina displays, you should use double values.', 'crb' ) ),
		Field::make( 'text', 'crb_intro_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'text', 'crb_intro_btn_url', __( 'Button URL', 'crb' ) )
			->set_width( 40 ),
		Field::make( 'checkbox', 'crb_intro_btn_icon', __( 'Show Play Icon', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'select', 'crb_intro_btn_target', __( 'Open link in', 'crb' ) )
			->set_width( 20 )
			->add_options( $link_targets ),
		Field::make( 'textarea', 'crb_intro_form_headline', __( 'Form Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_intro_form_subhead', __( 'Form Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'gravity_form', 'crb_intro_form', __( 'Select a Form', 'crb' ) )
			->set_width( 40 ),
		Field::make( 'textarea', 'crb_intro_form_bottom_headline', __( 'Form Bottom Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 40 ),
		Field::make( 'rich_text', 'crb_intro_form_bottom_content', __( 'Form Bottom Content', 'crb' ) )
			->set_width( 60 )
			->set_settings( crb_get_rich_text_simple_options( true ) ),
	) )

	->add_tab( __( 'Content', 'crb' ), array(
		Field::make( 'complex', 'crb_content', '' )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Item', 'crb' ),
				'plural_name'   => __( 'Items', 'crb' ),
			) )
			->add_fields( array(
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'checkbox', 'side_testimonial', __( 'Side Testimonial', 'crb' ) ),
				Field::make( 'text', 'author', __( 'Author', 'crb' ) )
					->set_width( 40 )
					->set_conditional_logic( array(
						array(
							'field'   => 'side_testimonial',
							'value'   => true,
							'compare' => '=',
						)
					) ),
				Field::make( 'select', 'practice_area', __( 'Practice Area', 'crb' ) )
					->set_width( 30 )
				    ->set_options( crb_get_practice_areas_arr() )
				    ->set_conditional_logic( array(
				    	array(
							'field'   => 'side_testimonial',
							'value'   => true,
							'compare' => '=',
				    	)
				    ) ),
				Field::make( 'select', 'raiting', __( 'Raiting', 'crb' ) )
					->set_width( 30 )
				    ->set_options( array(
				        5 => 5,
				        4 => 4,
				        3 => 3,
				        2 => 2,
				        1 => 1,
				    ) )
				    ->set_conditional_logic( array(
				    	array(
							'field'   => 'side_testimonial',
							'value'   => true,
							'compare' => '=',
				    	)
				    ) ),
				Field::make( 'textarea', 'quote', __( 'Quote', 'crb' ) )
					->set_required( true )
					->set_conditional_logic( array(
						array(
							'field'   => 'side_testimonial',
							'value'   => true,
							'compare' => '=',
						)
					) ),
			) )
	) );

Container::make( 'post_meta', __( 'PPC v1 Template Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/ppc.php' )

	->add_tab( __( 'Header/Footer', 'crb' ), array(
		Field::make( 'text', 'crb_hf_headline', __( 'Address Headline', 'crb' ) )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_hf_address', __( 'Address', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'text', 'crb_hf_phone', __( 'Phone', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'text', 'crb_hf_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'text', 'crb_footer_text', __( 'Footer Text', 'crb' ) )
	) )

	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'image', 'crb_intro_image', __( 'Background Image', 'crb' ) )
			->set_width( 30 )
			->help_text( __( 'The recommended image size is 793px x 642px. For retina displays, you should use double values.', 'crb' ) ),
		Field::make( 'textarea', 'crb_intro_headline', __( 'Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 20 )
			->set_required( true ),
		Field::make( 'textarea', 'crb_intro_subhead', __( 'Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 20 ),
		Field::make( 'textarea', 'crb_intro_content', __( 'Content', 'crb' ) )
			->set_rows( 4 )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_intro_form_headline', __( 'Form Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 )
			->set_required( true ),
		Field::make( 'textarea', 'crb_intro_form_subhead', __( 'Form Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 40 ),
		Field::make( 'gravity_form', 'crb_intro_form', __( 'Select a Form', 'crb' ) )
			->set_width( 30 )
			->set_required( true ),
	) )

	->add_tab( __( 'Content', 'crb' ), array(
		Field::make( 'complex', 'crb_ppc_sections', __( 'Sections', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Section', 'crb' ),
				'plural_name'   => __( 'Sections', 'crb' ),
			) )

			// Content With Statistics
			->add_fields( 'content_with_statistics', __( 'Content with Statistics', 'crb' ), array(
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 20 ),
				Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'complex', 'list_items', __( 'List Items', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'List Item', 'crb' ),
						'plural_name'   => __( 'List Items', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'textarea', 'text', __( 'Text', 'crb' ) )
							->set_rows( 4 )
							->set_required( true )
					) ),
				Field::make( 'textarea', 'statistics_headline', __( 'Statistics Headline', 'crb' ) )
					->set_rows( 2 ),
				Field::make( 'complex', 'statistics', __( 'Statistics', 'crb' ) )
					->set_max( 4 )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Statistic', 'crb' ),
						'plural_name'   => __( 'Statistics', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'number', __( 'Number', 'crb' ) )
							->set_width( 30 )
							->set_required( true )
							->set_attribute( 'type', 'number' )
							->set_attribute( 'step', '.01' ),
						Field::make( 'text', 'suffix', __( 'Number Suffix', 'crb' ) )
							->set_width( 20 )
							->set_attribute( 'maxLength', 2 ),
						Field::make( 'text', 'label', __( 'Label', 'crb' ) )
							->set_width( 50 )
							->set_required( true )
					) )
					->set_header_template( '<%- label %>' )
			) )

			->add_fields( 'video_image', __( 'Video/Image', 'crb' ), array(
				Field::make( 'select', 'media_type', __( 'Media Type', 'crb' ) )
				    ->set_options( array(
				        'image' => __( 'Image', 'crb' ),
				        'video' => __( 'Video', 'crb' ),
				    ) ),
				Field::make( 'image', 'bg_image', __( 'Image', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 1140px x 641px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 70 ),
				Field::make( 'text', 'video_url', __( 'YouTube/Vimeo URL', 'crb' ) )
					->set_width( 70 )
					->set_required( true )
					->set_conditional_logic( array(
						array(
							'field'   => 'media_type',
							'value'   => 'video',
							'compare' => '=',
						)
					) ),
				Field::make( 'text', 'btn_label', __( 'Play Button Label', 'crb' ) )
					->set_width( 30 )
					->set_conditional_logic( array(
						array(
							'field'   => 'media_type',
							'value'   => 'video',
							'compare' => '=',
						)
					) ),
			) )

			->add_fields( 'testimonials', __( 'Testimonials', 'crb' ), array(
				Field::make( 'complex', 'testimonials', '' )
					->set_required( true )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => __( 'Testimonial', 'crb' ),
						'plural_name'   => __( 'Testimonials', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'author', __( 'Author', 'crb' ) )
							->set_width( 40 ),
						Field::make( 'select', 'practice_area', __( 'Practice Area', 'crb' ) )
							->set_width( 30 )
						    ->set_options( crb_get_practice_areas_arr() ),
						Field::make( 'select', 'raiting', __( 'Raiting', 'crb' ) )
							->set_width( 30 )
						    ->set_options( array(
						        5 => 5,
						        4 => 4,
						        3 => 3,
						        2 => 2,
						        1 => 1,
						    ) ),
						Field::make( 'textarea', 'quote', __( 'Quote', 'crb' ) )
							->set_required( true ),
					) )
			) )

			->add_fields( 'image', __( 'Large Image', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image width is 1900px. For retina displays, you should use a double value.', 'crb' ) ),
				Field::make( 'textarea', 'first_headline', __( 'First Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 30 ),
				Field::make( 'textarea', 'second_headline', __( 'Second Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 30 ),
				Field::make( 'textarea', 'bottom_headline', __( 'Bottom Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 40 ),
				Field::make( 'textarea', 'bottom_content', __( 'Bottom Content', 'crb' ) )
					->set_rows( 3 )
					->set_width( 60 )
			) )
	) );

Container::make( 'post_meta', __( 'PPC v2 Template Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/ppc-v2.php' )

	->add_tab( __( 'Header/Footer', 'crb' ), array(
		Field::make( 'text', 'crb_hf_headline', __( 'Address Headline', 'crb' ) )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_hf_address', __( 'Address', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 ),
		Field::make( 'text', 'crb_hf_phone', __( 'Phone', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'text', 'crb_hf_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 20 ),
		Field::make( 'text', 'crb_footer_text', __( 'Footer Text', 'crb' ) )
	) )

	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'image', 'crb_intro_image', __( 'Background Image', 'crb' ) )
			->set_width( 30 )
			->help_text( __( 'The recommended image size is 793px x 642px. For retina displays, you should use double values.', 'crb' ) ),
		Field::make( 'textarea', 'crb_intro_headline', __( 'Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 35 ),
		Field::make( 'textarea', 'crb_intro_subhead', __( 'Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 35 ),
		Field::make( 'select', 'crb_intro_media_type', __( 'Content Media Type', 'crb' ) )
		    ->set_options( array(
		        'image' => __( 'Image', 'crb' ),
		        'video' => __( 'Video', 'crb' ),
		    ) ),
		Field::make( 'image', 'crb_intro_content_image', __( 'Content Image', 'crb' ) )
			->set_width( 30 )
			->set_required( true )
			->help_text( __( 'The recommended image size is 500px x 281px. For retina displays, you should use double values.', 'crb' ) ),
		Field::make( 'textarea', 'crb_intro_image_headline', __( 'Image/Video Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 70 ),
		Field::make( 'text', 'crb_intro_video_url', __( 'YouTube/Vimeo URL', 'crb' ) )
			->set_width( 70 )
			->set_required( true )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_intro_media_type',
					'value'   => 'video',
					'compare' => '=',
				)
			) ),
		Field::make( 'text', 'crb_intro_btn_label', __( 'Play Button Label', 'crb' ) )
			->set_width( 30 )
			->set_conditional_logic( array(
				array(
					'field'   => 'crb_intro_media_type',
					'value'   => 'video',
					'compare' => '=',
				)
			) ),
		Field::make( 'textarea', 'crb_intro_form_headline', __( 'Form Headline', 'crb' ) )
			->set_rows( 2 )
			->set_width( 30 )
			->set_required( true ),
		Field::make( 'textarea', 'crb_intro_form_subhead', __( 'Form Subhead', 'crb' ) )
			->set_rows( 2 )
			->set_width( 40 ),
		Field::make( 'gravity_form', 'crb_intro_form', __( 'Select a Form', 'crb' ) )
			->set_width( 30 )
			->set_required( true ),
	) )

	->add_tab( __( 'Content', 'crb' ), array(
		Field::make( 'complex', 'crb_ppc_2_sections', __( 'Sections', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Section', 'crb' ),
				'plural_name'   => __( 'Sections', 'crb' ),
			) )

			// Content With Statistics
			->add_fields( 'content_with_statistics', __( 'Content with Statistics', 'crb' ), array(
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'complex', 'list_items', __( 'List Items', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'List Item', 'crb' ),
						'plural_name'   => __( 'List Items', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'textarea', 'text', __( 'Text', 'crb' ) )
							->set_rows( 4 )
							->set_required( true )
					) ),
				Field::make( 'textarea', 'statistics_headline', __( 'Statistics Headline', 'crb' ) )
					->set_rows( 2 ),
				Field::make( 'complex', 'statistics', __( 'Statistics', 'crb' ) )
					->set_max( 4 )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Statistic', 'crb' ),
						'plural_name'   => __( 'Statistics', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'number', __( 'Number', 'crb' ) )
							->set_width( 30 )
							->set_required( true )
							->set_attribute( 'type', 'number' )
							->set_attribute( 'step', '.01' ),
						Field::make( 'text', 'suffix', __( 'Number Suffix', 'crb' ) )
							->set_width( 20 )
							->set_attribute( 'maxLength', 2 ),
						Field::make( 'text', 'label', __( 'Label', 'crb' ) )
							->set_width( 50 )
							->set_required( true )
					) )
					->set_header_template( '<%- label %>' )
			) )

			->add_fields( 'testimonials', __( 'Testimonials', 'crb' ), array(
				Field::make( 'complex', 'testimonials', '' )
					->set_required( true )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => __( 'Testimonial', 'crb' ),
						'plural_name'   => __( 'Testimonials', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'author', __( 'Author', 'crb' ) )
							->set_width( 40 ),
						Field::make( 'select', 'practice_area', __( 'Practice Area', 'crb' ) )
							->set_width( 30 )
						    ->set_options( crb_get_practice_areas_arr() ),
						Field::make( 'select', 'raiting', __( 'Raiting', 'crb' ) )
							->set_width( 30 )
						    ->set_options( array(
						        5 => 5,
						        4 => 4,
						        3 => 3,
						        2 => 2,
						        1 => 1,
						    ) ),
						Field::make( 'textarea', 'quote', __( 'Quote', 'crb' ) )
							->set_required( true ),
					) )
			) )

			->add_fields( 'image', __( 'Image', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image width is 1900px. For retina displays, you should use a double value.', 'crb' ) ),
				Field::make( 'textarea', 'first_headline', __( 'First Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 35 ),
				Field::make( 'textarea', 'second_headline', __( 'Second Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 35 ),
			) )
	) );
