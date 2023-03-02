<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'user_meta', __( 'User Settings', 'crb' ) )
    ->add_fields( array(
        Field::make( 'image', 'crb_image', __( 'Image', 'crb' ) )
        	->help_text( __( 'If you leave the field blank, the team member featured image will be used.', 'crb' ) ),
        Field::make( 'association', 'crb_member', __( 'Associate this User with a Team Member', 'crb' ) )
        	->set_max( 1 )
        	->set_types(array(
        		array(
					'type'      => 'post',
					'post_type' => 'crb_team',
        		),
        	) ),
    ) );
