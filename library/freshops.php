<?php
/* Welcome to Freshops Theme :)
This is the core Freshops Theme file where most of the
main functions & features reside. If you have
any custom functions, it's best to put them
in the functions.php file.

Developed by: Ben Beekman and Michael Hulse
URL: http://benbeekman.com/
*/

/*********************
LAUNCH FRESHOPS THEME
Fire off all the functions and tools.
*********************/

// we're firing all out initial functions at the start
add_action('after_setup_theme', 'freshops_ahoy', 16);

function freshops_ahoy()
{

    // launching operation cleanup
    add_action('init', 'freshops_head_cleanup');
    // remove WP version from RSS
    add_filter('the_generator', 'freshops_rss_version');
    // remove pesky injected css for recent comments widget
    add_filter('wp_head', 'freshops_remove_wp_widget_recent_comments_style', 1);
    // clean up comment styles in the head
    add_action('wp_head', 'freshops_remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter('gallery_style', 'freshops_gallery_style');

    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'freshops_scripts_and_styles', 999);
    // ie conditional wrapper

    // launching this stuff after theme setup
    freshops_theme_support();

    // adding sidebars to Wordpress (these are created in functions.php)
    add_action('widgets_init', 'freshops_register_sidebars');
    // adding the freshops search form (created in functions.php)
    add_filter('get_search_form', 'freshops_wpsearch');

    // cleaning up random code around images
    add_filter('the_content', 'freshops_filter_ptags_on_images');
    // cleaning up excerpt
    add_filter('excerpt_more', 'freshops_excerpt_more');
} /* end freshops ahoy */

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function freshops_head_cleanup()
{
    // category feeds
    // remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds
    // remove_action( 'wp_head', 'feed_links', 2 );
    // EditURI link
    remove_action('wp_head', 'rsd_link');
    // windows live writer
    remove_action('wp_head', 'wlwmanifest_link');
    // index link
    remove_action('wp_head', 'index_rel_link');
    // previous link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    // start link
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    // links for adjacent posts
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    // WP version
    remove_action('wp_head', 'wp_generator');
    // remove WP version from css
    add_filter('style_loader_src', 'freshops_remove_wp_ver_css_js', 9999);
    // remove Wp version from scripts
    add_filter('script_loader_src', 'freshops_remove_wp_ver_css_js', 9999);
} /* end freshops head cleanup */

// remove WP version from RSS
function freshops_rss_version()
{
    return '';
}

// remove WP version from scripts
function freshops_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }

    return $src;
}

// remove injected CSS for recent comments widget
function freshops_remove_wp_widget_recent_comments_style()
{
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

// remove injected CSS from recent comments widget
function freshops_remove_recent_comments_style()
{
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
}

// remove injected CSS from gallery
function freshops_gallery_style($css)
{
    return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function freshops_scripts_and_styles()
{
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    if (!is_admin()) {

        // modernizr (without media query polyfill)
        wp_register_script('freshops-modernizr', get_stylesheet_directory_uri().'/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false);

        // register main stylesheet
        wp_register_style('freshops-stylesheet', get_stylesheet_directory_uri().'/library/css/style.css', array(), '', 'all');

        // ie-only style sheet
        wp_register_style('freshops-ie-only', get_stylesheet_directory_uri().'/library/css/ie.css', array(), '');

        // comment reply script for threaded comments
        if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }

        // enqueue styles and scripts
        wp_enqueue_script('freshops-modernizr');
        wp_enqueue_style('freshops-stylesheet');
        wp_enqueue_style('freshops-ie-only');

        $wp_styles->add_data('freshops-ie-only', 'conditional', 'lt IE 9'); // add conditional wrapper around ie stylesheet

        /*
        I recommend using a plugin to call jQuery
        using the google cdn. That way it stays cached
        and your site will load faster.
        */
        wp_enqueue_script('jquery');

        if (is_page('label')) { //labeler-specific styles and scripts
            wp_register_style('label-combo-css', get_stylesheet_directory_uri().'/library/css/label-combo.css', array(), '2', 'all');
            wp_register_style('label-all-css', get_stylesheet_directory_uri().'/library/css/label-all.css', array(), '2', 'all');
            wp_register_style('label-screen-css', get_stylesheet_directory_uri().'/library/css/label-screen.css', array(), '2', 'screen');
            wp_register_style('label-print-css', get_stylesheet_directory_uri().'/library/css/label-print.css', array(), '2', 'print');
            wp_register_style('jquery-ui-css', get_stylesheet_directory_uri().'/library/css/jquery-ui.css', array(), '2', 'screen');

            wp_enqueue_style('label-combo-css');
            wp_enqueue_style('label-ui-css');
            wp_enqueue_style('label-all-css');
            wp_enqueue_style('label-screen-css');
            wp_enqueue_style('label-print-css');

            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-autocomplete');
            wp_enqueue_script('jquery-ui-button');
            wp_enqueue_script('jquery-ui-menu');
            wp_enqueue_script('jquery-ui-mouse');

            wp_register_script('jquery-ui-label', get_stylesheet_directory_uri().'/library/js/label/label.min.js', array('jquery', 'jquery-ui-core', 'jquery-ui-autocomplete', 'jquery-ui-button', 'jquery-ui-menu', 'jquery-ui-mouse'), '2', true);
            wp_enqueue_script('jquery-ui-label');
        } //end label page includes
    }
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function freshops_theme_support()
{

    // wp thumbnails (sizes handled in functions.php)
    add_theme_support('post-thumbnails');

    // default thumb size
    set_post_thumbnail_size(125, 125, true);

    // wp custom background (thx to @bransonwerner for update)
    add_theme_support('custom-background',
        array(
        'default-image' => '',  // background image default
        'default-color' => '', // background color default (dont add the #)
        'wp-head-callback' => '_custom_background_cb',
        'admin-head-callback' => '',
        'admin-preview-callback' => '',
        )
    );

    // rss thingy
    add_theme_support('automatic-feed-links');

    // to add header image support go here: http://themble.com/support/adding-header-background-image-support/

    // adding post format support
    // add_theme_support( 'post-formats',
    // 	array(
    // 		'aside',             // title less blurb
    // 		'gallery',           // gallery of images
    // 		'image',             // an image
    // 		'status',            // a Facebook like status update
    // 		'video',             // video
    // 	)
    // );

    // wp menus
    add_theme_support('menus');

    // registering wp3+ menus
    register_nav_menus(
        array(
            'main-nav' => __('The Main Menu', 'freshops_rhizome'),   // main nav in header
            'footer-links' => __('Footer Links', 'freshops_rhizome'), // secondary nav in footer
            'order' => __('Order', 'freshops_rhizome'), //the "Order" rollover nav below the header
        )
    );
} /* end freshops theme support */

/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function freshops_main_nav()
{
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => 'menu clearfix sf-menu sf-vertical clear',           // class of container (should you choose to use it)
        'menu' => __('The Main Menu', 'freshops_rhizome'),  // nav name
        'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
        'theme_location' => 'main-nav',                 // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
        'fallback_cb' => 'freshops_main_nav_fallback',      // fallback function
    ));
} /* end freshops main nav */

// the footer menu (should you choose to use one)
function freshops_footer_links()
{
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => '',                              // remove nav container
        'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
        'menu' => __('Footer Links', 'freshops_rhizome'),   // nav name
        'menu_class' => 'nav footer-nav clearfix',      // adding custom nav class
        'theme_location' => 'footer-links',             // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
        'fallback_cb' => 'freshops_footer_links_fallback',  // fallback function
    ));
} /* end freshops footer link */

