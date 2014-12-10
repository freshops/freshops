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
add_action( 'after_switch_theme', 'freshops_flush_rewrite_rules' );

// Flush your rewrite rules
function freshops_flush_rewrite_rules() {
	flush_rewrite_rules();
}
/*------------------------------------------------------------------------------------------------
] TESTIMONIALS CUSTOM POST TYPE STARTS HERE
------------------------------------------------------------------------------------------------*/



// Register Custom Post Type
function bgb_cpt_testimonials() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'freshopstheme' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'freshopstheme' ),
		'menu_name'           => __( 'Testimonials', 'freshopstheme' ),
		'parent_item_colon'   => __( 'Parent Item:', 'freshopstheme' ),
		'all_items'           => __( 'All Testimonials', 'freshopstheme' ),
		'view_item'           => __( 'View Testimonial', 'freshopstheme' ),
		'add_new_item'        => __( 'Add New Testimonial', 'freshopstheme' ),
		'add_new'             => __( 'Add New Testimonial', 'freshopstheme' ),
		'edit_item'           => __( 'Edit Testimonial', 'freshopstheme' ),
		'update_item'         => __( 'Update Testimonial', 'freshopstheme' ),
		'search_items'        => __( 'Search Testimonials', 'freshopstheme' ),
		'not_found'           => __( 'Testimonial Not Found', 'freshopstheme' ),
		'not_found_in_trash'  => __( 'Testimonial Not Found in Trash', 'freshopstheme' ),
	);
	$args = array(
		'label'               => __( 'bgb_cpt_testimonials', 'freshopstheme' ),
		'description'         => __( 'Client Testimonials', 'freshopstheme' ),
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
