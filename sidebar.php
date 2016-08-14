<?php
/*This code tests conditions for 4 separate widget areas:
•
'id'            => 'main_sidebar',, 'name'          => __( 'Main Sidebar', 'freshops_rhizome' ),
	              							The home page and any other non-blog, non-product pages
'id'            => 'blog_sidebar', 'name'          => __( 'Blog Sidebar', 'freshops_rhizome' )
									The standard blog sidebar.
'id'            => 'shop_sidebar',  'name'          => __( 'Shop Sidebar', 'freshops_rhizome' ),
Replaces the standard sidebar on product, product category, and other product-related pages.
'id'            => 'home_sidebar',  'name'          => __( 'Home Sidebar', 'freshops_rhizome' ),
The main widget area for the front (home) page.
___________________________________________________________________________________________________*/
?>
<?php if (is_front_page()) : //if this is the home page, display home widgets first ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Sidebar") ) : ?>
		<?php dynamic_sidebar('Home Sidebar'); ?>
	<?php endif; ?>
<?php endif; ?>
<?php if ( (get_query_var( 'taxonomy' ) == 'wpsc_product_category' ) || (get_query_var( 'taxonomy' ) == 'product_tag' ) ) : ?>
	<?php if (!function_exists('dynamic_sidebar') || ( ! dynamic_sidebar('Main Sidebar'))) :?>
			<?php dynamic_sidebar('Main Sidebar'); ?>
		<?php endif; ?>
<?php elseif ( is_a_page_containing_products () ) : //then display the shop sidebar if on a shop page ?>
		<?php if (!function_exists('dynamic_sidebar') || ( ! dynamic_sidebar('Shop Sidebar'))) :?>
			<?php dynamic_sidebar('Shop Sidebar'); ?>
		<?php endif; ?>
<?php	elseif ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Main Sidebar") ) : ?>
	<?php dynamic_sidebar('Main Sidebar'); ?>
<?php endif;
