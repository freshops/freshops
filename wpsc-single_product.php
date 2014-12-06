<?php

	// Setup globals
	// @todo: Get these out of template
global $wp_query;

	// Setup image width and height variables
	// @todo: Investigate if these are still needed here
	// $image_width  = get_option( 'single_view_image_width' );
	// $image_height = get_option( 'single_view_image_height' );
?>

<div id="single_product_page_container">

	<?php
		// Breadcrumbs
	wpsc_output_breadcrumbs();

		// Plugin hook for adding things to the top of the products page, like the live search
	do_action( 'wpsc_top_of_products_page' );
	?>

	<div class="single_product_display group">
		<?php
		/**
		 * Start the product loop here.
		 * This is single products view, so there should be only one
		 */

		while ( wpsc_have_products() ) {
			wpsc_the_product(); ?>
			<div class="eightcol first">
				<?php do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post); ?>
				<?php echo wpsc_the_product_description(); ?>
				<?php do_action( 'wpsc_product_addons', wpsc_the_product_id() ); ?>

				<div class="single_additional_description">
					<?php echo wpsc_the_product_additional_description();?>

					<?php if(get_field('flavor')) { ?>
					<dl><dt><?php echo wpsc_the_product_title();?> Flavor Perception</dt>
						<dd> <?php echo get_field('flavor'); ?>
							<?php if(get_field('flavor_reference_link')) { ?> (<a href='http://<?php echo get_field('flavor_reference_link');?>' target="_blank">Reference</a>)
							</dd></dl>
							<?php
				} //flavor_reference_link
			} if(get_field('alpha')) { ?>
			<dl><dt>Acid Range (Alpha &#37;):</dt>
				<dd> <?php echo get_field('alpha'); ?></dd>
			</dl>
			<?php
		}
	if(get_field('example')) { ?>
		<dl>
			<dt>Commercial Examples</dt>
			<dd> <?php echo get_field('example');?></dd>
		</dl>
		<?php
	} //endif
	?>
	</div>
	<?php do_action( 'wpsc_product_addon_after_descr', wpsc_the_product_id() );
						/**
						 * Form data
						 */
						?>
						<form class="product_form" enctype="multipart/form-data" action="<?php echo esc_url( wpsc_this_page_url() ); ?>" method="post" name="1" id="product_<?php echo wpsc_the_product_id(); ?>">
							<?php do_action ( 'wpsc_product_form_fields_begin' ); ?>
							<?php if ( wpsc_product_has_personal_text() ) { ?>
							<fieldset class="custom_text">
								<legend><?php _e( 'Personalize Your Product', 'wpsc' ); ?></legend>
								<?php _e( 'Complete this form to include a personalized message with your purchase.', 'wpsc' ); ?>
								<textarea cols='55' rows='5' name="custom_text"></textarea>
							</fieldset>
							<?php } //endif; ?>

							<?php if ( wpsc_product_has_supplied_file() ) { ?>

							<fieldset class="custom_file">
								<legend><?php _e( 'Upload a File', 'wpsc' ); ?></legend>
								<?php _e( 'Select a file from your computer to include with this purchase.', 'wpsc' ); ?>
								<input type="file" name="custom_file" />
							</fieldset>
							<?php } //endif; ?>
							<?php /** the variation group HTML and loop */?>
							<?php if (wpsc_have_variation_groups()) { ?>
							<fieldset><legend><?php _e('Product Options', 'wpsc'); ?></legend>
								<div class="wpsc_variation_forms">
									<table>
										<?php while (wpsc_have_variation_groups()) {
											wpsc_the_variation_group(); ?>
											<tr><td class="col1"><label for="<?php echo wpsc_vargrp_form_id(); ?>"><?php echo wpsc_the_vargrp_name(); ?>:</label></td>
												<?php /** the variation HTML and loop */?>
												<td class="col2"><select class="wpsc_select_variation" name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">
													<?php while (wpsc_have_variations()) {wpsc_the_variation(); ?>
													<option value="<?php echo wpsc_the_variation_id(); ?>" <?php echo wpsc_the_variation_out_of_stock(); ?>><?php echo wpsc_the_variation_name(); ?></option>
													<?php } //endwhile; ?>
												</select></td></tr>
												<?php } //endwhile; ?>
											</table>
											<div id="variation_display_<?php echo wpsc_the_product_id(); ?>" class="is_variation"><?php _e('Combination of product variants is not available', 'wpsc'); ?></div>
										</div><!--close wpsc_variation_forms-->
									</fieldset>
									<?php } ?>
									<?php /** the variation group HTML and loop ends here */?>

									<?php
							/**
							 * Quantity options - MUST be enabled in Admin Settings
							 */
							?>
							<?php if(wpsc_has_multi_adding()) {?>
							<fieldset><legend><?php _e('Quantity', 'wpsc'); ?></legend>
								<div class="wpsc_quantity_update">
									<input type="text" id="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>" name="wpsc_quantity_update" size="2" value="1" />
									<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>"/>
									<input type="hidden" name="wpsc_update_quantity" value="true" />
								</div><!--close wpsc_quantity_update-->
							</fieldset>
							<?php } //endif ;?>
							<div class="wpsc_product_price">
								<?php if(wpsc_show_stock_availability()) {?>
								<?php if(wpsc_product_has_stock()) { ?>
								<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="in_stock"><?php _e('Product in stock', 'wpsc'); ?></div>
								<?php } else { ?>
								<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="out_of_stock"><?php _e('Product not in stock', 'wpsc'); ?></div>
								<?php //endif; ?>
								<?php } //endif; ?>
								<?php if(wpsc_product_is_donation()) { ?>
								<label for="donation_price_<?php echo wpsc_the_product_id(); ?>"><?php _e('Donation', 'wpsc'); ?>: </label>
								<input type="text" id="donation_price_<?php echo wpsc_the_product_id(); ?>" name="donation_price" value="<?php echo wpsc_calculate_price(wpsc_the_product_id()); ?>" size="6" />
								<?php } else { ?>
								<?php wpsc_the_product_price_display(); ?>
								<!-- multi currency code -->
								<?php if(wpsc_product_has_multicurrency()) { ?>
								<?php echo wpsc_display_product_multicurrency(); ?>
								<?php } //endif; ?>
								<?php if(wpsc_show_pnp()) { ?>
								<p class="pricedisplay"><?php _e('Shipping', 'wpsc'); ?>:<span class="pp_price"><?php echo wpsc_product_postage_and_packaging(); ?></span></p>
								<?php } //endif; ?>
								<?php } //endif; ?>
							</div><!--close wpsc_product_price-->

							<!-- ShareThis -->
							<?php if ( get_option( 'wpsc_share_this' ) == 1 ) { ?>
							<div class="st_sharethis" displayText="ShareThis"></div>
							<?php } //endif; ?>
							<!-- End ShareThis -->

							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action" />
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id" />
							<?php if( wpsc_product_is_customisable() ) { ?>
							<input type="hidden" value="true" name="is_customisable"/>
							<?php } //endif; ?>

							<?php
							/**
							 * Cart Options
							 */
							?>

							<?php if((get_option('hide_addtocart_button') == 0) &&  (get_option('addtocart_or_buynow') !='1')) { ?>
							<?php if(wpsc_product_has_stock()) { ?>
							<div class="wpsc_buy_button_container">
								<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') { ?>
								<?php $action = wpsc_product_external_link( wpsc_the_product_id() ); ?>
								<input class="wpsc_buy_button" type="submit" value="<?php echo wpsc_product_external_link_text( wpsc_the_product_id(), __( 'Buy Now', 'wpsc' ) ); ?>" onclick="return gotoexternallink('<?php echo esc_url( $action ); ?>', '<?php echo wpsc_product_external_link_target( wpsc_the_product_id() ); ?>')">
								<?php } else { ?>
								<input type="submit" value="<?php _e('Add To Cart', 'wpsc'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
								<?php } //endif; ?>
								<div class="wpsc_loading_animation">
									<img title="Loading" alt="Loading" src="<?php echo wpsc_loading_animation_url(); ?>" />
									<?php _e('Updating cart...', 'wpsc'); ?>
								</div><!--close wpsc_loading_animation-->
							</div><!--close wpsc_buy_button_container-->
							<?php } else { ?>
							<p class="soldout"><?php _e('This product has sold out.', 'wpsc'); ?></p>
							<?php } //endif ; ?>
							<?php } //endif ; ?>
							<?php do_action ( 'wpsc_product_form_fields_end' ); ?>
						</form><!--close product_form-->

						<?php
						if ( (get_option( 'hide_addtocart_button' ) == 0 ) && ( get_option( 'addtocart_or_buynow' ) == '1' ) )
							echo wpsc_buy_now_button( wpsc_the_product_id() );

						echo wpsc_product_rater();

						echo wpsc_also_bought( wpsc_the_product_id() );

						if(wpsc_show_fb_like()) { ?>
						<div class="FB_like">
							<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo wpsc_the_product_permalink(); ?>&amp;layout=standard&amp;show_faces=true&amp;width=435&amp;action=like&amp;font=arial&amp;colorscheme=light" frameborder="0"></iframe>
						</div><!--close FB_like-->
						<?php } //endif; ?>
						<form onsubmit="submitform(this);return false;" action="<?php echo esc_url( wpsc_this_page_url() ); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_extra_<?php echo wpsc_the_product_id(); ?>">
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="prodid"/>
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="item"/>
						</form>
					</div>
				</div> <!-- .sixcol .first -->

				<?php
				if(get_field('hgoa_description')) { ?>
				<h2>Hop Growers of America Information</h2>
				<div class="twocolumn">
					<dl><dt>Description</dt>
						<dd><?php echo get_field('hgoa_description');?></dd>
					</dl>
					<?php
				}
				if(get_field('yield_kilos_per_hectare')) { ?>
				<dl><dt>Yield (kilos per hectare)</dt>
					<dd> <?php echo get_field('yield_kilos_per_hectare');?></dd>
				</dl>
				<?php
			}
			if(get_field('yield_lbs_per_acre')) { ?>
			<dl><dt>Yield (lbs. per acre)</dt>
				<dd> <?php echo get_field('yield_lbs_per_acre');?></dd>
			</dl>
			<?php
		}
		if(get_field('beta')) { ?>
		<dl><dt>Beta Range (&#37; of alpha acids)</dt>
			<dd> <?php echo get_field('beta');?></dd>
		</dl>
		<?php
	}
	if(get_field('growing_information')) { ?>
	<dl><dt>Growing Information</dt>
		<dd> <?php echo get_field('growing_information');?></dd>
	</dl>
	<?php
}

if(get_field('cohumulone')) { ?>
	<dl>
		<dt>Cohumulone (&#37; of alpha acids)</dt>
		<dd> <?php echo get_field('cohumulone');?></dd>
	</dl>
<?php
}
if(get_field('total_oils')) { ?>
	<dl>
		<dt>Total Oils (Mls. per 100 grams dried hops)</dt>
		<dd><?php echo get_field('cohumulone');?></dd></dl>
	<?php
}
if(get_field('myrcene')) { ?>
	<dl><dt>Myrcene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('caryophyllene');?></dd>
</dl>
<?php
}
if(get_field('caryophyllene')) { ?>
	<dl><dt>Caryophyllene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('caryophyllene');?></dd>
</dl>
<?php
}
if(get_field('humulene')) { ?>
<dl><dt>Humulene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('humulene');?></dd>
</dl>
<?php
}
if(get_field('farnesene')) { ?>
	<dl><dt>Humulene (as &#37; of total oils)</dt>
	<dd> <?php echo get_field('farnesene');?></dd>
</dl>
<?php
}
if(get_field('storage')) { ?>
<dl><dt>Storage (as &#37; of alpha acids remaining after 6 months storage at 20&deg; C)</dt>
	<dd> <?php echo get_field('storage');?></dd>
</dl>
<?php
}
if(get_field('possible_substitutions')) { ?>
<dl><dt>Possible Substitutions</dt>
	<dd> <?php echo get_field('possible_substitutions');?></dd>
</dl>
<?php
}
if(get_field('hgoa_description')) { ?>
</div> <!-- .twocolumn -->
<?php
}
// END HGoA section
//USDA Info
if(get_field('usda_hops_info')) { ?>
	<h2>USDA Brewers Gold Hops Information</h2>
	<?php	echo get_field('usda_hops_info');
}
// echo wpsc_product_comments(); ?>
<?php } //endif
} //endwhile;
do_action( 'wpsc_theme_footer' ); 
?>
 </div><!--close single_product_page_container
