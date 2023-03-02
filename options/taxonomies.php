<?php
register_taxonomy(
	'crb_specialty', # Taxonomy name
	array( 'crb_team' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'              => __( 'Specialties', 'crb' ),
			'singular_name'     => __( 'Specialty', 'crb' ),
			'search_items'      => __( 'Search Specialties', 'crb' ),
			'all_items'         => __( 'All Specialties', 'crb' ),
			'parent_item'       => __( 'Parent Specialty', 'crb' ),
			'parent_item_colon' => __( 'Parent Specialty:', 'crb' ),
			'view_item'         => __( 'View Specialty', 'crb' ),
			'edit_item'         => __( 'Edit Specialty', 'crb' ),
			'update_item'       => __( 'Update Specialty', 'crb' ),
			'add_new_item'      => __( 'Add New Specialty', 'crb' ),
			'new_item_name'     => __( 'New Specialty Name', 'crb' ),
			'menu_name'         => __( 'Specialties', 'crb' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'specialty' ),
	)
);

register_taxonomy(
	'crb_hc_category', # Taxonomy name
	array( 'crb_help_center' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'              => __( 'Categories', 'crb' ),
			'singular_name'     => __( 'Category', 'crb' ),
			'search_items'      => __( 'Search Categories', 'crb' ),
			'all_items'         => __( 'All Categories', 'crb' ),
			'parent_item'       => __( 'Parent Category', 'crb' ),
			'parent_item_colon' => __( 'Parent Category:', 'crb' ),
			'view_item'         => __( 'View Category', 'crb' ),
			'edit_item'         => __( 'Edit Category', 'crb' ),
			'update_item'       => __( 'Update Category', 'crb' ),
			'add_new_item'      => __( 'Add New Category', 'crb' ),
			'new_item_name'     => __( 'New Category Name', 'crb' ),
			'menu_name'         => __( 'Categories', 'crb' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'help-center-category' ),
	)
);

register_taxonomy(
	'crb_practice_area_cat', # Taxonomy name
	array( 'crb_help_center' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'              => __( 'Practice Area', 'crb' ),
			'singular_name'     => __( 'Practice Area', 'crb' ),
			'search_items'      => __( 'Search Practice Area', 'crb' ),
			'all_items'         => __( 'All Practice Area', 'crb' ),
			'parent_item'       => __( 'Parent Practice Area', 'crb' ),
			'parent_item_colon' => __( 'Parent Practice Area', 'crb' ),
			'view_item'         => __( 'View Practice Area', 'crb' ),
			'edit_item'         => __( 'Edit Practice Area', 'crb' ),
			'update_item'       => __( 'Update Practice Area', 'crb' ),
			'add_new_item'      => __( 'Add New Practice Area', 'crb' ),
			'new_item_name'     => __( 'New Practice Area Name', 'crb' ),
			'menu_name'         => __( 'Practice Area', 'crb' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'practice-category' ),
	)
);
