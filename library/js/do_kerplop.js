// var jQuery, form_values, wpsc_ajax, wpsc_fancy_notification
/*
 * Freshops "Do Kerplop" scripts-- called by shop pages using list view, to collapse tables into a mobile-friendly block.
 * Author: Ben Beekman
 */
var $kerplopActive = false

function listKerplop() {
	'use strict';
	var $kerplops = jQuery('.description-kerplop, .price-header-kerplop, .alpha-header-kerplop, .price-kerplop, .alpha-kerplop')

	if (jQuery(window).width() < 930) {
		//for smaller screens, this rearranges list view elements into a table-free, mobile-friendly inline layout.
		if ($kerplopActive === false) { // if it's not active, activate kerplop
			$kerplops.kerplop();
			$kerplopActive = true

			// The code below is re-triggered after kerplop fires, to attach
			// fancy_notification AJAX actions to the newly spawned submit
			// buttons.
			// Submit the product form using AJAX
			jQuery('form.product_form, .wpsc-add-to-cart-button-form').on('submit', function () {
				// we cannot submit a file through AJAX, so this needs to return true to submit the form normally if a file formfield is present

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

				var success = function (response) {
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

						jQuery(document).trigger({
							type: 'wpsc_fancy_notification',
							response: response
						});
					}

					if (jQuery('#fancy_notification').length > 0) {
						jQuery('#loading_animation').css('display', 'none');
					}
				};

				jQuery.post(wpsc_ajax.ajaxurl, form_values, success, 'json');

				wpsc_fancy_notification(this);
				return false; //because there are no downloadables being purchased
			});
		}
	}
}

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function () {
	$kerplopActive = false;
	listKerplop();
}); /* end of as page load scripts */

jQuery(window).resize(function () { /* only trigger on resize */
	listKerplop();
});


/**
 * catch WP e-Commerce cart update event
 * @param {jQuery.Event} event
 */
jQuery(document).on('wpsc_fancy_notification', function (event) {
	jQuery('#theme-checkout-total').html(event.response.cart_total);
});
