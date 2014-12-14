<?php
/*
Single hop variety template for use in WP E-commerce single hop pages
*/
?>
<h4>Hop Qualities</h4>
<?php if(get_field('alpha-min')) { ?>
<dl>
	<dt>Acid Range (Alpha &#37;):</dt>
	<dd><?php echo get_field('alpha-min'); ?>&endash;<?php echo get_field('alpha-max'); ?>
	</dd>
</dl>
<?php } ?>


<?php if(get_field('flavor')){ ?>
<dl>
	<dt><?php the_title(); ?> Flavor Perception:</dt>
	<dd> <?php echo get_field('flavor');?></dd>
</dl>
<?php
}

if(get_field('example')){ ?>
<dl>
	<dt>Commercial Examples: </dt>
	<dd> <?php echo get_field('example');?></dd>
</dl>
<?php
}
if(get_field('beta')){ ?>
<dl>
	<dt>Beta Range (&#37; of alpha acids)</dt>
	<dd> <?php echo get_field('beta');?></dd>
</dl>
<?php
}

if(get_field('cohumulone')){ ?>
<dl>
	<dt>Cohumulone (&#37; of alpha acids)</dt>
	<dd> <?php echo get_field('cohumulone');?></dd>
</dl>
<?php
}
if(get_field('total_oils')){ ?>
<dl>
	<dt>Total Oils (Mls. per 100 grams dried hops)</dt>
	<dd><?php echo get_field('cohumulone');?></dd></dl>
	<?php
}
if(get_field('myrcene')){ ?>
<dl>
	<dt>Caryophyllene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('caryophyllene');?></dd>
</dl>
<?php
}
if(get_field('caryophyllene')){ ?>
<dl>
	<dt>Caryophyllene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('caryophyllene');?></dd>
</dl>
<?php
}
if(get_field('humulene')){ ?>
<dl>
	<dt>Humulene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('humulene');?></dd>
</dl>
<?php
}
if(get_field('farnesene')){ ?>
<dl>
	<dt>Humulene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('farnesene');?></dd>
</dl>
<?php
}
if(get_field('storage')){ ?>
<dl>
	<dt>(as &#37; of alpha acids remaining after 6 months storage at 20&deg; C))</dt>
	<dd> <?php echo get_field('storage');?></dd>
</dl>
<?php
}
if(get_field('possible_substitutions')){ ?>
<dl>
	<dt>Possible Substitutions</dt>
	<dd> <?php echo get_field('possible_substitutions');?></dd>
</dl>
<?php
}
if(get_field('usda_hops_info')){ ?>
<dl>
	<dt>USDA Hops Information</dt>
	<dd> <?php echo get_field('possible_substitutions');?></dd>
</dl>
<?php } ?>
