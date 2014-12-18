<?php
/*
Single hop variety template for use in WP E-commerce single hop pages
*/
?>
<h3 class="h2">Hop Qualities</h3>



<?php if(get_field('flavor')): ?>
	
	<dl>
		
		<dt><?php the_title(); ?> Flavor Perception:</dt>
		
		<dd> <?php echo get_field('flavor');?></dd>
		
	</dl>
	
<?php endif; ?>
<!-- Begin two-column percentages section -->
<div class="percentage-columns">
	<?php if(get_field('example')): ?>
		
		<dl>
			
			<dt>Commercial Examples: </dt>
			
			<dd><?php echo get_field('example');?></dd>
			
		</dl>
		
	<?php endif; ?>



	<?php if(get_field('alpha-min')): ?> <!-- Show alpha range if both min and max have values, otherwise show min . -->
		<dl>
			
			<dt>Acid Range (Alpha &#37;)</dt>
			
			<?php (float) $alphamin = get_field('alpha-min'); ?>
			
			<?php if(get_field('alpha-max')) : ?><!-- if there's a max, average it with the min to get meter value -->
				
				<?php (float) $alphamax = get_field('alpha-max'); ?>
				
				<?php (float) $alphavalue = ( ( $alphamax+$alphamin)/2); ?> 
				
				<!--convert alphamin and alphamax to percentages-->
				<?php $alphamin=$alphamin * 0.01; ?> 
				
				<?php $alphamax=$alphamax * 0.01; ?>
				
			<?php else: //otherwise alphamin is the alphavalue, so set it accordingly and unset min and max
			
			$alphavalue = $alphamin;
			
				unset ($alphamin);  //set to NULL
				
				unset ($alphamax);  //set to NULL
				
				endif;
				
				?>
				
				<!-- alphapct= alphavalue converted from a percentage to an integer  -->
				<?php $alphapct = ( ( (float) $alphavalue) * 0.01); ?>

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

	<!-- alpha section ends here -->


	<!-- beta section starts here -->

	<?php if(get_field('beta-min')) : ?> <!-- Show beta range if both min and max have values, otherwise show min. -->
		<dl>
			<dt>Beta Range (% of alpha acids)</dt>

			<dd>
				<?php echo get_field('beta-min'); ?>
				
				<?php if (get_field('beta-max')) : 
					//hyphen followed by max value (if one exists)
				?>–<?php echo get_field('beta-max');
				endif; ?>%
			</dd>
		</dl>
	<?php endif; ?>

	<!-- cohumulone starts here -->
	<?php if(get_field('cohumulone')): ?>
		
		<dl>
			
			<dt>Cohumulone (% of alpha acids)</dt>
			
			<dd> <?php echo get_field('cohumulone');?>%</dd>
			
		</dl>

	<?php endif; ?>
	
	<!-- cohumulone ends here -->
	
	<!-- total oils start here-->
	
	<?php if(get_field('total_oils')): ?>
		<dl>
			<dt>Total Oils (Mls. per 100 grams dried hops)</dt>
			<dd><?php echo get_field('total_oils');?>%</dd></dl>
		<?php endif; ?>
		
		<?php if(get_field('myrcene')): ?>
			<dl>
				<dt>Myrcene (as % of total oils)</dt>
				<dd> <?php echo get_field('myrcene');?>%</dd>
			</dl>
		<?php endif; ?>
		<?php if(get_field('caryophyllene')):?>
			<dl>
				<dt>Caryophyllene (as % of total oils)</dt>
				<dd> <?php echo get_field('caryophyllene');?>%</dd>
			</dl>
			<?php
			endif;
			if(get_field('humulene')): ?>
			<dl>
				<dt>Humulene (as % of total oils)</dt>
				<dd> <?php echo get_field('humulene');?>%</dd>
			</dl>
		<?php endif; ?>

		<?php if(get_field('farnesene')): ?>

			<dl>

				<dt>Farnesene (as % of total oils)</dt>
				
				<dd> <?php echo get_field('farnesene');?>%</dd>
				
			</dl>
		<?php endif; ?>



		<?php if(get_field('storage')): ?>
			<dl>
				<dt>Storage (alpha acids remaining after 6 months storage at 20&deg; C))</dt>
				<dd><?php echo get_field('storage');?></dd>
			</dl>
		<?php endif;?>

		<?php if(get_field('possible_substitutions')): ?>
			<dl>
				<dt>Possible Substitutions</dt>
				<dd> 
					<?php

					/*
					*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
					*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
					*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
					*/

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

</div><!-- end two-column percentage section -->

<?php if(get_field('usda_hops_info')): ?>
	<dl>
		<dt>USDA Hops Information</dt>
		<dd> <?php echo get_field('usda_hops_info');?></dd>
	</dl>
<?php endif; ?>
