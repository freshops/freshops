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

		if (is_a_page_containing_products()) {
			wp_register_script('kerplop',       $script_path . 'jquery.kerplop.min.js',                  array('jquery'), 1, FALSE);
			wp_enqueue_script('kerplop');
		}

	}
}

add_action('wp_enqueue_scripts', 'freshops_wp_enqueue_rhizome_scripts_styles');




/************* THUMBNAIL SIZE OPTIONS *************/
add_image_size( 'landscape-large', 1200, 800, true );
add_image_size( 'landscape-med', 600, 400, true );
add_image_size( 'landscape-small', 200, 135, true );

add_image_size( 'portrait-large', 800, 1200, true );
add_image_size( 'portrait-med', 400, 600, true );
add_image_size( 'portrait-small', 135, 200, true );

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
if ( ! isset( $content_width ) ) $content_width = 900;

function freshops_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
	'landscape-large' => __('1200px by 800px'),
	'landscape-med' => __('600px by 400px'),
	'landscape-small' => __('200px by 135px'),

	'portrait-large' => __('800px by 1200px'),
	'portrait-med' => __('400px by 600px'),
	'portrait-small' => __('135px by 200px'),

	'icon' => __('72px by 72px'),
	) );
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
	register_sidebar(array(
	'id'            => 'cart_widget',
	'name'          => __( 'Cart Widget', 'freshopstheme' ),
	'description'   => __( 'The cart widget area at the top right of the page.', 'freshopstheme' ),
	'before_widget' => '<div id="%1$s view-cart" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="hidden">',
	'after_title'   => '</div>',
	));
	register_sidebar(array(
	'id'            => 'home_above',
	'name'          => __( 'Home Above Content', 'freshopstheme' ),
	'description'   => __( 'The home page widget area above the content area.', 'freshopstheme' ),
	'before_widget' => '<div id="%1$s view-cart" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>',
	));
	register_sidebar(array(
	'id'            => 'home_below',
	'name'          => __( 'Home Below Content', 'freshopstheme' ),
	'description'   => __( 'The home page widget area below the content area.', 'freshopstheme' ),
	'before_widget' => '<div id="%1$s view-cart" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>',
	));
	register_sidebar(array(
	'id'            => 'archive_sidebar',
	'name'          => __( 'Archive Sidebar', 'freshopstheme' ),
	'description'   => __( 'The sidebar for wp e-commerce tag and cat pages.', 'freshopstheme' ),
	'before_widget' => '<div id="%1$s view-cart" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>',
	));
	register_sidebar(array(
	'id'            => 'blog_sidebar',
	'name'          => __( 'Blog Sidebar', 'freshopstheme' ),
	'description'   => __( 'The sidebar for blog pages.', 'freshopstheme' ),
	'before_widget' => '<div id="%1$s view-cart" class="widget %2$s">',
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
<?php printf(__( '<cite class="fn">%s</cite>', 'freshopstheme' ), get_comment_author_link()); ?>
<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php comment_time(__( 'F jS, Y', 'freshopstheme' )); ?> </a></time>
<?php edit_comment_link(__( '(Edit)', 'freshopstheme' ),'  ',''); ?>
</header>
<?php if ($comment->comment_approved == '0') : ?>
	<div class="alert alert-info">
		<p><?php _e( 'Your comment is awaiting moderation.', 'freshopstheme' ); ?></p>
	</div>
<?php endif; ?>
<section class="comment_content clearfix">
	<?php comment_text(); ?>
</section>
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
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
|  RETURNS TRUE OR FALSE TO <?php IS_A_PAGE_CONTAINING_PRODUCTS(); ?>
________________________________________________________________________*/

function is_a_page_containing_products() {
	global $post;
	$is_a_page_containing_products = false;

	if ( function_exists( 'is_products_page' ) && (!$is_a_page_containing_products)):

	if(is_products_page()){
		$is_a_page_containing_products = true;
	}
	endif;

	if(! ($is_a_page_containing_products)) : //
		global $wpdb;

		if(!empty($post->ID)):
			$sql =  "SELECT * FROM `{$wpdb->posts}` WHERE `post_type` IN('page','post') AND `post_content` LIKE '%".'wpsc_products'."%'
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


/*=============================================
=           	PRODUCT CATEGORY CHECKS           	=
=============================================*/
function is_hop_product() {
	$prodID = $wpdb->get_row('SELECT * FROM wp_wpsc_item_category_assoc WHERE product_id = "'.$item['prodid'].'"');
	if($prodID->category_id == 77 || $prodID->category_id == 172 || $prodID->category_id == 139 || $prodID->category_id == 137 || $prodID->category_id == 138){
		$is_hop_product=true;
	}
	if ( ( has_term('hop', 'wpsc_product_category' )))
	return $is_hop_product;
}



/* product category check for hop category */
function is_hop_cat() {
	global $post;
	$is_hop_cat = false;
	if(wpsc_category_id() == 77 ||
	wpsc_category_id() == 172 ||
	wpsc_category_id() == 139 ||
	wpsc_category_id() == 137 ||
	wpsc_category_id() == 138
	) {
		$is_hop_cat=true;
}
return $is_hop_cat;
}

/* product category check for rhizome category */
function is_rhizome_cat() {
	global $post;
	$is_rhizome_cat = false;
	if(wpsc_category_id() == 78 ||
	wpsc_category_id() == 155 ||
	wpsc_category_id() == 156 ||
	wpsc_category_id() == 157 ||
	wpsc_category_id() == 174
	) {
		$is_rhizome_cat=true;
}
return  $is_rhizome_cat;
}

//Returns true if we are on rhizome or hop single page
function is_rhizome() {
	global $post;
	$is_rhizome = false;

	if ( ( has_term('hop', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) || (has_term('rhizomes', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) )  :

	$is_rhizome = true;

endif;

return $is_rhizome;
}


/*=============================================
= Set WP E-Commerce Sorting to Ascending Sort Order	=
=============================================*/

add_filter( 'wpsc_product_order' , 'change_product_order' );

function change_product_order(){
	return 'asc';
}


/* AJAX support for custom cart widget
________________________________________________________________________*/
/**
* add a custom AJAX request handler
*/
function theme_wpsc_cart_update() {
    $data = array(
        'cart_count' => wpsc_cart_item_count(),
        'cart_total' => wpsc_cart_total_widget(),
    );
    echo json_encode($data);
    exit;
}
add_action('wp_ajax_theme_wpsc_cart_update', 'theme_wpsc_cart_update');
add_action('wp_ajax_nopriv_theme_wpsc_cart_update', 'theme_wpsc_cart_update');

/**
* add JavaScript event handler to the page footer
*/
function theme_wpsc_footer() {
    if (!is_admin()) {
    ?>

    <script>
    jQuery(function($) {
        /**
        * catch WP e-Commerce cart update event
        * @param {jQuery.Event} event
        */
        $(document).on("wpsc_fancy_notification", function(event) {
            updateMinicart();
        });

        /**
        * catch AJAX complete events, to catch clear cart
        * @param {jQuery.Event} event
        * @param {jqXHR} xhr XmlHttpRequest object
        * @param {Object} ajaxOpts options for the AJAX request
        */
        $(document).ajaxComplete(function(event, xhr, ajaxOpts) {
            // check for WP e-Commerce "empty_cart" action
            if ("data" in ajaxOpts && ajaxOpts.data.indexOf("action=empty_cart") != -1) {
                updateMinicart();
            }
        });

        /**
        * submit AJAX request to update mini-cart
        */
        function updateMinicart() {
            // ask server for updated data
            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                cache: false,
                dataType: "json",
                data: { action: "theme_wpsc_cart_update" },
                success: function(data) {
                    // update our mini-cart elements
                    $("#theme-checkout-count").html(data.cart_count);
                    $("#theme-checkout-total").html(data.cart_total);
                }
            });
        }
    });
    </script>

    <?php
    }
}
add_action('wp_footer', 'theme_wpsc_footer');

/**
* Changes the breadcrumb options sitewide instead of changing the args on each instance
*
* @param  array $options req The array of options for the breadcrumbs
* @return array $options The array of options with our changes to them
*/

function wp_theme_t_correct_breadcrumbs( $options ){

	$options['show_products_page'] = false;
	return $options;
}

add_filter( 'wpsc_output_breadcrumbs_options', 'wp_theme_t_correct_breadcrumbs' );


//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
