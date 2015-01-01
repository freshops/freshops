<?php if ( is_home() || is_archive() || is_singular( 'post' ) || is_category() || is_tag() || is_tax()) : ?>


	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>



		<?php dynamic_sidebar('Blog Sidebar'); ?>



	<?php else:  # This content shows up if there are no widgets defined in the backend. ?>



		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all pages with sidebars. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif; ?> 	<!-- end blog sidebar -->
	
	
<?php elseif ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Shop Navigation") ) : 
//if it's not a blog page, show the shopping cart sidebar ?>

	<?php dynamic_sidebar('Shop Navigation'); ?>

<?php else: ?>

	<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on most shopping-related pages. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>

<?php endif; ?>
