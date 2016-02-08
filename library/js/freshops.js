/*
 **
 ** File: freshops.js
 ** Title: Freshops Javascript, v.1.0
 ** Site URL: http://www.freshops.com/
 ** Description: Base javascript for website: http://www.freshops.com/
 ** Created: 03/31/08
 ** Modified: 5/14/14 */

jQuery(function($) {
	var tabs = $('.tabs div'); // Tabs.
	var order = $('#order'); // Order button.
	var animOptions01 = {
		opacity: 'toggle',
		height: 'toggle',
		speed: 'slow'
	};
	var speed01 = 500;
	var speed02 = 800;
	var relExternal = $('a[rel$="external"]'); // New window links.


	$(document).ready(function() {
		
		$('.kerplop').kerplop();
		add_action( 'wp_ajax_add_to_cart'       , 'wpsc_add_to_cart' );

		$('header nav').meanmenu({
			meanScreenWidth: "768px"
		});

		$('#menu-main-nav').accordion({
			heightStyle: "content",
			event: "click hoverintent"
		});
		// Hoverintent: http://cherne.net/brian/resources/jquery.hoverIntent.html

		if (order.length > 0) {
			var order_ul = $('#order ul');
			order.hoverIntent({
				over: function() {
					order_ul.animate(animOptions01);
				},
				timeout: 250,
				out: function() {
					order_ul.animate(animOptions01);
				}
			});
		} // order

		if (tabs.length > 0) {
			/* http://jqueryui.com/demos/tabs/ */
			tabs.tabs(); // Initialize.
		} //tabs

		if (relExternal.length > 0) {
			/* If you want the link to open in a new window, add attribute "rel="external"". */
			relExternal.click(function() {
				this.target = "_blank";
			});
		} // $relExternal

	});

});
