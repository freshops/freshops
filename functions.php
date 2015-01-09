<?php
/*
Author: Ben Beekman and Michael Hulse
URL: http://beekmedia.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/freshops.php
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
require_once( 'library/freshops.php' ); // if you remove this, freshops will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
//require_once( 'library/custom-post-type.php' ); // you can disable this if you like
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



	/************* Enqueue Scripts and Styles *************/

	function freshops_wp_enqueue_rhizome_scripts_styles() {
		
	# See also: `freshops_scripts_and_styles` in `library/freshops.php`.

		if ( ! is_admin()) {
			
			wp_register_style('special', get_stylesheet_directory_uri() . '/library/css/special.css', array(), '', 'all' );
			
			wp_enqueue_style('special');
			
			$script_path = get_template_directory_uri() . '/library/js/rhizome/';

			wp_register_script('meanmenu',      $script_path . 'jquery.meanmenu.js',          array('jquery'), 1, FALSE);
			wp_register_script('nutshell',      $script_path . 'jquery.nutshell.js',          array('jquery'), 1, FALSE);
			wp_register_script('cookie',        $script_path . 'jquery.cookie.js',            array('jquery'), 1, FALSE);
			wp_register_script('dcjqaccordion', $script_path . 'jquery.dcjqaccordion.2.7.js', array('jquery'), 1, FALSE);
			wp_register_script('fastclick',     $script_path . 'fastclick.js',                array('jquery'), 1, FALSE);
			wp_register_script('rhizome',       $script_path . 'rhizome.js',                  array('jquery'), 1, FALSE);

			wp_enqueue_script('meanmenu');
			wp_enqueue_script('nutshell');
			wp_enqueue_script('cookie');
			wp_enqueue_script('dcjqaccordion');
			wp_enqueue_script('fastclick');
			wp_enqueue_script('rhizome');
		}
	}

	add_action('wp_enqueue_scripts', 'freshops_wp_enqueue_rhizome_scripts_styles');



	/************* THUMBNAIL SIZE OPTIONS *************/
	add_image_size( 'landscape-large', 600, 150, true );
	add_image_size( 'landscape-med', 300, 100, true );
	add_image_size( 'landscape-small', 150, 50, true );
	
	add_image_size( 'portrait-600', 600, 1000, true );
	add_image_size( 'portrait-300', 300, 500, true );
	add_image_size( 'portrait-150', 150, 250, true );
	
	add_image_size( 'icon', 72, 72, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 600 x 150 sized image,
we would use the function:
<?php the_post_thumbnail( 'landscape-large' ); ?>
for the 72 x 72 image:
<?php the_post_thumbnail( 'icon' ); ?>
*/

add_filter( 'image_size_names_choose', 'freshops_custom_image_sizes' );

function freshops_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
					   'landscape-large' => __('600px by 150px'),
					   'landscape-med' => __('300px by 100px'),
					   'landscape-small' => __('150 by 50'),
					   
					   'portrait-large' => __('600px by 1000px'),
					   'portrait-med' => __('300px by 500px'),
					   'portrait-small' => __('150px by 250px'),
					   
					   'icon' => __('72px by 72px'),
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
					   'order' => __( 'Order', 'freshopstheme' ),
					   );
	register_nav_menus( $locations );
}
// Hook into the 'init' action
add_action( 'init', 'custom_navigation_menus' );

