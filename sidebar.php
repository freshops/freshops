<?php if ( is_home() || is_archive() || is_singular( 'post' ) || is_category() || is_tag() || is_tax()) : ?>


	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>



		<?php dynamic_sidebar('Blog Sidebar'); ?>

	<?php else: ?>
		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all pages with sidebars. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif;
	//end blog sidebar -->
?>
	
<?php elseif ( is_a_page_containing_products () ) : ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Shop Navigation") ) :  ?>
		<?php dynamic_sidebar('Shop Navigation'); ?>
	<?php else: ?>
		<div class="no-widgets"><p><?=_e('This is a widget ready area that appears on all shopping-related pages. Add some widgets and they will appear here.', 'freshopstheme')?></p></div>
	<?php endif; ?>
	
<?php elseif (is_archive()): ?>

<?php endif; ?>
