/*
 * Bones Scripts File
 * Author: Ben Beekman and Michael Hulse
 */
var $kerplop_active = false;

function listKerplop() {
	'use strict';
	var $kerplops = jQuery('.description-kerplop, .price-header-kerplop, .alpha-header-kerplop, .price-kerplop, .alpha-kerplop');

	if (jQuery(window).width() < 800) {
		//for smaller screens, this rearranges list view elements into a table-free, mobile-friendly inline layout.
		if ($kerplop_active === false) { //if it's not active, activate kerplop
			$kerplops.kerplop();
			$kerplop_active = true;

			// Submit the product form using AJAX
			jQuery('form.product_form, .wpsc-add-to-cart-button-form').on('submit', function() {
				// we cannot submit a file through AJAX, so this needs to return true to submit the form normally if a file formfield is present
				file_upload_elements = jQuery.makeArray(jQuery('input[type="file"]', jQuery(this)));
				if (file_upload_elements.length > 0) {
					return true;
				} else {

					var action_buttons = jQuery('input[name="wpsc_ajax_action"]', jQuery(this));

					var action;
					if (action_buttons.length > 0) {
						action = action_buttons.val();
					} else {
						action = 'add_to_cart';
					}

					form_values = jQuery(this).serialize() + '&action=' + action;

					// Sometimes jQuery returns an object instead of null, using length tells us how many elements are in the object, which is more reliable than comparing the object to null
					if (jQuery('#fancy_notification').length === 0) {
						jQuery('div.wpsc_loading_animation', this).css('visibility', 'visible');
					}

					var success = function(response) {
						if ((response)) {
							if (response.hasOwnProperty('fancy_notification') && response.fancy_notification) {
								if (jQuery('#fancy_notification_content')) {
									jQuery('#fancy_notification_content').html(response.fancy_notification);
									jQuery('#loading_animation').css('display', 'none');
									jQuery('#fancy_notification_content').css('display', 'block');
								}
							}
							jQuery('div.shopping-cart-wrapper').html(response.widget_output);
							jQuery('div.wpsc_loading_animation').css('visibility', 'hidden');

							jQuery('.cart_message').delay(3000).slideUp(500);

							//Until we get to an acceptable level of education on the new custom event - this is probably necessary for plugins.
							if (response.wpsc_alternate_cart_html) {
								eval(response.wpsc_alternate_cart_html);
							}

							jQuery(document).trigger({
								type: 'wpsc_fancy_notification',
								response: response
							});
						}

						if (jQuery('#fancy_notification').length > 0) {
							jQuery('#loading_animation').css("display", 'none');
						}
					};

					jQuery.post(wpsc_ajax.ajaxurl, form_values, success, 'json');

					wpsc_fancy_notification(this);
					return false;
				}
			});
		}
	}
}

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function() {
	$kerplop_active = false;
	listKerplop();
}); /* end of as page load scripts */

jQuery(window).resize(function() { /* only trigger on resize */
	listKerplop();
});


/**
 * catch WP e-Commerce cart update event
 * @param {jQuery.Event} event
 */
jQuery(document).on('wpsc_fancy_notification', function(event) {
	jQuery('#theme-checkout-total').html(event.response.cart_total);
});
