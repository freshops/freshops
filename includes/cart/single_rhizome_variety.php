<?php
/*
Single hop variety template for use in WP E-commerce single hop pages
*/
?>

<?php if(get_field('storage')): ?>
	<dl>
		<dt>Storage (alpha acids remaining after 6 months storage at 20&deg; C))</dt>
		<dd><?php echo get_field('storage');?></dd>
	</dl>
<?php endif;?>

</div><!-- end two-column percentage section (opened in single_hop_variety.php)-->


<h3 class="h2">Hop Grower's of America Information</h3>
</div><!-- end two-column percentage section -->

<!-- HGOA description starts here -->
<?php if(get_field('hgoa_description')): ?>
	
	<dl>
		<dt><?php the_title(); ?>Flavor Perception:</dt>
		
		<dd><?php echo get_field('hgoa_description');?>(<a href="http://en.wikipedia.org/wiki/List_of_hop_varieties">Reference</a>)</dd>
	</dl>
	
<?php endif; ?>

<?php if(get_field('usda_hops_info')): ?>
	<dl>
		<dt>USDA Hops Information</dt>
		<dd> <?php echo get_field('usda_hops_info');?></dd>
	</dl>
<?php endif; ?>