function order_nav()
{
    //display the menu for the "Order" popout button in the sidebar navigation
    wp_nav_menu(array(
        'container' => '',                                       // remove nav container
        'container_class' => '',                           // class of container (should you choose to use it)
        'menu' => __('Order', 'freshops_rhizome'),        // nav name
        'menu_class' => 'order',                         // adding custom nav class
        'theme_location' => 'before-nav',                        // where it's located in the theme
        'before' => '',                        // before the menu
        'after' => '',                                              // after the menu
        'link_before' => '',                    // before each link
        'link_after' => '',                    // after each link
        'depth' => 0,                        // limit the depth of the nav
        ));
}

// this is the fallback for header menu
function freshops_main_nav_fallback()
{
    wp_page_menu(array(
        'show_home' => true,
        'menu_class' => 'nav top-nav clearfix',      // adding custom nav class
        'include' => '',
        'exclude' => '',
        'echo' => true,
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    ));
}

// this is the fallback for footer menu
function freshops_footer_links_fallback()
{
    /* you can put a default here if you like */
}

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using freshops_related_posts(); )
function freshops_related_posts()
{
    echo '<ul id="freshops-related-posts">';
    global $post;
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
        foreach ($tags as $tag) {
            $tag_arr .= $tag->slug.',';
        }
        $args = array(
            'tag' => $tag_arr,
            'numberposts' => 5, /* you can change this to show more */
            'post__not_in' => array($post->ID),
        );
        $related_posts = get_posts($args);
        if ($related_posts) {
            foreach ($related_posts as $post) : setup_postdata($post);
            ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink();
            ?>" title="<?php the_title_attribute();
            ?>"><?php the_title();
            ?></a></li>
			<?php endforeach;
        } else {
            ?>
			<?php echo '<li class="no_related_post">'.__('No Related Posts Yet!', 'freshops_rhizome').'</li>';
            ?>
		<?php
        }
    }
    wp_reset_query();
    echo '</ul>';
} /* end freshops related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function freshops_page_navi()
{
    global $wp_query;
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    echo '<nav class="pagination">';

    echo paginate_links(array(
            'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
            'format' => '',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_text' => '&larr;',
            'next_text' => '&rarr;',
            'type' => 'list',
            'end_size' => 3,
            'mid_size' => 3,
        ));

    echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function freshops_filter_ptags_on_images($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function freshops_excerpt_more($more)
{
    global $post;
    // edit here if you like
    return '...  <a class="excerpt-read-more" href="'.get_permalink($post->ID).'" title="'.__('Read', 'freshops_rhizome').get_the_title($post->ID).'">'.__('Read more &raquo;', 'freshops_rhizome').'</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function freshops_get_the_author_posts_link()
{
    global $authordata;
    if (!is_object($authordata)) {
        return false;
    }
    $link = sprintf(
        '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
        get_author_posts_url($authordata->ID, $authordata->user_nicename),
        esc_attr(sprintf(__('Posts by %s'), get_the_author())), // No further l10n needed, core will take care of this one
        get_the_author()
    );

    return $link;
}

?>
