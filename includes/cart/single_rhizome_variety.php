<?php
/*
Single rhizome variety partial for use in WP E-commerce single hop pages
*/
?>

<?php if(get_field('storage')): ?>
	<dl>
		<dt>Storage (alpha acids remaining after 6 months storage at 20&deg; C))</dt>
		<dd><?php echo get_field('storage');?></dd>
	</dl>
<?php endif;?>

<?php if(get_field('yield_kilos_per_hectare')): ?>
	<dl>
		<dt>Yield (kilos per hectare)</dt>
		<dd> <?php echo get_field('yield_kilos_per_hectare'); ?></dd>
	</dl>
<?php endif; ?>

<?php if(get_field('yield_lbs_per_acre')): ?>
	<dl>
		<dt>Yield (lbs. per acre)</dt>
		<dd> <?php echo get_field('yield_lbs_per_acre'); ?></dd>
	</dl>
<?php endif; ?>

</div><!-- end two-column percentage section (opened in single_hop_variety.php)-->

<?php if(get_field('rhizome_growing_information')): ?>
	<dl>
		<dt>Rhizome Growing Information</dt>
		<dd> <?php echo get_field('rhizome_growing_information'); ?></dd>
	</dl>
<?php endif; ?>
