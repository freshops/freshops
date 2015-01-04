<?php
/*This code tests conditions for 3 separate widget areas:
• 
'id'            => 'main_sidebar',, 'name'          => __( 'Main Sidebar', 'freshopstheme' ),
	              							The home page and any other non-blog, non-product pages 
'id'            => 'blog_sidebar', 'name'          => __( 'Blog Sidebar', 'freshopstheme' )
									The standard blog sidebar.
'id'            => 'shop_sidebar',  'name'          => __( 'Shop Sidebar', 'freshopstheme' ),
	                 		Replaces the standard sidebar on product, product category, and other product-related pages.
___________________________________________________________________________________________________*/
?>


<?php if ( is_home() || is_archive() || is_singular( 'post' ) || is_category() || is_tag() || is_tax()) : ?>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
		
		<?php dynamic_sidebar('Blog Sidebar'); ?>
		
	<?php else: ?>
		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all blog-related pages. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif; ?>

<?php elseif ( is_a_page_containing_products () ) : ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Shop Sidebar") ) :  ?>
		<?php dynamic_sidebar('Shop Sidebar'); ?>
	<?php else: ?>
		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all shop-related pages. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif; ?>
	
<?php elseif (is_front_page()) : ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Main Sidebar") ) : ?>
		
		<?php dynamic_sidebar('Main Sidebar'); ?>
		
	<?php else: ?>
		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all non-blog, non-shop pages. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif; ?>
<?php endif; ?>
