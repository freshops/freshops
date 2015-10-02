<?php if (have_rows('tab_panels')): ?>
	<?php while (have_rows('tab_panels')): ?>
		<?php
			the_row();
			$section_title = get_sub_field('section_title');
			$section_slug = sanitize_title($section_title);
		?>

		<div id="<?=$section_slug?>">
			<?=the_sub_field('section_content')?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php if (is_front_page()) : //if this is the home page, display home widgets first ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Above Content") ) : ?>
		<?php dynamic_sidebar('Home Above Content'); ?>
	<?php endif; ?>
<?php endif; ?>

<?=the_content()?>

<?php if (is_front_page()) : //if this is the home page, display home widgets first ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Below Content") ) : ?>
		<?php dynamic_sidebar('Home Below Content'); ?>
	<?php endif; ?>
<?php endif; ?>

