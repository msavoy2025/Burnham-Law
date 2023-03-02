<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

function crb_get_started_sections() {
	$link_targets = array(
		'_self'  => __( 'The same window', 'crb' ),
		'_blank' => __( 'A new window', 'crb' ),
	);

	$sections = array(
		Field::make( 'complex', 'crb_get_started_sections', '' )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Section', 'crb' ),
				'plural_name'   => __( 'Sections', 'crb' ),
			) )

			// Content in Rows
			->add_fields( 'content_in_rows', __( 'Content in Rows', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) ),
				Field::make( 'complex', 'rows', __( 'Rows', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Row', 'crb' ),
						'plural_name'   => __( 'Rows', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'side_label', __( 'Side Label', 'crb' ) )
							->set_required( true ),
						Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
							->set_width( 80 )
							->set_required( true )
							->set_settings( crb_get_rich_text_simple_options() ),
					) )
					->set_header_template( '<%- side_label %>' )
			) )

			// Image
			->add_fields( 'image', __( 'Image', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_required( true )
					->help_text( __( 'The recommended image width is 450px. For retina displays, you should use a double value.', 'crb' ) ),
			) )

			// Multiple Images
			->add_fields( 'multiple_images', __( 'Multiple Image Section', 'crb' ), array(
				Field::make( 'image', 'crb_image_one', __( 'Image One', 'crb' ) )
					->set_required( true ),
				Field::make( 'text', 'crb_name_one', __( 'Name', 'crb' ) )
					->set_required( true ),
				Field::make( 'text', 'crb_position_one', __( 'Position', 'crb' ) )
					->set_required( true ),
				Field::make( 'image', 'crb_image_two', __( 'Image Two', 'crb' ) )
					->set_required( true ),
					Field::make( 'text', 'crb_name_two', __( 'Name', 'crb' ) )
						->set_required( true ),
					Field::make( 'text', 'crb_position_two', __( 'Position', 'crb' ) )
						->set_required( true ),
				Field::make( 'image', 'crb_image_three', __( 'Image Three', 'crb' ) )
					->set_required( true ),
					Field::make( 'text', 'crb_name_three', __( 'Name', 'crb' ) )
						->set_required( true ),
					Field::make( 'text', 'crb_position_three', __( 'Position', 'crb' ) )
						->set_required( true ),
			) )

			// Form
			->add_fields( 'form', __( 'Form', 'crb' ), array(
				Field::make( 'gravity_form', 'form_id', __( 'Select a Form', 'crb' ) )
					->set_required( true )
			) )

	);

	return $sections;
}
