<?php

// let's create the function for the custom type
function custom_post_hops() {
	// creating (registering) the custom type
	register_post_type( 'hop_variety', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Hop Varieties', 'freshopstheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Hop Variety', 'freshopstheme' ), /* This is the individual type */
			'all_items' => __( 'All Hop Varieties', 'freshopstheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'freshopstheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Hop Variety', 'freshopstheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'freshopstheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Hop Variety', 'freshopstheme' ), /* Edit Display Title */
			'new_item' => __( 'New Hop Variety', 'freshopstheme' ), /* New Display Title */
			'view_item' => __( 'View Hop Variety', 'freshopstheme' ), /* View Display Title */
			'search_items' => __( 'Search Hop Varieties', 'freshopstheme' ), /* Search Hop Type Title */
			'not_found' =>  __( 'Nothing found in the Hop Varieties Database.', 'freshopstheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'freshopstheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Variety Names', 'freshopstheme' ), /* Hop Type Description */
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
				'name' => __( 'Hop Categories', 'freshopstheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hop Category', 'freshopstheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hop Categories', 'freshopstheme' ), /* search title for taxomony */
				'all_items' => __( 'All Hop Categories', 'freshopstheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hop Category', 'freshopstheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hop Category:', 'freshopstheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hop Category', 'freshopstheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hop Category', 'freshopstheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hop Category', 'freshopstheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hop Category Name', 'freshopstheme' ) /* name title for taxonomy */
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
				'name' => __( 'Hop Tags', 'freshopstheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Hop Tag', 'freshopstheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Hop Tags', 'freshopstheme' ), /* search title for taxomony */
				'all_items' => __( 'All Hop Tags', 'freshopstheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Hop Tag', 'freshopstheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Hop Tag:', 'freshopstheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Hop Tag', 'freshopstheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Hop Tag', 'freshopstheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Hop Tag', 'freshopstheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Hop Tag Name', 'freshopstheme' ) /* name title for taxonomy */
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
			'name' => __( 'Rhizome Varieties', 'freshopstheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Rhizome Variety', 'freshopstheme' ), /* This is the individual type */
			'all_items' => __( 'All Rhizome Varieties', 'freshopstheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'freshopstheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Rhizome Variety', 'freshopstheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'freshopstheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Rhizome Variety', 'freshopstheme' ), /* Edit Display Title */
			'new_item' => __( 'New Rhizome Variety', 'freshopstheme' ), /* New Display Title */
			'view_item' => __( 'View Rhizome Variety', 'freshopstheme' ), /* View Display Title */
			'search_items' => __( 'Search Rhizome Varieties', 'freshopstheme' ), /* Search Rhizome Type Title */
			'not_found' =>  __( 'Nothing found in the Rhizome Varieties Database.', 'freshopstheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'freshopstheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Rhizome Variety Names', 'freshopstheme' ), /* Rhizome Type Description */
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
				'name' => __( 'Rhizome Categories', 'freshopstheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Rhizome Category', 'freshopstheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Rhizome Categories', 'freshopstheme' ), /* search title for taxomony */
				'all_items' => __( 'All Rhizome Categories', 'freshopstheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Rhizome Category', 'freshopstheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Rhizome Category:', 'freshopstheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Rhizome Category', 'freshopstheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Rhizome Category', 'freshopstheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Rhizome Category', 'freshopstheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Rhizome Category Name', 'freshopstheme' ) /* name title for taxonomy */
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
				'name' => __( 'Rhizome Tags', 'freshopstheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Rhizome Tag', 'freshopstheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Rhizome Tags', 'freshopstheme' ), /* search title for taxomony */
				'all_items' => __( 'All Rhizome Tags', 'freshopstheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Rhizome Tag', 'freshopstheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Rhizome Tag:', 'freshopstheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Rhizome Tag', 'freshopstheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Rhizome Tag', 'freshopstheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Rhizome Tag', 'freshopstheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Rhizome Tag Name', 'freshopstheme' ) /* name title for taxonomy */
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
		'name'                => _x( 'Merchandise', 'Post Type General Name', 'freshops_theme' ),
		'singular_name'       => _x( 'Merchandise', 'Post Type Singular Name', 'freshops_theme' ),
		'menu_name'           => __( 'Merchandise', 'freshops_theme' ),
		'parent_item_colon'   => __( 'Parent Merchandise:', 'freshops_theme' ),
		'all_items'           => __( 'All Merchandise', 'freshops_theme' ),
		'view_item'           => __( 'View Merchandise', 'freshops_theme' ),
		'add_new_item'        => __( 'Add New Merchandise', 'freshops_theme' ),
		'add_new'             => __( 'New Merchandise', 'freshops_theme' ),
		'edit_item'           => __( 'Edit Merchandise', 'freshops_theme' ),
		'update_item'         => __( 'Update Merchandise', 'freshops_theme' ),
		'search_items'        => __( 'Search merchandise', 'freshops_theme' ),
		'not_found'           => __( 'No merchandise found', 'freshops_theme' ),
		'not_found_in_trash'  => __( 'No merchandise found in Trash', 'freshops_theme' ),
	);
	$args = array(
		'label'               => __( 'merchandise', 'freshops_theme' ),
		'description'         => __( 'Product information pages', 'freshops_theme' ),
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
