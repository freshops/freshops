<?php # The content loop for the rhizome information page. ?>

<?php


	# WP_Query arguments:
	$args = array(
		'post_type' => 'wpsc-product',
		'tax_query' => array(
			array(
				'taxonomy' => 'wpsc_product_category',
				'field' => 'slug',
				'terms' => 'rhizomes'
			)
		)
	);


	# The Query:
	$query = new WP_Query($args);


?>

<?php if ($query->have_posts()): ?>


	<table class="table-01">



		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Acid Range (Alpha %)</th>
				<th scope="col">Flavor Perception</th>
				<th scope="col">Commercial Example</th>
			</tr>
		</thead>



		<?php while ($query->have_posts()): ?>




			<?php $query->the_post(); ?>




			<tr>
				<td><?php the_title(); ?></td>
				<td><?php if (get_field('alpha')) { echo get_field('alpha'); } ?>&#37;</td>
				<td><?php if (get_field('flavor')) { echo get_field('flavor'); } ?></td>
				<td><?php if (get_field('example')) { echo get_field('example'); } ?></td>
			</tr>




		<?php endwhile; ?>



	</table>


<?php else: ?>


	<!-- If query is empty, put a "not found" message here. -->


<?php endif; ?>

<?php


	# Restore original Post Data:
	wp_reset_postdata();


	# Display content of current post:
	the_content();


?>
