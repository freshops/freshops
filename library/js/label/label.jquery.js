/* global jQuery  */
jQuery(document).ready(function () {
	jQuery('#variety').on('focus', function () {
		jQuery('#variety').parent().after(''); // eliminates inserted block
	});
	var $variety, $weight; // initialize values
	$variety = '';
	$weight = '';
	// update values in the live preview whenever a key is pressed in either field
	jQuery('#variety').keyup(function () {
		$variety = jQuery(this).val();
		$variety = $variety.replace(/\n/g, '<br />').replace(/\n\n+/g, '<br /><br />').replace(/(<\/?)script/g, '$1noscript');
		jQuery('#variety-output').html($variety);
	});

	jQuery('#weight').keyup(function () {
		$weight = jQuery(this).val();
		$weight = $weight.replace(/\n/g, '<br />').replace(/\n\n+/g, '<br /><br />').replace(/(<\/?)script/g, '$1noscript');
		jQuery('#weight-output').html($weight);
	});

	//	Update the live preview for non-keyboard (i.e. mouse or touch) input selections

	jQuery('.ui-autocomplete').click(function () {
		jQuery('#variety').keyup();
		jQuery('#weight').keyup();
	});

	jQuery('.ui-menu-item').focus(function () {
		jQuery('#variety').keyup();
		jQuery('#weight').keyup();
	});
});

jQuery(function () {
	var availableWeights = [
		'2oz.',
		'3oz.',
		'4oz.',
		'5oz.',
		'6oz.',
		'8oz.',
		'10oz.',
		'12oz.',
		'14oz.',
		'1 lb.',
		'1lb. 2oz.',
		'1lb. 4oz.',
		'1lb. 6oz.',
		'1lb. 8oz.',
		'1lb. 10oz.',
		'1lb. 12oz.',
		'1lb. 14oz.',
		'2lbs.',
		'2lbs. 2oz.',
		'2lbs. 4oz.',
		'2lbs. 6oz.',
		'2lbs. 8oz.',
		'2lbs. 10oz.',
		'2lbs. 12oz.',
		'2lbs. 14oz.',
		'3lbs.',
		'3lbs. 2oz.',
		'3lbs. 4oz.',
		'3lbs. 6oz.',
		'3lbs. 8oz.',
		'3lbs. 10oz.',
		'3lbs. 12oz.',
		'3lbs. 14oz.',
		'4lbs.',
		'4lbs. 2oz.',
		'4lbs. 4oz.',
		'4lbs. 6oz.',
		'4lbs. 8oz.',
		'4lbs. 10oz.',
		'4lbs. 12oz.',
		'4lbs. 14oz.',
		'5lbs.',
		'5lbs. 2oz.',
		'5lbs. 4oz.',
		'5lbs. 6oz.',
		'5lbs. 8oz.',
		'5lbs. 10oz.',
		'5lbs. 12oz.',
		'5lbs. 14oz.',
		'6lbs.',
		'6.5lbs.',
		'7lbs.',
		'7.5lbs.',
		'8lbs.',
		'8.5lbs.',
		'9lbs.',
		'9.5lbs.',
		'10lbs.',
		'10.5lbs.',
		'11lbs.',
		'11.5lbs.',
		'12lbs.',
		'12.5lbs.',
		'13lbs.',
		'13.5 lbs.',
		'14lbs.',
		'14.5lbs.',
		'15lbs.',
		'15.5lbs.',
		'16lbs.',
		'16.5lbs.',
		'17lbs.',
		'17.5lbs.',
		'18lbs.',
		'18.5lbs.',
		'19lbs.',
		'19.5lbs.',
		'20lbs.',
		'20.5lbs.',
		'21lbs.',
		'22lbs.',
		'23lbs.',
		'24lbs.',
		'25lbs.',
		'30lbs.',
		'35lbs.',
		'40lbs.',
		'45lbs.',
		'50lbs.',
		'55lbs.'
	];
	jQuery('#weight').autocomplete({
		source: availableWeights,
		autoFocus: true
	});
});
