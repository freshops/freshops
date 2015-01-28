<?php
/*This code tests conditions for 4 separate widget areas:
•
'id'            => 'main_sidebar',, 'name'          => __( 'Main Sidebar', 'freshopstheme' ),
	              							The home page and any other non-blog, non-product pages
'id'            => 'blog_sidebar', 'name'          => __( 'Blog Sidebar', 'freshopstheme' )
									The standard blog sidebar.
'id'            => 'shop_sidebar',  'name'          => __( 'Shop Sidebar', 'freshopstheme' ),
Replaces the standard sidebar on product, product category, and other product-related pages.
'id'            => 'home_sidebar',  'name'          => __( 'Home Sidebar', 'freshopstheme' ),
The main widget area for the front (home) page.
___________________________________________________________________________________________________*/
?>
<?php if ( is_a_page_containing_products () ) :?>
	<?php if ( ! function_exists('dynamic_sidebar') || ( ! dynamic_sidebar('Shop Sidebar'))) :?>
		<?=dynamic_sidebar('Shop Sidebar') ?>
	<?php else: ?>
	<?php endif; ?>
<?php endif; ?>

<?php if (is_front_page()) : ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Sidebar") ) : ?>
		<?php dynamic_sidebar('Home Sidebar'); ?>
	<?php endif; ?>
<?php elseif ( is_home() || is_archive() || is_singular( 'post' ) || is_category() || is_tag() || is_tax()) : ?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>

		<?php dynamic_sidebar('Blog Sidebar'); ?>
	<?php else: ?>
		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all blog-related pages. Add some widgets to Blog Sidebar and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif; ?>
<?	elseif ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Main Sidebar") ) : ?>
	<?php dynamic_sidebar('Main Sidebar'); ?>
<?php endif;
