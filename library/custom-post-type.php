<?php
/* Bones Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
/*------------------------------------------------------------------------------------------------
] TESTIMONIALS CUSTOM POST TYPE STARTS HERE
------------------------------------------------------------------------------------------------*/



// Register Custom Post Type
function bgb_cpt_testimonials() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'bones_theme' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'bones_theme' ),
		'menu_name'           => __( 'Testimonials', 'bones_theme' ),
		'parent_item_colon'   => __( 'Parent Item:', 'bones_theme' ),
		'all_items'           => __( 'All Testimonials', 'bones_theme' ),
		'view_item'           => __( 'View Testimonial', 'bones_theme' ),
		'add_new_item'        => __( 'Add New Testimonial', 'bones_theme' ),
		'add_new'             => __( 'Add New Testimonial', 'bones_theme' ),
		'edit_item'           => __( 'Edit Testimonial', 'bones_theme' ),
		'update_item'         => __( 'Update Testimonial', 'bones_theme' ),
		'search_items'        => __( 'Search Testimonials', 'bones_theme' ),
		'not_found'           => __( 'Testimonial Not Found', 'bones_theme' ),
		'not_found_in_trash'  => __( 'Testimonial Not Found in Trash', 'bones_theme' ),
	);
	$args = array(
		'label'               => __( 'bgb_cpt_testimonials', 'bones_theme' ),
		'description'         => __( 'Client Testimonials', 'bones_theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'post-formats', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 9,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'bgb_cpt_testimonials', $args );

}

// Hook into the 'init' action
add_action( 'init', 'bgb_cpt_testimonials', 0 );

?>
