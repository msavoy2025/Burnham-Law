<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

function crb_get_global_sections() {
	$link_targets = array(
		'_self'  => __( 'The same window', 'crb' ),
		'_blank' => __( 'A new window', 'crb' ),
	);

	$sections = array(
		Field::make( 'complex', 'crb_global_sections', '' )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => __( 'Section', 'crb' ),
				'plural_name'   => __( 'Sections', 'crb' ),
			) )

			// 4 Boxes
			->add_fields( 'boxes', __( '4 Boxes', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_required( true ),
				Field::make( 'complex', 'boxes', __( 'Boxes', 'crb' ) )
					->set_max( 4 )
					->set_required( true )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => __( 'Box', 'crb' ),
						'plural_name'   => __( 'Boxes', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Image', 'crb' ) )
							->set_width( 20 )
							->set_required( true )
							->help_text( __( 'The recommended image size is 302px x 468px. For retina displays, you should use double values.', 'crb' ) ),
						Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
							->set_rows( 2 )
							->set_width( 25 )
							->set_required( true ),
						Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
							->set_width( 25 ),
						Field::make( 'textarea', 'content', __( 'Content', 'crb' ) )
							->set_width( 30 ),
						Field::make( 'text', 'link_label', __( 'Link Label', 'crb' ) )
							->set_width( 20 ),
						Field::make( 'text', 'link_url', __( 'Link URL', 'crb' ) )
							->set_width( 60 ),
						Field::make( 'select', 'link_target', __( 'Open link in', 'crb' ) )
							->set_width( 20 )
							->add_options( $link_targets ),
					) )
			) )

			// Article
			->add_fields( 'article', __( 'Article', 'crb' ), array(
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 30 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 35 ),
				Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
					->set_width( 35 ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 580px x 418px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) )
					->set_width( 70 ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'text', 'btn_url', __( 'Button URL', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'select', 'btn_type', __( 'Type', 'crb' ) )
					->set_width( 20 )
					->add_options( array(
						'link'     => __( 'Link', 'crb' ),
						'download' => __( 'Download Link', 'crb' ),
					) ),
				Field::make( 'select', 'btn_target', __( 'Open link in', 'crb' ) )
					->set_width( 20 )
					->add_options( $link_targets )
					->set_conditional_logic( array(
						array(
							'field'   => 'btn_type',
							'value'   => 'link',
							'compare' => '=',
						)
					) ),
			) )

			// Content
			->add_fields( 'content', __( 'Content', 'crb' ), array(
				Field::make( 'html', 'section_preview_2' )
					->set_width( 30 )
					->set_html( sprintf( '<a href="%1$s" class="mfp-image"><img src="%1$s" width="300px" height="180px" /></a>', get_bloginfo('stylesheet_directory' ) . '/resources/images/previews/section-2.png' )  )
					->help_text( __( 'Section preview', 'crb' ) ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 3 )
					->set_width( 25 )
					->set_required( true ),
				Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
					->set_width( 25 ),
				Field::make( 'image', 'logo', __( 'Logo', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 138px x 138px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'text', 'logo_text', __( 'Logo Text', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'textarea', 'centered_content', __( 'Centered Content', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'left_word', __( 'Left Word', 'crb' ) )
					->set_width( 20 )
					->set_attribute( 'maxLength', 16 )
					->help_text( __( 'Max Characters: 16', 'crb' ) ),
				Field::make( 'text', 'middle_word', __( 'Middle Word', 'crb' ) )
					->set_width( 15 )
					->set_attribute( 'maxLength', 4 )
					->help_text( __( 'Max Characters: 4', 'crb' ) ),
				Field::make( 'text', 'right_word', __( 'Right Word', 'crb' ) )
					->set_width( 20 )
					->set_attribute( 'maxLength', 16 )
					->help_text( __( 'Max Characters: 16', 'crb' ) ),
				Field::make( 'textarea', 'bottom_content', __( 'Bottom Content', 'crb' ) )
					->set_width( 45 )
					->set_rows( 4 )
					->help_text( __( 'The content is automatically divided into two columns.', 'crb' ) ),
			) )

			// Content With Statistics
			->add_fields( 'content_with_statistics', __( 'Content with Statistics', 'crb' ), array(
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					->set_width( 80 )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'complex', 'statistics', __( 'Statistics', 'crb' ) )
					->set_max( 4 )
					->set_layout( 'tabbed-horizontal' )
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

			// Content in Two Columns
			->add_fields( 'content_in_two_columns', __( 'Content in Two Columns', 'crb' ), array(
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'rich_text', 'left_column', __( 'Left Column', 'crb' ) )
					->set_width( 50 )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'rich_text', 'right_column', __( 'Right Column', 'crb' ) )
					->set_width( 50 )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
			) )

			// Content and Numbers
			->add_fields( 'content-and-numbers', __( 'Content and Numbers', 'crb' ), array(
				Field::make( 'rich_text', 'top_content', __( 'Top Content', 'crb' ) )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'rich_text', 'bottom_content', __( 'Bottom Content', 'crb' ) )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'text', 'left_number', __( 'Left Number', 'crb' ) )
					->set_width( 35 )
					->set_required( true )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'max', 9999 )
					->help_text( __( 'Max Number: 9999', 'crb' ) ),
				Field::make( 'text', 'left_number_suffix', __( 'Left Number Suffix', 'crb' ) )
					->set_width( 15 )
					->set_attribute( 'maxLength', 1 )
					->help_text( __( 'Max Characters: 1', 'crb' ) ),
				Field::make( 'text', 'right_number', __( 'Right Number', 'crb' ) )
					->set_width( 35 )
					->set_required( true )
					->set_attribute( 'type', 'number' )
					->set_attribute( 'max', 9999 )
					->help_text( __( 'Max Number: 9999', 'crb' ) ),
				Field::make( 'text', 'right_number_suffix', __( 'Right Number Suffix', 'crb' ) )
					->set_width( 15 )
					->set_attribute( 'maxLength', 1 )
					->help_text( __( 'Max Characters: 1', 'crb' ) ),
				Field::make( 'text', 'left_text', __( 'Left Text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'right_text', __( 'Right Text', 'crb' ) )
					->set_width( 50 ),
			) )

			// Content in Three Columns
			->add_fields( 'content_in_three_columns', __( 'Content in Three Columns', 'crb' ), array(
				Field::make( 'text', 'middle_headline', __( 'Middle Headline', 'crb' ) )
					->set_width( 30 ),
				Field::make( 'textarea', 'middle_content', __( 'Middle Content', 'crb' ) )
					->set_rows( 4 )
					->set_width( 70 )
					->set_required( true ),
				Field::make( 'complex', 'left_rows', __( 'Left Rows', 'crb' ) )
					->set_width( 50 )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Row', 'crb' ),
						'plural_name'   => __( 'Rows', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'bold_text', __( 'Bold Text', 'crb' ) )
							->set_width( 50 )
							->set_required( true ),
						Field::make( 'text', 'text', __( 'Text', 'crb' ) )
							->set_width( 50 )
							->set_required( true )
					) )
					->set_header_template( '<%- bold_text %>' ),
				Field::make( 'complex', 'right_rows', __( 'Right Rows', 'crb' ) )
					->set_width( 50 )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Row', 'crb' ),
						'plural_name'   => __( 'Rows', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'text', 'bold_text', __( 'Bold Text', 'crb' ) )
							->set_width( 50 )
							->set_required( true ),
						Field::make( 'text', 'text', __( 'Text', 'crb' ) )
							->set_width( 50 )
							->set_required( true )
					) )
					->set_header_template( '<%- bold_text %>' ),
			) )

			// Content with Download Button
			->add_fields( 'content-with-download-button', __( 'Content with Download Button', 'crb' ), array(
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'file', 'file', __( 'File', 'crb' ) )
					->set_width( 30 ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 35 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 35 )
					->set_options( crb_get_section_bg_color_options() ),
			) )

			// Image, Content and Side (Vertical) Texts
			->add_fields( 'image-and-content', __( 'Image, Content and Side (Vertical) Texts', 'crb' ), array(
				Field::make( 'text', 'top_text', __( 'Top Text', 'crb' ) )
					->set_width( 33 ),
				Field::make( 'text', 'left_text', __( 'Left Text (Vertical)', 'crb' ) )
					->set_width( 33 )
					->set_required( true ),
				Field::make( 'text', 'right_text', __( 'Right Text (Vertical)', 'crb' ) )
					->set_width( 33 )
					->set_required( true ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image width is 1050px.', 'crb' ) ),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					->set_width( 70 )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options( true ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'text', 'btn_url', __( 'Button URL', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'select', 'btn_type', __( 'Type', 'crb' ) )
					->set_width( 20 )
					->add_options( array(
						'link'     => __( 'Link', 'crb' ),
						'download' => __( 'Download Link', 'crb' ),
					) ),
				Field::make( 'select', 'btn_target', __( 'Open link in', 'crb' ) )
					->set_width( 20 )
					->add_options( $link_targets )
					->set_conditional_logic( array(
						array(
							'field'   => 'btn_type',
							'value'   => 'link',
							'compare' => '=',
						)
					) ),
			) )

			// Image with Text Overlay
			->add_fields( 'image_with_text_overlay', __( 'Image with Text Overlay', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 20 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 900px x 1065px.', 'crb' ) ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 25 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'select', 'layout', __( 'Layout', 'crb' ) )
					->set_width( 25 )
					->set_options( array(
						1 => 1,
						2 => 2,
					) ),
				Field::make( 'html', 'section_preview_1' )
					->set_width( 30 )
					->set_html( sprintf( '<a href="%1$s" class="mfp-image"><img src="%1$s" width="300px" height="180px" /></a>', get_bloginfo('stylesheet_directory' ) . '/resources/images/previews/section-1.png' )  )
					->help_text( __( 'Section preview', 'crb' ) )
					->set_conditional_logic( array(
						array(
							'field'   => 'layout',
							'value'   => 1,
							'compare' => '=',
						)
					) ),
				Field::make( 'html', 'section_preview_2' )
					->set_width( 30 )
					->set_html( sprintf( '<a href="%1$s" class="mfp-image"><img src="%1$s" width="300px" height="180px" /></a>', get_bloginfo('stylesheet_directory' ) . '/resources/images/previews/section-3.png' )  )
					->help_text( __( 'Section preview', 'crb' ) )
					->set_conditional_logic( array(
						array(
							'field'   => 'layout',
							'value'   => 2,
							'compare' => '=',
						)
					) ),
				Field::make( 'text', 'top_text', __( 'Top Text', 'crb' ) )
					->set_required( true ),
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 3 )
					->set_width( 35 )
					->set_required( true ),
				Field::make( 'textarea', 'bottom_headline', __( 'Bottom Headline', 'crb' ) )
					->set_rows( 3 )
					->set_width( 35 )
					->set_required( true )
					->set_conditional_logic( array(
						array(
							'field'   => 'layout',
							'value'   => 1,
							'compare' => '=',
						)
					) ),
				Field::make( 'textarea', 'bottom_content', __( 'Bottom Content', 'crb' ) )
					->set_rows( 3 )
					->set_width( 30 )
					->set_required( true )
					->set_conditional_logic( array(
						array(
							'field'   => 'layout',
							'value'   => 1,
							'compare' => '=',
						)
					) ),
				Field::make( 'text', 'bottom_text', __( 'Bottom Text', 'crb' ) )
					->set_required( true )
					->set_conditional_logic( array(
						array(
							'field'   => 'layout',
							'value'   => 2,
							'compare' => '=',
						)
					) ),
				Field::make( 'text', 'left_text', __( 'Left Text (Vertical)', 'crb' ) )
					->set_width( 50 )
					->set_required( true ),
				Field::make( 'text', 'right_text', __( 'Right Text (Vertical)', 'crb' ) )
					->set_width( 50 )
					->set_required( true ),
			) )

			// Latest Blog Posts
			->add_fields( 'latest-blog-posts', __( 'Latest Blog Posts', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) )
					->set_rows( 4 )
					->set_width( 60 ),
				Field::make( 'html', 'crb_html_testimonials' )
					->set_html( __( 'The section lists the latest three blog posts.', 'crb' ) ),
				Field::make( 'association', 'selected_cat', __( 'Filter by Category', 'crb' ) )
					->set_max( 1 )
					->set_types(array(
						array(
							'type' => 'term',
							'taxonomy' => 'category',
						),
					) ),
			) )

			// Help Center Cards Slider
			->add_fields( 'cards_slider', __( 'Help Center Cards Slider', 'crb' ), array(
				Field::make( 'text', 'first_headline', __( 'First Headline', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'text', 'second_headline', __( 'Second Headline', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'rich_text', 'side_content', __( 'Side Content', 'crb' ) )
					->set_required( true )
					->set_settings( crb_get_rich_text_simple_options() ),
				Field::make( 'association', 'cards', __( 'Select Help Center Articles', 'crb' ) )
					->set_required( true )
					->set_types(array(
						array(
							'type'      => 'post',
							'post_type' => 'crb_help_center',
						),
					) ),
				Field::make( 'text', 'help_text', __( 'Help Text', 'crb' ) )
					->set_default_value( __( 'Swipe Card to See Another', 'crb' ) )
			) )

			// Video
			->add_fields( 'video', __( 'Video', 'crb' ), array(
				Field::make( 'text', 'top_text', __( 'Top Text', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 20 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 1290px x 725px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 30 ),
				Field::make( 'text', 'btn_label', __( 'Play Button Label', 'crb' ) )
					->set_width( 30 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'text', 'video_url', __( 'Video URL', 'crb' ) )
					->set_required( true )
			) )

			//Video/Image
			->add_fields( 'video_image', __( 'Video/Image', 'crb' ), array(
				Field::make( 'select', 'media_type', __( 'Media Type', 'crb' ) )
						->set_options( array(
								'image' => __( 'Image', 'crb' ),
								'video' => __( 'Video', 'crb' ),
						) ),
				Field::make( 'text', 'top_text', __( 'Top Text', 'crb' ) ),
				Field::make( 'image', 'bg_image', __( 'Image', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 1140px x 641px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 70 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'text', 'video_url', __( 'YouTube/Vimeo URL', 'crb' ) )
					->set_width( 70 )
					//->set_required( true )
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

			// Logos Slider
			->add_fields( 'logos-slider', __( 'Logos Slider', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 30 ),
				Field::make( 'media_gallery', 'logos', __( 'Logos', 'crb' ) )
					->set_width( 70 )
					->set_type( array( 'image' ) )
					->set_required( true )
					->help_text( __( 'The recommended image width is 340px. For retina displays, you should use a double value.', 'crb' ) ),
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
			->add_fields( 'team', __( 'Team', 'crb' ), array(
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 40 ),
				Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
					->set_width( 40 )
					->set_conditional_logic( array(
						array(
							'field'   => 'bg_color',
							'value'   => 'dark',
							'compare' => '=',
						)
					) ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( array(
						'light' => __( 'Light', 'crb'),
						'dark' => __( 'Dark', 'crb'),
					) ),
				Field::make( 'association', 'members', __( 'Select Team Members', 'crb' ) )
					->set_required( true )
					->set_types(array(
						array(
							'type'      => 'post',
							'post_type' => 'crb_team',
						),
					) ),
				Field::make( 'textarea', 'bottom_text', __( 'Bottom Text', 'crb' ) )
					->set_rows( 2 )
					->set_required( true ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'text', 'btn_url', __( 'Button URL', 'crb' ) )
					->set_width( 60 ),
				Field::make( 'select', 'btn_target', __( 'Open link in', 'crb' ) )
					->set_width( 20 )
					->add_options( $link_targets ),
			) )

			// Topic Boxes
			->add_fields( 'topic_boxes', __( 'Topic Boxes', 'crb' ), array(
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 4 )
					->set_width( 40 ),
				Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'text', 'left_boxes_text', __( 'Left Boxes Text', 'crb' ) ),
				Field::make( 'complex', 'left_boxes', __( 'Left Boxes', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Box', 'crb' ),
						'plural_name'   => __( 'Boxes', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
							->set_rows( 4 )
							->set_width( 50 )
							->set_required( true ),
						Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
							->set_width( 50 ),
						Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
							->set_required( true )
							->set_settings( crb_get_rich_text_simple_options( true ) ),
					) )
					->set_header_template( '<%- headline %>' ),
				Field::make( 'text', 'right_boxes_text', __( 'Right Boxes Text', 'crb' ) ),
				Field::make( 'complex', 'right_boxes', __( 'Right Boxes', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => __( 'Box', 'crb' ),
						'plural_name'   => __( 'Boxes', 'crb' ),
					) )
					->add_fields( array(
						Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
							->set_rows( 3 )
							->set_width( 50 )
							->set_required( true ),
						Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
							->set_width( 50 ),
						Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
							->set_required( true )
							->set_settings( crb_get_rich_text_simple_options( true ) ),
					) )
					->set_header_template( '<%- headline %>' ),
				Field::make( 'text', 'bottom_text', __( 'Bottom Text', 'crb' ) )
			) )

			// Form
			->add_fields( 'contact-form', __( 'Form', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'textarea', 'subhead', __( 'Subhead', 'crb' ) )
					->set_rows( 2 )
					->set_width( 40 )
					->help_text( __( 'You can surround some of the text with asterisks to make it thicker.', 'crb' ) ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'gravity_form', 'form_id', __( 'Select a Form', 'crb' ) )
					->set_width( 40 )
					->set_required( true )
			) )

			// Callout with Background Image
			->add_fields( 'callout_with_bg_image', __( 'Callout with Background Image', 'crb' ), array(
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'image', 'image', __( 'Background Image', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 737px x 600px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'textarea', 'headline', __( 'Headline', 'crb' ) )
					->set_rows( 2 )
					->set_width( 35 )
					->set_required( true ),
				Field::make( 'text', 'subhead', __( 'Subhead', 'crb' ) )
					->set_width( 35 ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'text', 'btn_url', __( 'Button URL', 'crb' ) )
					->set_width( 60 ),
				Field::make( 'select', 'btn_target', __( 'Open link in', 'crb' ) )
					->set_width( 20 )
					->add_options( $link_targets ),
			) )

			// Callout with Podcast Link
			->add_fields( 'callout_with_podcast_link', __( 'Callout with Podcast Link', 'crb' ), array(
				Field::make( 'text', 'headline', __( 'Headline', 'crb' ) )
					->set_width( 30 )
					->set_required( true )
					->set_attribute( 'maxLength', 30 )
					->help_text( __( 'Max length: 30 Characters', 'crb' ) ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) )
					->set_rows( 4 )
					->set_width( 30 )
					->set_attribute( 'maxLength', 180 )
					->help_text( __( 'Max length: 180 Characters', 'crb' ) ),
				Field::make( 'select', 'bg_color', __( 'Section Background Color', 'crb' ) )
					->set_width( 20 )
					->set_options( crb_get_section_bg_color_options() ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 20 )
					->set_required( true )
					->help_text( __( 'The recommended image size is 875px x 414px. For retina displays, you should use double values.', 'crb' ) ),
				Field::make( 'text', 'btn_large_text', __( 'Button Large Text', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'text', 'btn_small_text', __( 'Button Small Text', 'crb' ) )
					->set_width( 20 ),
				Field::make( 'text', 'btn_url', __( 'Button URL', 'crb' ) )
					->set_width( 40 ),
				Field::make( 'select', 'btn_target', __( 'Open link in', 'crb' ) )
					->set_width( 20 )
					->add_options( $link_targets ),
			) )
	);

	return $sections;
}
