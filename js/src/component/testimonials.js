// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// grab the testimonials
	$( '.testimonials-inner' ).each(function(){
		var testimonials = $( this );

		// set auto-rotate timer var so that it exists.
		var auto_rotate = 0;

		// count the slides
		var quote_count = testimonials.find( '.quote' ).size();

		// if it exists
		if ( typeof( testimonials ) !== 'undefined' ) {

			// grab the first slide
			var first_quote = testimonials.find( '.quote.visible' );
			
			// function to switch to the next side.
			var next_quote = function() {

				// get current and next slide objects
				var current_quote = get_current_quote();
				var next_quote = current_quote.next( '.quote' );
                console.log( next_quote );

				// if next slide doesn't exist, go back to the first
				if ( !next_quote.length ) {
					next_quote = first_quote;
				}

				// switch the slides
				current_quote.removeClass( 'visible' );
				next_quote.addClass( 'visible' );

			};

			// grab the current slide
			var get_current_quote = function(){
				return testimonials.find( '.quote.visible' );
			};

			// set testimonials initial height when the first image is loaded.
			setTimeout( function() {
				// once we're loaded up, set a timer to auto-rotate the slides.
				if ( quote_count > 1 ) {
					auto_rotate = setInterval( next_quote, 10000 );
				}
			}, 500 );

		}

	});

});

