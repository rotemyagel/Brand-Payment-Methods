<?php

/**
 * Registers the `payment_methods` post type.
 */
function payment_methods_init() {
	register_post_type( 'payment-methods', array(
		'labels'                => array(
			'name'                  => __( 'Payment-Methods', 'brand-payment-methods' ),
			'singular_name'         => __( 'Payment-Methods', 'brand-payment-methods' ),
			'all_items'             => __( 'All Payment-Methods', 'brand-payment-methods' ),
			'archives'              => __( 'Payment-Methods Archives', 'brand-payment-methods' ),
			'attributes'            => __( 'Payment-Methods Attributes', 'brand-payment-methods' ),
			'insert_into_item'      => __( 'Insert into Payment-Methods', 'brand-payment-methods' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Payment-Methods', 'brand-payment-methods' ),
			'featured_image'        => _x( 'Featured Image', 'payment-methods', 'brand-payment-methods' ),
			'set_featured_image'    => _x( 'Set featured image', 'payment-methods', 'brand-payment-methods' ),
			'remove_featured_image' => _x( 'Remove featured image', 'payment-methods', 'brand-payment-methods' ),
			'use_featured_image'    => _x( 'Use as featured image', 'payment-methods', 'brand-payment-methods' ),
			'filter_items_list'     => __( 'Filter Payment-Methods list', 'brand-payment-methods' ),
			'items_list_navigation' => __( 'Payment-Methods list navigation', 'brand-payment-methods' ),
			'items_list'            => __( 'Payment-Methods list', 'brand-payment-methods' ),
			'new_item'              => __( 'New Payment-Methods', 'brand-payment-methods' ),
			'add_new'               => __( 'Add New', 'brand-payment-methods' ),
			'add_new_item'          => __( 'Add New Payment-Methods', 'brand-payment-methods' ),
			'edit_item'             => __( 'Edit Payment-Methods', 'brand-payment-methods' ),
			'view_item'             => __( 'View Payment-Methods', 'brand-payment-methods' ),
			'view_items'            => __( 'View Payment-Methods', 'brand-payment-methods' ),
			'search_items'          => __( 'Search Payment-Methods', 'brand-payment-methods' ),
			'not_found'             => __( 'No Payment-Methods found', 'brand-payment-methods' ),
			'not_found_in_trash'    => __( 'No Payment-Methods found in trash', 'brand-payment-methods' ),
			'parent_item_colon'     => __( 'Parent Payment-Methods:', 'brand-payment-methods' ),
			'menu_name'             => __( 'Payment-Methods', 'brand-payment-methods' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title' ,'thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'payment-methods',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'payment_methods_init' );