function order_nav() {
	wp_nav_menu(array(
		'container' => div,                           // remove nav container
		'container_class' => 'menu clearfix order-nav',           // class of container (should you choose to use it)
		'menu' => __( 'Order', 'freshopstheme' ),  // nav name
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
function freshops_register_sidebars() {
	register_sidebar(array(
					 'id'            => 'blog_sidebar',
					 'name'          => __( 'Blog Sidebar', 'freshopstheme' ),
					 'description'   => __( 'The standard blog sidebar.', 'freshopstheme' ),
					 'before_widget' => '<div id="%1$s" class="widget %2$s">',
					 'after_widget'  => '</div>',
					 'before_title'  => '<h4 class="widgettitle">',
					 'after_title'   => '</h4>',
					 ));
	register_sidebar(array(
					 'id'            => 'shop_sidebar',
					 'name'          => __( 'Shop Sidebar', 'freshopstheme' ),
					 'description'   => __( 'Replaces the standard sidebar on product, product category, and other product-related pages.', 'freshopstheme' ),
					 'before_widget' => '<div id="%1$s" class="widget %2$s">',
					 'after_widget'  => '</div>',
					 'before_title'  => '<h4 class="widgettitle">',
					 'after_title'   => '</h4>',
					 ));
	register_sidebar(array(
					 'id'            => 'main_sidebar',
					 'name'          => __( 'Main Sidebar', 'freshopstheme' ),
					 'description'   => __( 'The main widget area for all non-product, non-blog pages with a sidebar.', 'freshopstheme' ),
					 'before_widget' => '<div id="%1$s" class="widget %2$s">',
					 'after_widget'  => '</div>',
					 'before_title'  => '<h4 class="widgettitle">',
					 'after_title'   => '</h4>',
					 ));
	
	register_sidebar(array(
					 'id'            => 'home_sidebar',
					 'name'          => __( 'Home Sidebar', 'freshopstheme' ),
					 'description'   => __( 'The main widget area for the front (home) page.', 'freshopstheme' ),
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
		'name' => __( 'Sidebar 2', 'freshopstheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'freshopstheme' ),
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
function freshops_comments( $comment, $args, $depth ) {
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
					<?php printf(__( '<cite class="fn">%s</cite>', 'freshopstheme' ), get_comment_author_link()) ?>
					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'freshopstheme' )); ?> </a></time>
					<?php edit_comment_link(__( '(Edit)', 'freshopstheme' ),'  ','') ?>
				</header>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="alert alert-info">
						<p><?php _e( 'Your comment is awaiting moderation.', 'freshopstheme' ) ?></p>
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
function freshops_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'freshopstheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'freshopstheme' ) . '" />
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



//--------------------------------------------------------------------
/*
WP E-COMMERCE MODIFICATIONS START HERE
*/
//--------------------------------------------------------------------

////////////////////////////////////////////////////
// REMOVE GOLD CART CSS //
////////////////////////////////////////////////////
function childtheme_deregister_styles() {
	wp_deregister_style('wpsc-gold-cart');
}
add_action('wp_print_styles', 'childtheme_deregister_styles', 100);

/*________________________________________________________________________
| IN-LOOP CHECK TO SEE IF THE CURRENT PAGE IS A PRODUCTS PAGE.
|  RETURNS TRUE OR FALSE TO <?php IS_A_PAGE_CONTAINING_PRODUCTS() ?>
________________________________________________________________________*/

function is_a_page_containing_products() {
	
	global $post;
	$is_a_page_containing_products = false;
	
	if(get_post_type($post) == ‘wpsc-product’):
		
		$is_a_page_containing_products = true;
	endif;
	
	if ( function_exists( ‘is_products_page’ ) && !$is_a_page_containing_products):
		
		if(is_products_page()){
			$is_a_page_containing_products = true;
		}
		endif;
		
		if(!$is_a_page_containing_products) :
			global $wpdb;
		
		if(!empty($post->ID)):
			$sql =  "SELECT * FROM `{$wpdb->posts}` WHERE `post_type` IN(‘page’,’post’) AND `post_content` LIKE ‘%".wpsc_products."%’ 
		AND `ID` = ".$post->ID;
		
		$result = $wpdb->get_results($sql);
		
		if($result) :
			$is_a_page_containing_products = true;
				//error_log(‘has found shortcode wpsc_products’ );
		endif;
		
		endif; //end $post loop
		
	endif; // end !$is_a_page_containing_products

	return $is_a_page_containing_products;

}
