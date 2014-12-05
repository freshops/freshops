<?php

// let's create the function for the custom type
function custom_post_hops() {
	// creating (registering) the custom type
	register_post_type( 'hop_variety', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Hop Varieties', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Hop Variety', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Hop Varieties', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Hop Variety', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Hop Variety', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Hop Variety', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Hop Variety', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Hop Varieties', 'bonestheme' ), /* Search Hop Type Title */
			'not_found' =>  __( 'Nothing found in the Hop Varieties Database.', 'bonestheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Variety Names', 'bonestheme' ), /* Hop Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'hop_variety', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'hop_variety', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail', 'excerpt', 'revisions')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'hop_variety' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'hop_variety' );
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_hops');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat',
		array('hop_variety'), /* if you change the name of register_post_type( 'hop_variety', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Hop Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hop Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hop Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Hop Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hop Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hop Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hop Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hop Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hop Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hop Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);

	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag',
		array('hop_variety'), /* if you change the name of register_post_type( 'hop_variety', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Hop Tags', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hop Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hop Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Hop Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hop Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hop Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hop Tag', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hop Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hop Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hop Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);


/*------------------------------------------------------------------------------------------------
] HOP CUSTOM POST TYPE ENDS HERE
------------------------------------------------------------------------------------------------*/



/*------------------------------------------------------------------------------------------------
] RHIZOME CUSTOM POST TYPE STARTS HERE
------------------------------------------------------------------------------------------------*/
// let's create the function for the custom type
function custom_post_rhizomes() {
	// creating (registering) the custom type
	register_post_type( 'rhizome_variety', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Rhizome Varieties', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Rhizome Variety', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Rhizome Varieties', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Rhizome Variety', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Rhizome Variety', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Rhizome Variety', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Rhizome Variety', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Rhizome Varieties', 'bonestheme' ), /* Search Rhizome Type Title */
			'not_found' =>  __( 'Nothing found in the Rhizome Varieties Database.', 'bonestheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Rhizome Variety Names', 'bonestheme' ), /* Rhizome Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'rhizome_variety', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'rhizome_variety', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail', 'excerpt', 'revisions')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'rhizome_variety' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'rhizome_variety' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_rhizomes');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat',
		array('rhizome_variety'), /* if you change the name of register_post_type( 'rhizome_variety', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Rhizome Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Rhizome Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Rhizome Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Rhizome Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Rhizome Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Rhizome Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Rhizome Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Rhizome Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Rhizome Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Rhizome Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);

	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag',
		array('rhizome_variety'), /* if you change the name of register_post_type( 'rhizome_variety', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Rhizome Tags', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Rhizome Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Rhizome Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Rhizome Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Rhizome Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Rhizome Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Rhizome Tag', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Rhizome Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Rhizome Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Rhizome Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'rhizome_variety' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'rhizome_variety' );
/*------------------------------------------------------------------------------------------------
] RHIZOME CUSTOM POST TYPE ENDS HERE
------------------------------------------------------------------------------------------------*/


/*
 MERCHANDISE CUSTOM POST TYPE STARTS HERE
------------------------------------------------------------------------------------------------*/
//
function products_post_type() {

	$labels = array(
		'name'                => _x( 'Merchandise', 'Post Type General Name', 'bones_theme' ),
		'singular_name'       => _x( 'Merchandise', 'Post Type Singular Name', 'bones_theme' ),
		'menu_name'           => __( 'Merchandise', 'bones_theme' ),
		'parent_item_colon'   => __( 'Parent Merchandise:', 'bones_theme' ),
		'all_items'           => __( 'All Merchandise', 'bones_theme' ),
		'view_item'           => __( 'View Merchandise', 'bones_theme' ),
		'add_new_item'        => __( 'Add New Merchandise', 'bones_theme' ),
		'add_new'             => __( 'New Merchandise', 'bones_theme' ),
		'edit_item'           => __( 'Edit Merchandise', 'bones_theme' ),
		'update_item'         => __( 'Update Merchandise', 'bones_theme' ),
		'search_items'        => __( 'Search merchandise', 'bones_theme' ),
		'not_found'           => __( 'No merchandise found', 'bones_theme' ),
		'not_found_in_trash'  => __( 'No merchandise found in Trash', 'bones_theme' ),
	);
	$args = array(
		'label'               => __( 'merchandise', 'bones_theme' ),
		'description'         => __( 'Product information pages', 'bones_theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'merchandise', $args );

}

// Hook into the 'init' action
add_action( 'init', 'products_post_type', 0 );
