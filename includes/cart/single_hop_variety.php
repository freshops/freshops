<?php
/*
Single hop variety template for use in WP E-commerce single hop and rhizome pages
*/
?>
<h3 class="h2">Hop Qualities</h3>

<?php if(get_field('flavor')): ?>
	
		<h4><?php the_title(); ?>Flavor</h4>
		
		<blockquote>><?php echo get_field('flavor');?>(<a href="http://en.wikipedia.org/wiki/List_of_hop_varieties">Reference</a>)</blockquote>
	
<?php endif; ?>



<?php if(get_field('alternate_form')): ?>
	<dl>
		<dt>
			<?php //Purchase link for the rhizome version of hops and vice versa
				$post_objects = get_field('alternate_form');
			
				if( $post_objects ): 
				foreach( $post_objects as $post): 
					
					setup_postdata($post); 
				?><a href="<?php the_permalink(); ?>"><h3 class="h3">Order<?php the_title(); ?></h3></a>
			<?php endforeach; ?>
			
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			
		<?php endif; ?>
	</dt>
	
</dl>
<?php endif; ?>


<h3 class="h2">Hop Growers of America Information</h3>

<?php if(get_field('hgoa_description')): ?>
	
	<?php echo get_field('hgoa_description'); ?>

<?php endif; ?>




<!-- Begin two-column section -->
<div class="percentage-columns">
	<?php if(get_field('example')): ?>
		
		<dl>
			
			<dt>Commercial Examples: </dt>
			
			<dd><?php echo get_field('example');?></dd>
			
		</dl>
		
	<?php endif; ?>


	
	<?php if(get_field('alpha-min')): //Show alpha range if both min and max have values, otherwise show min . ?>
		<dl>
			
			<dt>Acid Range (Alpha &#37;)</dt>
			
			<?php (float) $alphamin = get_field('alpha-min'); ?>
			
			<?php if(get_field('alpha-max')) : //If there's a max, average it with the min to get meter value?>
				
				<?php (float) $alphamax = get_field('alpha-max'); ?>
				
				<?php (float) $alphavalue = ( ( $alphamax+$alphamin)/2); ?> 
				
			<?php else: //otherwise alphamin is the alphavalue, so set it accordingly and unset min and max
			
			$alphavalue = $alphamin;
			
				unset ($alphamin);  //set to NULL
				
				unset ($alphamax);  //set to NULL
				
				endif;
				?>
				
				<?php $alphapct = ( ( (float) $alphavalue) * 0.01); //alphapct= alphavalue converted from a percentage to an integer ?>

				<dd class='meter'>
					<!-- meter begins here -->
					<!-- set the low and high values based on values for low-alpha and high-alpha hops. -->
					
					<meter
					min="0.03"
					max="0.16"
					low="0.07"
					high="0.1"
					value="<?=$alphapct?>"
					title="%">
					<?php  //print the min or only value, then if there's a max set, add an emdash and that.
					if (isset($alphamin))  : ?><?=$alphamin?><?php else : ?><?=$alphavalue;?><?php endif;
					if (isset($alphamax)) : ?>–<?=$alphamax?><?php endif; ?>%</meter>
				</dd><!-- meter ends here -->
				
				<!-- Display value starts here -->
			<?php  //print the min or only value, then if there's a max set, add an emdash and the max value.
			if (isset($alphamin))  : ?><?=$alphamin?><?php else : ?><?=$alphavalue;?><?php endif;
			if (isset($alphamax)) : ?>–<?=$alphamax?><?php endif; ?>%
			<!-- End Display value -->
		</dl>
	<?php endif; ?>
	
	
	
	
	<?php if(get_field('beta-min')) : ?> <!-- Show beta range if both min and max have values, otherwise show min. -->
		<dl>
			<dt>Beta Range</dt>

			<dd>
				<?php 
					echo get_field('beta-min');
				
					if (get_field('beta-max')) : //hyphen followed by max value
						?>–<?php echo get_field('beta-max');
					endif; 
				?>%
			</dd>
		</dl>
	<?php endif; ?>

	<?php if(get_field('cohumulone-min')): ?>
		
		<dl>
			
			<dt>Cohumulone (% of alpha acids)</dt>
			
			<dd> <?php echo get_field('cohumulone-min');
				if (get_field('cohumulone-max')) : //hyphen followed by max value
						?>–<?php echo get_field('cohumulone-max');
				endif;
				
				?>%
			</dd>
			
		</dl>

	<?php endif; ?>
	
	
	
	
	
	<?php if(get_field('total_oils-min')): ?>
		<dl>
			<dt>Total Oils (Mls. per 100 grams dried hops)</dt>
			<dd> <?php echo get_field('total_oils-min');
				if (get_field('total_oils-max')) : //hyphen followed by max value
						?>–<?php echo get_field('total_oils-max');
				endif;
				?> Mls.
			</dd>
		</dl>
	<?php endif; ?>
		
	<?php if(get_field('myrcene-min')): ?>
		<dl>
			<dt>Myrcene (as % of total oils)</dt>
			<dd>
				<?php echo get_field('myrcene-min');
				if (get_field('myrcene-max')) : //hyphen followed by max value
						?>–<?php echo get_field('myrcene-max');
				endif;
				?>
			</dd>
		</dl>
	<?php endif; ?>
		
	<?php if(get_field('caryophyllene-min')):?>
		<dl>
			<dt>Caryophyllene (as % of total oils)</dt>
			<dd> <?php echo get_field('caryophyllene-min');
				if (get_field('caryophyllene-max')) : //hyphen followed by max value
						?>–<?php echo get_field('caryophyllene-max');
				endif;
				?>%
			</dd>
		</dl>
	<?php endif; ?>
		
	<?php if(get_field('humulene-min')): ?>
		<dl>
			<dt>Humulene (as % of total oils)</dt>
			<dd> <?php echo get_field('humulene-min');
				if (get_field('humulene-max')) : //hyphen followed by max value
						?>–<?php echo get_field('humulene-max');
				endif;
				?>%
			</dd>
		</dl>
	<?php endif; ?>

	<?php if(get_field('farnesene-min')): ?>

		<dl>

			<dt>Farnesene (as % of total oils)</dt>
			
			<dd> <?php echo get_field('farnesene-min');
				if (get_field('farnesene-max')) : //hyphen followed by max value
						?>–<?php echo get_field('farnesene-max');
				endif;
				?>%
			</dd>
			
		</dl>
	<?php endif; ?>


	<?php if(get_field('possible_substitutions')): ?>
		<dl>
			<dt>Possible Substitutions</dt>
			<dd> 
				<?php

				/*
				*  Loop through multi-select field post objects( setup postdata ) 
				*  */

				$post_objects = get_field('possible_substitutions');

				if( $post_objects ): ?>
				<ul>
					<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif;

			?>
		</dl>
	<?php endif;?>
	
	
	<?php // If we're on a rhizome product page, then include the rhizome partial ?>
	
	<?php if(has_term('rhizome', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) : ?>
		<?php include(locate_template('includes/cart/single_rhizome_variety.php')); ?>
	<?php else: ?>
		
</div><!-- end two-column percentage section for hops (not rhizomes)-->
	
<?php endif; //end rhizome conditional ?>
