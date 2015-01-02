<?php
/*
Single rhizome variety partial for use in WP E-commerce single hop pages
*/
?>

<?php if(get_field('storage')): ?>
	<dl>
		<dt>Storage</dt>
		<dd><?php echo get_field('storage');?>% alpha acids remaining after 6 months storage at 20&deg; C</dd>
	</dl>
<?php endif;?>


<dl>
	<dt>Yield</dt>
	<dd>
		<?php if(get_field('yield_kilos_per_hectare')): ?>
			<?php echo get_field('yield_kilos_per_hectare'); ?> kilos per hectare <br>
		<?php endif; ?>
		<?php if(get_field('yield_lbs_per_acre')): ?>
			<?php echo get_field('yield_lbs_per_acre'); ?> lbs. per acre
		<?php endif;
		?>
		
	</dd>
	
	
</dl>

</div><!-- end two-column percentage section for rhizomes-->

<?php if(get_field('rhizome_growing_information')): ?>
	<dl>
		<dt>Rhizome Growing Information</dt>
		<dd><?php echo get_field('rhizome_growing_information'); ?></dd>
	</dl>
<?php endif; ?>
