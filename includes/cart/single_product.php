
<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/Product">

	<section itemprop="articleBody">

		<div class="fix">

			<div id="mainbar" class="m-all t-all d-5of7">

				<div class="fix">

					<div class="product-secondary">

						<div class="imagecol">

							<?php if (wpsc_the_product_thumbnail()): ?>

								<a rel="<?php echo wpsc_the_product_title(); ?>" class="<?php echo wpsc_the_product_image_link_classes(); ?>" href="<?php echo esc_url( wpsc_the_product_image() ); ?>">
									<img class="product_image"
									id="product_image_<?php echo wpsc_the_product_id(); ?>"
									alt="<?php echo wpsc_the_product_title(); ?>"
									title="<?php echo wpsc_the_product_title(); ?>"
									src="<?php echo wpsc_the_product_thumbnail(); ?>"
									>
								</a>

								<?php if (function_exists('gold_shpcrt_display_gallery')): ?>

									<?php echo gold_shpcrt_display_gallery(wpsc_the_product_id()); ?>

								<?php endif; ?>

							<?php else: ?>

								<a href="<?php echo esc_url(wpsc_the_product_permalink()); ?>">
									<img
									class="no-image"
									id="product_image_<?php echo wpsc_the_product_id(); ?>"
									alt="No Image"
									title="<?php echo wpsc_the_product_title(); ?>"
									src="<?php get_template_directory_uri(); ?>wpsc-images/noimage.png"
									width="<?php echo get_option('product_image_width'); ?>"
									height="<?php echo get_option('product_image_height'); ?>"
									>
								</a> 

							<?php endif; ?>

						</div><!-- /.imagecol -->

					</div> <!-- /.product-secondary -->

					<div class="product-primary" role="complementary">


						<div class="productcol">

							<?php do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post); ?>

							<div class="product_description">

								<?php echo wpsc_the_product_description(); ?>

							</div><!-- /.product_description -->

							<?php do_action('wpsc_product_addons', wpsc_the_product_id()); ?>

							<?php if (wpsc_the_product_additional_description()): ?>

								<div class="single_additional_description">

									<p><?php echo wpsc_the_product_additional_description(); ?></p>

								</div> <!-- /.single_additional_description -->

							<?php endif; ?>
							
							
							

							<?php do_action('wpsc_product_addon_after_descr', wpsc_the_product_id()); ?>

							<?php # Form data: ?>

							<form
							class="product_form"
							enctype="multipart/form-data"
							action="<?php echo esc_url(wpsc_this_page_url()); ?>"
							method="post"
							name="1"
							id="product_<?php echo wpsc_the_product_id(); ?>"
							>

							<?php do_action('wpsc_product_form_fields_begin'); ?>

							<?php if (wpsc_product_has_personal_text()): ?>

								<fieldset class="custom_text">

									<legend><?php _e('Personalize Your Product', 'wpsc'); ?></legend>

									<p><?php _e('Complete this form to include a personalized message with your purchase.', 'wpsc'); ?></p>

									<textarea cols='55' rows='5' name="custom_text"></textarea>

								</fieldset> <!-- /.custom_text -->

							<?php endif; ?>

							<?php if (wpsc_product_has_supplied_file()): ?>

								<fieldset class="custom_file">

									<legend><?php _e('Upload a File', 'wpsc'); ?></legend>

									<p><?php _e('Select a file from your computer to include with this purchase.', 'wpsc'); ?></p>

									<input type="file" name="custom_file">

								</fieldset> <!-- /.custom_file -->

							<?php endif; ?>

							<?php # The variation group HTML and loop: ?>

							<?php if (wpsc_have_variation_groups()): ?>

								<fieldset>

									<legend><?php _e('Product Options', 'wpsc'); ?></legend>

									<div class="wpsc_variation_forms">

										<table>

											<?php while (wpsc_have_variation_groups()): ?>

												<?php wpsc_the_variation_group(); ?>

												<tr>

													<td class="col1">

														<label for="<?php echo wpsc_vargrp_form_id(); ?>">
															<?php echo wpsc_the_vargrp_name(); ?>:
														</label>

													</td>

													<?php # The variation HTML and loop: ?>

													<td class="col2">

														<select class="wpsc_select_variation" name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">

															<?php while (wpsc_have_variations()): ?>

																<?php wpsc_the_variation(); ?>

																<option
																value="<?php echo wpsc_the_variation_id(); ?>"
																<?php echo wpsc_the_variation_out_of_stock(); ?>
																>
																<?php echo wpsc_the_variation_name(); ?>
															</option>

														<?php endwhile; ?>

													</select>

												</td>

											</tr>

										<?php endwhile; ?>

									</table>

									<div id="variation_display_<?php echo wpsc_the_product_id(); ?>" class="is_variation">

										<?php _e('Combination of product variants is not available', 'wpsc'); ?>

									</div> <!-- /#variation_display_<?php echo wpsc_the_product_id(); ?> -->

								</div> <!-- /.wpsc_variation_forms -->

							</fieldset>

						<?php endif; ?>

						<?php
						# The variation group HTML and loop ends here.
						# Quantity options (MUST be enabled in Admin Settings):
						?>

						<?php if (wpsc_has_multi_adding()): ?>

							<fieldset>

								<legend><?php _e('Quantity', 'wpsc'); ?></legend>

								<div class="wpsc_quantity_update">

									<input type="text" id="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>" name="wpsc_quantity_update" size="2" value="1"> 
									<?php //if it's a hops page, add "oz." after the quantity
										if ( has_term('hop', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) :
											echo "oz.";
										endif;
									?>
									
									<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>">
									<input type="hidden" name="wpsc_update_quantity" value="true">
									<input type='hidden' name='wpsc_ajax_action' value='wpsc_update_quantity'>

								</div><!-- /.wpsc_quantity_update -->

							</fieldset>

						<?php endif; ?>

						<div class="wpsc_product_price">

							<?php if (wpsc_show_stock_availability()): ?>

								<?php if (wpsc_product_has_stock()): ?>

									<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="in_stock">

										<?php _e('Product in stock', 'wpsc'); ?>

									</div>

								<?php else: ?>

									<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="out_of_stock">

										<?php _e('Product not in stock', 'wpsc'); ?>

									</div>

								<?php endif; ?>

							<?php endif; ?>

							<?php if (wpsc_product_is_donation()): ?>

								<label for="donation_price_<?php echo wpsc_the_product_id(); ?>">
									<?php _e('Donation', 'wpsc'); ?>:
								</label>

								<input
								type="text"
								id="donation_price_<?php echo wpsc_the_product_id(); ?>"
								name="donation_price"
								value="<?php echo wpsc_calculate_price(wpsc_the_product_id()); ?>"
								size="6"
								>

							<?php else: ?>

								<?php wpsc_the_product_price_display(); ?>

								<?php # Multi-currency code: ?>

								<?php if (wpsc_product_has_multicurrency()): ?>

									<?php echo wpsc_display_product_multicurrency(); ?>

								<?php endif; ?>

								<?php if (wpsc_show_pnp()): ?>

									<p class="pricedisplay">
										<?php _e('Shipping', 'wpsc'); ?>:
										<span class="pp_price">
											<?php echo wpsc_product_postage_and_packaging(); ?>
										</span>
									</p>

								<?php endif; ?>

							<?php endif; ?>

						</div> <!-- /.wpsc_product_price -->

						<?php if (get_option( 'wpsc_share_this' ) == 1): ?>

							<div class="st_sharethis" displayText="ShareThis"></div>

						<?php endif; ?>

						<input type="hidden" value="add_to_cart" name="wpsc_ajax_action">
						<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id">

						<?php if (wpsc_product_is_customisable()): ?>

							<input type="hidden" value="true" name="is_customisable">

						<?php endif; ?>

						<?php # Cart Options: ?>

						<?php if ((get_option('hide_addtocart_button') == 0) && (get_option('addtocart_or_buynow') !='1')): ?>

							<?php if (wpsc_product_has_stock()): ?>

								<div class="wpsc_buy_button_container">

									<?php if (wpsc_product_external_link(wpsc_the_product_id()) != ''): ?>

										<?php $action = wpsc_product_external_link(wpsc_the_product_id()); ?>

										<input
										class="wpsc_buy_button"
										type="submit"
										value="<?php echo wpsc_product_external_link_text(wpsc_the_product_id(), __('Buy Now', 'wpsc')); ?>"
										onclick="return gotoexternallink('<?php echo esc_url($action); ?>', '<?php echo wpsc_product_external_link_target(wpsc_the_product_id()); ?>')"
										>

									<?php else: ?>

										<input
										type="submit"
										value="<?php _e('Add To Cart', 'wpsc'); ?>"
										name="Buy"
										class="wpsc_buy_button"
										id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"
										>

									<?php endif; ?>

									<div class="wpsc_loading_animation">

										<img title="Loading" alt="Loading" src="<?php echo wpsc_loading_animation_url(); ?>">

										<?php _e('Updating cart...', 'wpsc'); ?>

									</div> <!-- /.wpsc_loading_animation -->

								</div><!-- /.wpsc_buy_button_container -->

							<?php else: ?>

								<p class="soldout"><?php _e('This product has sold out.', 'wpsc'); ?></p>

							<?php endif; ?>

						<?php endif; ?>

						<?php do_action('wpsc_product_form_fields_end'); ?>

					</form> <!-- /.product_form-->

					<?php if ((get_option('hide_addtocart_button') == 0) && (get_option('addtocart_or_buynow') == '1')): ?>

						<?php echo wpsc_buy_now_button(wpsc_the_product_id()); ?>

					<?php endif; ?>


					<?php echo wpsc_product_rater(); ?>

					<?php echo wpsc_also_bought(wpsc_the_product_id()); ?>

					<?php if (wpsc_show_fb_like()): ?>

						<div class="FB_like">

							<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo wpsc_the_product_permalink(); ?>&amp;layout=standard&amp;show_faces=true&amp;width=435&amp;action=like&amp;font=arial&amp;colorscheme=light" frameborder="0"></iframe>

						</div> <!-- /#FB_like -->

					<?php endif; ?>
					
					<?php
						// HOP AND RHIZOME CONDITIONALS
						// If we're on a hop or rhizome product page, then include the single hop variety partial
						?>
						<?php 
							if 
								( ( has_term('hop', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) || (has_term('rhizomes', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) )  : ?>
							
							<?php include(locate_template('includes/cart/single_hop_or_rhizome_variety.php')); ?>
						
						<?php endif; ?>

					</div> <!-- /.productcol -->

			</div> <!-- /.product-primary -->

		</div> <!-- /.fix -->

	</div> <!-- /#mainbar -->

	<div id="sidebar" class="sidebar m-all t-all d-2of7 last-col" role="complementary">


		<div id="cart">
			<?php if ( ! function_exists('dynamic_sidebar') || ( ! dynamic_sidebar('Shop Navigation'))): ?>
				<?=dynamic_sidebar('shop_nav')?>
			<?php endif; ?>
		</div>


	</div> <!-- /#sidebar -->

</div> <!-- /.fix -->

<form onsubmit="submitform(this); return false;"
action="<?php echo esc_url(wpsc_this_page_url()); ?>"
method="post"
name="product_<?php echo wpsc_the_product_id(); ?>"
id="product_extra_<?php echo wpsc_the_product_id(); ?>"
>

	<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="prodid">
	<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="item">

</form>
</section>
<section>
	<?php echo wpsc_product_comments(); ?>
</section>
</article>
