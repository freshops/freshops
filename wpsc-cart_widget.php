<?php if(wpsc_cart_item_count() > 0): ?>

	<div class="cart-widget">

		<?php printf( _n('%d item', '%d items', wpsc_cart_item_count(), 'wpsc'), wpsc_cart_item_count() ); ?>

		<?php echo wpsc_cart_total_widget(); ?>

		<a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>" title="Checkout" class="gocheckout"><?php _e('Checkout', 'wpsc'); ?></a>

		<form action="" method="post" class="wpsc_empty_the_cart">

			<input type="hidden" name="wpsc_ajax_action" value="empty_cart" />

			<a target="_parent" href="<?php echo htmlentities(add_query_arg('wpsc_ajax_action', 'empty_cart', remove_query_arg('ajax')), ENT_QUOTES); ?>" class="emptycart" title="Empty Your Cart"><?php _e('X', 'wpsc'); ?></a>

		</form>

	</div><!--close shoppingcart-->

<?php else: ?>
<?php endif; ?>

<?php wpsc_google_checkout(); ?>
