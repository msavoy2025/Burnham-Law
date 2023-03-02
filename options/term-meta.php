<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

$link_targets = array(
	'_self'  => __( 'The same window', 'crb' ),
	'_blank' => __( 'A new window', 'crb' ),
);

Container::make( 'term_meta', __( 'Category Settings' ) )
    ->where( 'term_taxonomy', '=', 'crb_hc_category' )
    ->add_fields( array(
		Field::make( 'image', 'crb_icon', __( 'Icon', 'crb' ) )
			->set_required( true )
			->help_text( __( 'The recommended image width is 25px. For retina displays, you should use a double value.', 'crb' ) ),
    ) );

Container::make( 'term_meta', __( 'Practice Area CTA Settings' ) )
    ->where( 'term_taxonomy', '=', 'crb_practice_area_cat' )

    ->add_fields( array(
		Field::make( 'text', 'crb_cta_headline', __( 'CTA Headline', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_cta_subhead', __( 'CTA Subhead', 'crb' ) )
			->set_width( 50 )
			->set_default_value( __( 'How can we help?', 'crb' ) ),
		Field::make( 'textarea', 'crb_cta_content', __( 'CTA Content', 'crb' ) )
			->set_rows( 2 ),
		Field::make( 'text', 'crb_cta_phone', __( 'CTA Phone', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'association', 'crb_cta_locations', __( 'CTA Locations', 'crb' ) )
			->set_types(array(
				array(
					'type'      => 'post',
					'post_type' => 'crb_location',
				),
			) ),
		Field::make( 'text', 'crb_cta_btn_label', __( 'CTA Button Label', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'select', 'crb_cta_btn_target', __( 'Open link in', 'crb' ) )
			->set_width( 50 )
			->add_options( $link_targets ),
		Field::make( 'text', 'crb_cta_btn_url', __( 'CTA Button URL', 'crb' ) ),
		Field::make( 'association', 'crb_cta_members', __( 'Practice Area CTA Members', 'crb' ) )
			->help_text( __( 'If you leave this field blank, the section will not be displayed.', 'crb' ) )
			->set_types(array(
				array(
					'type'      => 'post',
					'post_type' => 'crb_team',
				),
			) ),
    ) );
