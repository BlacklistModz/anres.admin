var $body = $('body'),
	$window = $(window),
	$doc = $('#doc'),
	theDate = new Date(),
	window_focus = true;

$(function () {

	$window.focus(function() {
	    window_focus = true;


	    console.log( window_focus );
	}).blur(function() {
	    window_focus = false;
	    console.log( window_focus );
	});

	var v={
		ELEMENT_ENGAGEMENT:"data-engaged",
		ANIMATION:"data-engaged-animation"
	};
	var u={
		TRANSLATION:"cubic-bezier(0.165, 0.840, 0.440, 1.000)",
		OPACITY:"cubic-bezier(0.42,0,0.58,1)"
	};


	$.each($('[data-engaged-animation]'), function(index, el) {

		var $this = $(this);
		var options = $.parseJSON( $this.attr('data-engaged-animation') );
		$this.attr('data-engaged-animation', '');

		console.log( options );
		$this.css({
			transform: 'translate(0px, '+ options.distance +'px)',
    		transition: 'transform '+ options.tDuration +'s cubic-bezier(0.165, 0.84, 0.44, 1) 0s, opacity 1s cubic-bezier(0.42, 0, 0.58, 1) 0s',
		});		 

		setTimeout(function () {

			$this.css({
				transform: 'none',
				'will-change': 'transform, opacity',
				opacity: 1
			});
			
		}, (options.delay+1)*1000 );
		


		// transition: transform 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) 0s, opacity 1s cubic-bezier(0.42, 0, 0.58, 1) 0s;


		// will-change: transform, opacity;

		    // transform: none;
    		// transition: transform 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) 0s, opacity 1s cubic-bezier(0.42, 0, 0.58, 1) 0s;
    		// opacity: 1;
	});


	$window.scroll(function(event) {
		
		
		$('section')
	});


	/*transform: none; 
	transition: transform 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) 0s, opacity 1s cubic-bezier(0.42, 0, 0.58, 1) 0s; 
	opacity: 1;
*/
	// alert( window_focus );

	$('[title]').tooltip({
		// reload: 400,
		overflow: {
			Y: 'Above'
		}
	});
});