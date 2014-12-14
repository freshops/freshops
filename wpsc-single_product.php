<?php
	
	# Setup globals.
	# @todo: Get these out of template.
	global $wp_query;

	# Setup image width and height variables.
	# @todo: Investigate if these are still needed here?
	$image_width = get_option('single_view_image_width');
	$image_height = get_option('single_view_image_height');
	
?>

<div id="single_product_page_container">
	
	<?php
		
		# Breadcrumbs:
		wpsc_output_breadcrumbs();
		
		# Plugin hook for adding things to the top of the products page, like the live search:
		do_action( 'wpsc_top_of_products_page' );
		
	?>
	
	<div class="single_product_display group">
		
		<?php
			# Start the product loop here.
			# This is single products view, so there should be only one.
		?>
		
		<?php while (wpsc_have_products()): ?>
			
			<?php wpsc_the_product(); ?>

			<?php # include the standard product view elements (@todo: test to see if it's a "hop"). ?>
			<?php include(locate_template('includes/cart/single_product.php')); ?>
			
			
		<?php endwhile; ?>
		
	</div> <!-- /.single_product_display -->
	
	<?php do_action('wpsc_theme_footer'); ?>
	
</div><!-- /#single_product_page_container -->
