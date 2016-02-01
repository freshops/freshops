<?php if(wpsc_cart_item_count() > 0): //cart icon appears only once there are items in it ?>

	<div class="cart-widget">

		<a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>" title="Checkout" class="gocheckout"><?php printf( _n('%d', '%d', wpsc_cart_item_count(), 'wpsc'), wpsc_cart_item_count() ); ?></a>
		<a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>" title="Checkout" class="gocheckout"><span class="cart-icon"></span></a>
		<?php $cart_total = wpsc_cart_total_widget( false, false ,false );
		$explode = explode('.00', $cart_total); //if .00, hide the cents ?>
		<a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>" title="Checkout" class="gocheckout"><?php echo $explode[0]; ?></a>
		

		<form action="" method="post" class="wpsc_empty_the_cart">

			<input type="hidden" name="wpsc_ajax_action" value="empty_cart" />

			<a target="_parent" href="<?php echo htmlentities(add_query_arg('wpsc_ajax_action', 'empty_cart', remove_query_arg('ajax')), ENT_QUOTES); ?>" class="emptycart" title="Empty Your Cart"><?php _e('X', 'wpsc'); ?></a>

		</form>

	</div><!--close shoppingcart-->

<?php else: ?>
<?php endif; ?>

<?php wpsc_google_checkout(); ?>
