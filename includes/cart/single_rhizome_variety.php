<?php
/*
Single rhizome variety partial for use in WP E-commerce single hop pages
*/
?>

<?php if(get_field('storage')): ?>
	<dl>
		<dt>Storage</dt>
		<dd>
		<?php
			echo get_field('storage');
			
			if (get_field('max-storage')) : 
				//add hyphen followed by max value if exists
				?>–<?php echo get_field('max-storage');
				
			endif; //end max
			
			?>% alpha acids remaining after 6 months storage at 20&deg; C
		</dd>
	</dl>
<?php endif;?>


<dl>
<?php if(get_field('yield_kilos_per_hectare')):  ?>
	<dt>Yield</dt>
	<dd>
		<?php 
		echo $yield_kilos_min = get_field('yield_kilos_per_hectare');
			if (get_field('max_yield_kilos_per_hectare')) : //hyphen followed by max value
					?>–<?php echo $yield_kilos_max = get_field('max_yield_kilos_per_hectare');
					endif; //end max
					?> kilos per hectare <br>
		<?php echo $yield_kilos_min * 1.121; //translating kilos per hectare to lbs. per acre

		if (get_field('max_yield_kilos_per_hectare')) : //hyphen followed by max value
			?>–<?php echo ( $yield_kilos_max * 1.121 ); //translating kilos per hectare to lbs. per acre
		endif; //end max

		?> kilos per hectare <br>
		 lbs. per acre
	</dd>
</dl>
<?php endif; ?>

</div><!-- end two-column percentage section for rhizomes (opened in parent)-->

<?php if(get_field('rhizome_growing_information')): ?>
	<dl>
		<dt>Rhizome Growing Information</dt>
		<dd><?php echo get_field('rhizome_growing_information'); ?></dd>
	</dl>
<?php endif; ?>
