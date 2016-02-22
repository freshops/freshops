jQuery(document).ready(function() {
	jQuery('#variety').one('focus', function() {
		jQuery('#variety').parent().after(''); // eliminates inserted block
	});
	var $variety, $weight; // initialize values
	$variety = '';
	$weight = '';
	//update values in the live preview whenever a key is pressed in either field
	jQuery('#variety').keyup(function() {
		$variety = jQuery(this).val();
		$variety = $variety.replace(/\n/g, '<br />').replace(/\n\n+/g, '<br /><br />').replace(/(<\/?)script/g, '$1noscript');
		jQuery('#variety-output').html($variety);
	});

	jQuery('#weight').keyup(function() {
		$weight = jQuery(this).val();
		$weight = $weight.replace(/\n/g, '<br />').replace(/\n\n+/g, '<br /><br />').replace(/(<\/?)script/g, '$1noscript');
		jQuery('#weight-output').html($weight);
	});

	//Update the live preview for non-keyboard (i.e. mouse or touch) input selections
	jQuery('.ui-autocomplete').click(function() {
		jQuery('#variety').keyup();
	});

	jQuery('.ui-autocomplete').click(function() {
		jQuery('#weight-output').keyup();
	});
});

jQuery(function() {
	var availableWeights = [
	'2 oz.',
	'3 oz.',
	'4 oz.',
	'5 oz.',
	'6 oz.',
	'8 oz.',
	'10 oz.',
	'12 oz.',
	'14 oz.',
	'1 lb.',
	'1 lb. 2 oz.',
	'1 lb. 4 oz.',
	'1 lb. 6 oz.',
	'1 lb. 8 oz.',
	'1 lb. 10 oz.',
	'1 lb. 12 oz.',
	'1 lb. 14 oz.',
	'2 lbs.',
	'2 lbs. 2 oz.',
	'2 lbs. 4 oz.',
	'2 lbs. 6 oz.',
	'2 lbs. 8 oz.',
	'2 lbs. 10 oz.',
	'2 lbs. 12 oz.',
	'2 lbs. 14 oz.',
	'3 lbs.',
	'3 lbs. 2 oz.',
	'3 lbs. 4 oz.',
	'3 lbs. 6 oz.',
	'3 lbs. 8 oz.',
	'3 lbs. 10 oz.',
	'3 lbs. 12 oz.',
	'3 lbs. 14 oz.',
	'4 lbs.',
	'4 lbs. 2 oz.',
	'4 lbs. 4 oz.',
	'4 lbs. 6 oz.',
	'4 lbs. 8 oz.',
	'4 lbs. 10 oz.',
	'4 lbs. 12 oz.',
	'4 lbs. 14 oz.',
	'5 lbs.',
	'5 lbs. 2 oz.',
	'5 lbs. 4 oz.',
	'5 lbs. 6 oz.',
	'5 lbs. 8 oz.',
	'5 lbs. 10 oz.',
	'5 lbs. 12 oz.',
	'5 lbs. 14 oz.',
	'6 lbs.',
	'6.5 lbs.',
	'7 lbs.',
	'7.5 lbs.',
	'8 lbs.',
	'8.5 lbs.',
	'9 lbs.',
	'9.5 lbs.',
	'10 lbs.',
	'10.5 lbs.',
	'11 lbs.',
	'11.5 lbs.',
	'12 lbs.',
	'12.5 lbs.',
	'13 lbs.',
	'13.5 lbs.',
	'14 lbs.',
	'14.5 lbs.',
	'15 lbs.',
	'15.5 lbs.',
	'16 lbs.',
	'16.5 lbs.',
	'17 lbs.',
	'17.5 lbs.',
	'18 lbs.',
	'18.5 lbs.',
	'19 lbs.',
	'19.5 lbs.',
	'20 lbs.',
	'20.5 lbs.',
	'21 lbs.',
	'22 lbs.',
	'23 lbs.',
	'24 lbs.',
	'25 lbs.',
	'30 lbs.',
	'35 lbs.',
	'40 lbs.',
	'45 lbs.',
	'50 lbs.',
	'55 lbs.'
	];
	jQuery( '#weight' ).autocomplete({
		source: availableWeights,
		autoFocus: true
	});
});
