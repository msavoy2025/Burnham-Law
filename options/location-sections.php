<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

function crb_get_location_sections() {
	$link_targets = array(
		'_self'  => __( 'The same window', 'crb' ),
		'_blank' => __( 'A new window', 'crb' ),
	);

	$sections = array(
		Field::make( 'complex', 'crb_location_sections', '' )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Section', 'crb' ),
				'plural_name'   => __( 'Sections', 'crb' ),
			) )

			// Background Image with Text Overlay
			->add_fields( 'background_image_with_text_overlay', __( 'Background Image with Text Overlay', 'crb' ), array(
				Field::make( 'image', 'bg_image', __( 'Background Image', 'crb' ) )
					->set_width( 20 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 1290px x 726px.', 'crb' ) ),
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 30 ),
				Field::make( 'textarea', 'subhead', __( 'Subhead', 'crb' ) )
					->set_rows( 2 )
					->set_width( 30 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
			) )

			// Text Slider with Vertical Side Texts
			->add_fields( 'text_slider_with_vertical_side_texts', __( 'Text Slider with Vertical Side Texts', 'crb' ), array(
				Field::make( 'text', 'top_text', __( 'Top Text', 'crb' ) )
					->set_width( 50 )
					->set_required( true )
					->help_text( __( 'You can surround some of the text with asterisks to make it thicker.', 'crb' ) ),
				Field::make( 'text', 'bottom_text', __( 'Bottom Text', 'crb' ) )
					->set_width( 50 )
					->set_required( true )
					->help_text( __( 'You can surround some of the text with asterisks to make it thicker.', 'crb' ) ),
				Field::make( 'complex', 'texts', __( 'Text Slides', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-horizontal')
					->setup_labels( array(
						'singular_name' => __( 'Slide', 'crb' ),
						'plural_name'   => __( 'Slides', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'text', __( 'Text', 'crb' ) )
							->set_required( true )
							->set_attribute( 'maxLength', 50 )
							->help_text( __( 'Max Characters: 50', 'crb' ) ),
					) )
					->set_header_template( '<%- text %>' ),
				Field::make( 'text', 'left_text', __( 'Left Text (Vertical)', 'crb' ) )
					->set_width( 40 )
					->set_attribute( 'maxLength', 60 )
					->help_text( __( 'Max Characters: 60', 'crb' ) ),
				Field::make( 'text', 'right_text', __( 'Right Text (Vertical)', 'crb' ) )
					->set_width( 40 )
					->set_attribute( 'maxLength', 60 )
					->help_text( __( 'Max Characters: 60', 'crb' ) ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
			) )

			// Slider
			->add_fields( 'slider', __( 'Slider', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'media_gallery', 'slides', __( 'Images', 'crb' ) )
					->set_required( true )
    				->set_type( array( 'image' ) )
    				->help_text( __( 'The recommended image size is 1290px x 668px.', 'crb' ) ),
			) )

			// Team
			->add_fields( 'location_team', __( 'Team', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 80 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'association', 'specialty', __( 'Select a Specialty', 'crb' ) )
					->set_max( 1 )
					->set_required( true )
					->set_types(array(
						array(
							'type'     => 'term',
							'taxonomy' => 'crb_specialty',
						),
					) )
					->help_text( __( 'The section automatically lists the team members associated with this location.', 'crb' ) ),
			) )

			// Testimonials
			->add_fields( 'testimonials', __( 'Testimonials', 'crb' ), array(
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 3 )
					->set_width( 40 ),
				Field::make( 'textarea', 'subhead', __( 'Subhead', 'crb' ) )
					->set_rows( 3 )
					->set_width( 40 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'complex', 'testimonials', __( 'Testimonials', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Testimonial', 'crb' ),
						'plural_name'   => __( 'Testimonials', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'person', __( 'Person', 'crb' ) )
							->set_width( 30 )
							->set_required( true ),
						Field::make( 'text', 'details', __( 'Details', 'crb' ) )
							->set_width( 70 ),
						Field::make( 'textarea', 'quote', __( 'Quote', 'crb' ) )
							->set_required( true ),
					) )
					->set_header_template( '<%- person %>' )
			) )

			// Form
			->add_fields( 'form', __( 'Form', 'crb' ), array(
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 40 ),
				Field::make( 'gravity_form', 'form_id', __( 'Select a Form', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					->set_width( 80 )
					->set_settings( crb_get_rich_text_simple_options() ),
				Field::make( 'textarea', 'left_text', __( 'Left Side Text', 'crb' ) )
					->set_rows( 2 )
					->set_width( 50 )
					->help_text( __( 'You can surround some of the text with asterisks to make it thicker.', 'crb' ) ),
				Field::make( 'textarea', 'right_text', __( 'Right Side Text', 'crb' ) )
					->set_rows( 2 )
					->set_width( 50 )
					->help_text( __( 'You can surround some of the text with asterisks to make it thicker.', 'crb' ) ),
				Field::make( 'text', 'left_side_phone', __( 'Left Side Phone', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'right_side_phone', __( 'Right Side Phone', 'crb' ) )
					->set_width( 50 )
			) )
	);

	return $sections;
}
