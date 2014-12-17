<?php
/*
Single hop variety template for use in WP E-commerce single hop pages
*/
?>
<h4>Hop Qualities</h4>

<?php if(get_field('alpha-min')) : ?> <!-- Show alpha range if both min and max have values, otherwise show min value. -->
	
	<?php (float) $alphamin = get_field('alpha-min'); ?>
	
	<dl>

		<dt>Acid Range (Alpha &#37;):</dt>
		<!-- End Display value -->
		
		<!-- if there's a max, there must be a min, so average the two to set alpha value for meter -->
		<?php if(get_field('alpha-max')) : ?>
			<?php (float) $alphamax = get_field('alpha-max'); ?>
			<?php (float) $alphavalue = ( ( $alphamax+$alphamin)/2) * 0.01 ; ?> 
			<? else: //otherwise alphamin is the alphavalue, so set it accordingly and reset min and max to null
			$alphavalue = $alphamin;
			unset ($alphamin); //reset alphamin
			unset ($alphamax);
			?>
		<?php endif; ?>
		
		<?php $alphapct = ( ( (float) $alphavalue) * 0.01); ?>

		<dd class='meter'>
			<!-- meter begins here -->
			<!-- set the low and high values based on values for low-alpha and high-alpha hops. -->
			<meter
			min="0.03"
			max="0.14"
			low="0.07"
			high="0.01"
			
			value="<?=$alphapct?>"
			
			title="%"><?php  //print the min or only value, then if there's a max set, add an emdash and the max value.
				if (isset($alphamin))  : ?><?=$alphamin?><?php else : ?><?=$alphavalue;?><?php endif;
				if (isset($alphamax)) : ?>—<?=$alphamax?><?php endif; ?>%</meter>
		</dd><!-- meter ends here -->
		
				<!-- Display value starts here -->
		<?php  //print the min or only value, then if there's a max set, add an emdash and the max value.
			if (isset($alphamin))  : ?><?=$alphamin?><?php else : ?><?=$alphavalue;?><?php endif;
			if (isset($alphamax)) : ?>—<?=$alphamax?><?php endif; ?>%
		
	</dl>
<?php endif; ?>


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

if(get_field('beta-min')) : ?> <!-- Show beta range if both min and max have values, otherwise show min value. -->
	<dt>Beta Range (&#37; of alpha acids)</dt>

	<dd>
		<?php echo get_field('beta-min'); ?>

		<?php if (get_field('beta-max')) : ?>

			<?php echo get_field('beta-max'); ?>

		<?php endif; ?>&#37;  <!-- Percent symbol (%)-->
	</dd>


<?php endif; ?>

<?php if(get_field('cohumulone')){ ?>
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
	<dt>Farnesene (as &#37; of total oils)</dt>
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
