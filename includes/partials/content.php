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

<?=the_content()?>
