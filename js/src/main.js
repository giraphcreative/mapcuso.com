

// onload responsive footer and menu stuff
jQuery(document).ready(function($){


	// remove height and width from images inside
	var fluid_images = $( '.content img' );
	fluid_images.removeAttr( 'width' ).removeAttr( 'height' );


	// show/hide menus when they click the toggler
	var header = $( 'header' );
	var menu_toggle = header.find( '.menu-toggle' );
	var menu = header.find( 'nav' );
	menu_toggle.click(function(){

		// show/hide the main menu
		menu.toggle();

	});
	// when user clicks a link in the menu, open submenu if it exists.
	menu.find( '>ul>li>a' ).click(function(){
		var parent_li = $( this ).parent( 'li' );
		var submenu = $( this ).next( '.submenu' );
		if ( !submenu.is( ':visible' ) && !parent_li.hasClass('no-submenu') ) {
			event.preventDefault();
			parent_li.addClass( 'open' );
		}
	});

	// couple of quick bindings for magnific popup
	$( '.lightbox-iframe' ).magnificPopup({ 'type': 'iframe' });
	$( '.lightbox' ).magnificPopup({ 'type': 'image' });


});

