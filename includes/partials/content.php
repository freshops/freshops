<?php if (have_rows('tab_panels')): ?>
	
	<?php while (have_rows('tab_panels')): ?>
		
		<?php
			the_row();
			$section_title = get_sub_field('section_title');
			$section_slug = sanitize_title($section_title);
		?>
		
		<div id="<?php echo $section_slug; ?>">
			<?php the_sub_field('section_content'); ?>
		</div>
		
		<div class="clear"></div>
		
	<?php endwhile; ?>
	
<?php endif; ?>

<?php the_content(); ?>
