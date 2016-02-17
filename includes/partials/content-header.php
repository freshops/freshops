<div id="location">
<div>

<h1>

<?php if (is_single() || is_page()): ?>

	<?php # Single posts or pages: ?>

	<?php the_title(); ?>

<?php elseif (is_front_page() && is_home()): ?>

	<?php # Default homepage: ?>

<?php elseif (is_front_page()): ?>

	<?php # Static homepage: ?>

<?php elseif (is_home()): ?>

	<?php # Blog page: ?>

	Blog
	<?php # Archive stuff: ?>

	<? #If it's a post category page or a product category page, print the category title ?>

<?php elseif (is_category()): ?>
	<span><?php _e('Posts Categorized: ', 'freshopstheme'); ?></span>
	<?php the_title(); ?>

<?php elseif (is_tag()): ?>
	<span><?php _e('Posts Tagged: ', 'freshopstheme'); ?></span>
	<?php the_title(); ?>

<?php elseif (is_author()): ?>
	<?php

	global $post;
	$author_id = $post->post_author;

	?>
	<span><?php _e('Posts By:', 'freshopstheme'); ?></span>
	<?php the_author_meta('display_name', $author_id); ?>

<?php elseif (is_day()): ?>
	<span><?php _e('Daily Archives:', 'freshopstheme'); ?></span>
	<?php the_time('l, F j, Y'); ?>

<?php elseif (is_month()): ?>
	<span><?php _e('Monthly Archives:', 'freshopstheme'); ?></span>
	<?php the_time('F Y'); ?>

<?php elseif (is_year()): ?>
	<span><?php _e('Yearly Archives:', 'freshopstheme'); ?></span>
	<?php the_time('Y'); ?>

<?php //titles for WP E-Commerce category and tag pages ?>
<?php elseif (get_query_var( 'taxonomy' ) == 'wpsc_product_category' ) :
	_e('Shop Category:', 'freshopstheme'); ?>
	<?php the_title(); ?>

<?php elseif (get_query_var( 'taxonomy' ) == 'product_tag' ) : ?>
	<?php single_tag_title('Products Tagged: '); ?>

<?php endif; ?>

</h1>

</div>
</div> <!-- /@location -->

<? #Begin tab panels based on custom field repeater in page admin ?>
<?php if (have_rows('tab_panels')): ?>
	<div id="submenu" class="deck tabs">

	<div>

		<ul>

		<?php while (have_rows('tab_panels')): ?>

			<?php the_row();
			$section_title = get_sub_field('section_title');
			$section_slug = sanitize_title($section_title); //define tab names based on the "slugs" of the tab names.?>

				<li><a href="#<?php echo $section_slug; ?>"><?php echo $section_title; ?></a></li>

		<?php endwhile; ?>

					</ul>

				</div>

					</div> <!-- /#submenu -->
				<?php elseif (has_deck()): ?>
					<div id="subhead" class="deck"><div><h2><?php echo get_deck(); ?></h2></div></div>
				<?php endif; ?>
