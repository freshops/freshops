<?php
/*
Single Post Template for Hop Listings in WP E-Commerce. Hop detail page.
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

			<?php if (have_posts()) : 
				while (have_posts()) : 
					the_post(); ?>

					<?php get_template_part('content', 'single_hop_variety' ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part('content', 'none' ); ?>

			<?php endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>
