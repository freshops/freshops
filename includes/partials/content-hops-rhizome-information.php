<?php # The content loop for the rhizome information page. ?>

<?php if (have_rows('tab_panels')): ?>
	<?php while (have_rows('tab_panels')): ?>
		<?php
			the_row();
			$section_title = get_sub_field('section_title');
			$section_slug = sanitize_title($section_title);
		?>

		<div id="<?php $section_slug?>">
			<?php the_sub_field('section_content'); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php the_content(); ?>

<?php

	# WP_Query arguments:
	$args = array(
		'post_type' => 'wpsc-product',
		'tax_query' => array(
			array(
				'taxonomy' => 'wpsc_product_category',
				'field' => 'slug',
				'terms' => 'rhizomes',
				'public' => true,
			)
		),
		'order'                  => 'ASC',
		'orderby'                => 'title',
		'posts_per_page'         => '50',
	);

	# The Query:
	$query = new WP_Query($args);

?>
<?php if ($query->have_posts()): ?>

	<table class="table-01">
		<thead>
			<tr>
				<th scope="col">Variety</th>
				<th scope="col">Description</th>
				<th scope="col">Alpha %</th>
			</tr>
		</thead>
		<?php while ($query->have_posts()): ?>

			<?php $query->the_post(); ?>

			<tr>
				<td>
					<a href='<?php the_permalink();?>'><?php the_title(); ?></a>
				</td>

				<td>
					<?php the_content(); ?>
				</td>
				
				<td>
					
					<?php
					// Begin alpha logic-- output current alpha value, or else min-max.
						if (get_field('alpha')):
							echo (get_field('alpha'));
						elseif (get_field('alpha-min')):
							echo get_field('alpha-min');
							if (get_field('alpha-max')):
								echo '&#8211;' . get_field('alpha-max');
							endif;
						echo'%';
						endif; ?>
				</td>
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
