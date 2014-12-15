<?php if ( is_home() || is_archive() || is_singular( 'post' ) || is_category() || is_tag() || is_tax()) : ?>


	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>



		<?php dynamic_sidebar('blog_sidebar'); ?>



	<?php else:  # This content shows up if there are no widgets defined in the backend. ?>



		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all blog-related pages. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif; ?> 	<!-- end blog sidebar -->
<!-- if it's not a blog page, show the shopping cart sidebar -->
<?php elseif ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Shop Sidebar") ) : ?>


		<?php dynamic_sidebar('shop_sidebar'); ?>
<?php else: ?>
	<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on most shopping-related pages. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
<?php endif; ?>
