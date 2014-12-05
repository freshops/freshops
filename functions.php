<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

	/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
//
	// add_image_size( 'small', 150, 150, true );
	// add_image_size( 'medium', 300, 300, true );
	// add_image_size( 'large', 600, 600, true );


	add_image_size( 'portrait-600', 600, 1000, true );
	add_image_size( 'portrait-300', 300, 500, true );
	add_image_size( 'portrait-150', 150, 250, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
	                   'bones-thumb-600' => __('600px by 150px'),
	                   'bones-thumb-300' => __('300px by 100px'),
	                   'portrait-600' => __('600px by 1000px'),
	                   'portrait-300' => __('300px by 500px'),
	                   'portrait-150' => __('150px by 250px')
	                   ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

// Register Navigation Menus
function custom_navigation_menus() {

	$locations = array(
	                   'order' => __( 'Order', 'bonestheme' ),
	                   );
	register_nav_menus( $locations );
}
// Hook into the 'init' action
add_action( 'init', 'custom_navigation_menus' );

function order_nav() {
	wp_nav_menu(array(
		'container' => div,                           // remove nav container
		'container_class' => 'menu clearfix order-nav',           // class of container (should you choose to use it)
		'menu' => __( 'Order', 'bonestheme' ),  // nav name
		'menu_class' => 'order',         // adding custom nav class
		'theme_location' => 'before-nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 2,                                   // limit the depth of the nav
		));
}

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
	                 'id'            => 'sidebar1',
	                 'name'          => __( 'Sidebar 1', 'bonestheme' ),
	                 'description'   => __( 'The first (primary) sidebar.', 'bonestheme' ),
	                 'before_widget' => '<div id="%1$s" class="widget %2$s">',
	                 'after_widget'  => '</div>',
	                 'before_title'  => '<h4 class="widgettitle">',
	                 'after_title'   => '</h4>',
	                 ));
	register_sidebar(array(
	                 'id'            => 'shop_nav',
	                 'name'          => __( 'Shopping Navigation', 'bonestheme' ),
	                 'description'   => __( 'A sidebar nav area for shopping cart, account login, and other nav elements, placed near the top on every page.', 'bonestheme' ),
	                 'before_widget' => '<div id="%1$s" class="widget %2$s">',
	                 'after_widget'  => '</div>',
	                 'before_title'  => '<h4 class="widgettitle">',
	                 'after_title'   => '</h4>',
	                 ));
	register_sidebar(array(
	                 'id'            => 'shop_sidebar',
	                 'name'          => __( 'Shopping Sidebar', 'bonestheme' ),
	                 'description'   => __( 'A sidebar area that replaces the standard sidebar on product, product category, and other product-related pages.', 'bonestheme' ),
	                 'before_widget' => '<div id="%1$s" class="widget %2$s">',
	                 'after_widget'  => '</div>',
	                 'before_title'  => '<h4 class="widgettitle">',
	                 'after_title'   => '</h4>',
	                 ));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
					?>
					<?php // custom gravatar call ?>
					<?php
					// create variable
					$bgauthemail = get_comment_author_email();
					?>
					<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
					<?php // end custom gravatar call ?>
					<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
					<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
				</header>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="alert alert-info">
						<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
					</div>
				<?php endif; ?>
				<section class="comment_content clearfix">
					<?php comment_text() ?>
				</section>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</article>
			<?php // </li> is added by WordPress automatically ?>
			<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
</form>';
return $form;
}

//Call menus from content field with [menu name="menu-slug"] replacing menu name with yours' slug.
//http://www.anysitesupport.com/how-do-i-add-a-wordpress-menu-to-the-content-of-my-page/
function print_menu_shortcode($atts, $content = null) {
	extract(shortcode_atts(array( 'name' => null, ), $atts));
	return wp_nav_menu( array( 'menu' => $name, 'echo' => false, 'container' => '' ) );
	add_shortcode('menu', 'print_menu_shortcode');
}

function enqueue_scripts() {
	if (!is_admin()) {
		wp_register_style( 'superfish', get_bloginfo( 'stylesheet_directory' ) . '/library/css/superfish.css', false, 0.2 );
		wp_register_style( 'superfish-vertical', get_bloginfo( 'stylesheet_directory' ) . '/library/css/superfish-vertical.css', false, 0.4 );
		wp_register_style( 'meanmenu', get_bloginfo( 'stylesheet_directory' ) . '/library/css/meanmenu.css', false, 0.1 );

		wp_enqueue_style ('superfish');
		wp_enqueue_style ('superfish-vertical');
		wp_enqueue_style ('meanmenu');

		$script_path = get_template_directory_uri() . '/library/js/';
		wp_register_script('meanmenu', $script_path . 'libs/jquery.meanmenu.min.js', array('jquery'), 2222, false );
		wp_register_script('superfish', $script_path . 'libs/superfish.min.js', array('jquery'), 11111, false );
		wp_register_script('jquery-cookie', $script_path . 'libs/jquery.cookie-r6165.min.js', array('jquery'), 678786786, false );
		wp_register_script('freshops_custom', $script_path . 'freshops.js', array('jquery'), 41212312142, false );
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script ('jquery-ui-tabs');
		wp_enqueue_script('hoverIntent');
		wp_enqueue_script('meanmenu');
		wp_enqueue_script('superfish');
		wp_enqueue_script('jquery-cookie');
		wp_enqueue_script('freshops_custom');
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// don't remove this bracket!
?>