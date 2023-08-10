<?php

// Post types
function kodeks_post_types()
	{
		register_taxonomy(
			'events-tax',
			array('events'),
			array(
				'label' => __('Events categories'),
				'rewrite' => array('slug' => 'taxonomy', 'with_front' => true),
				'hierarchical' => true,
				'show_admin_column' => true,
				'show_in_rest' => true,
			)
		);

		// post_type
		register_post_type(
		'events',
			array(
				'labels' => array(
					'name' => __('Events'),
					'singular_name' => __('Event'),
					'menu_name' => __('Events'),
				),
				'public' => true,
				'has_archive' => false,
				'menu_icon'           => 'dashicons-calendar-alt',
				'rewrite' => array('slug' => 'events', 'with_front' => false),
				'supports' => array('title', 'thumbnail'),
				'exclude_from_search' => false,
				'show_in_rest' => true
			)
		); 
		
		register_taxonomy(
			'contacts-tax',
			array('contacts'),
			array(
				'label' => __('Contacts categories'),
				'rewrite' => array('slug' => 'taxonomy', 'with_front' => true),
				'hierarchical' => true,
				'show_admin_column' => true,
				'show_in_rest' => true,
			)
		);
		
		// post_type
		register_post_type(
		'contacts',
			array(
				'labels' => array(
					'name' => __('Contacts'),
					'singular_name' => __('Contact'),
					'menu_name' => __('Contacts'),
				),
				'public' => true,
				'has_archive' => false,
				'menu_icon'           => 'dashicons-admin-users',
				'rewrite' => array('slug' => 'contacts', 'with_front' => false),
				'supports' => array('title'),
				'exclude_from_search' => false,
				'show_in_rest' => true
			)
		); 
	}
add_action('init', 'kodeks_post_types');