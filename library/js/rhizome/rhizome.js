jQuery(document).ready(function($) {
	
	'use strict';
	
	//----------------------------------------------------------------------
	
	;(function() {
		
		// https://github.com/ftlabs/fastclick
		FastClick.attach(document.body);
		
	}());
	
	//----------------------------------------------------------------------
	
	;(function() {
		
		$('#menu').meanmenu({
			meanScreenWidth: '640',
			meanRemoveAttrs: true
		});
		
	}());
	
	//----------------------------------------------------------------------
	
	;(function() {
		
		var $order = $('#order');
		if ($order.length) {
			
			$order.click(function($e) {
				
				$e.preventDefault();
				
				$order.children('ul').animate({
					opacity: 'toggle',
					height: 'toggle',
					speed: 'slow'
				});
				
			});
			
		}
		
	}());
	
	//----------------------------------------------------------------------
	
	;(function() {
		
		// https://github.com/albertedevigo/dcjqaccordion
		$('#menu > ul')
			.on('click', 'a', function() {
				
				// Remove active link styles after click:
				$(this).blur();
				
			})
			.dcAccordion({
				eventType: 'click',
				autoClose: true,
				saveState: true,
				disableLink: true,
				speed: 'fast'
			});
		
		var $tabs = $('.tabs div');
		if ($tabs.length > 0) {
			
			$tabs.nutshell();
			
		}
		
	}());
	
});
