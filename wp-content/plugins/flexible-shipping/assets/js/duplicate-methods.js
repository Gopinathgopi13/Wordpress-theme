function fs_add_duplicate_field() {
	setTimeout( function () {
		jQuery( '.wc-shipping-zone-method-type' ).filter( function () {
			return jQuery( this ).text() === fs_duplicate_methods.shipping_method;
		} ).each( function () {
			let row = jQuery( this ).closest( 'tr' );

			if ( row.find( '.js--duplicate-button' ).length > 0 ) {
				return;
			}

			let instance_id = parseInt( new URL( row.find( 'a.wc-shipping-zone-method-settings' ).attr( 'href' ), window.location.origin ).searchParams.get( fs_duplicate_methods.param_name ), 10 );
			let row_actions = row.find( '.row-actions' );
			let duplicate_url = new URL( fs_duplicate_methods.duplicate_url );
			duplicate_url.searchParams.append( fs_duplicate_methods.param_name, instance_id );
			let duplicate = ' | <a href="' + duplicate_url + '" class="js--duplicate-button">' + fs_duplicate_methods.duplicate_label + '</a>';

			row_actions.append( duplicate );
		} );
	}, 10 );
}

fs_add_duplicate_field();

document.querySelector( '.wc-shipping-zone-method-rows' ).addEventListener( 'DOMNodeInserted', function ( event ) {
	fs_add_duplicate_field();
}, false );

function fs_add_duplicate_field_on_react() {
	setTimeout( function () {
		jQuery( '.wc-shipping-zone-method-description' ).filter( function () {
			return jQuery( this ).text().includes( fs_duplicate_methods.shipping_method );
		} ).each( function () {
			let row = jQuery( this ).closest( 'tr' );

			if ( row.find( '.js--duplicate-button' ).length > 0 ) {
				return;
			}

			let instance_id = parseInt( row.data( 'id' ) );
			let div_actions = row.find( '.wc-shipping-zone-actions' ).find( 'div' );
			let duplicate_url = new URL( fs_duplicate_methods.duplicate_url );
			duplicate_url.searchParams.append( fs_duplicate_methods.param_name, instance_id );
			let duplicate = ' | <a href="' + duplicate_url + '" class="js--duplicate-button">' + fs_duplicate_methods.duplicate_label + '</a>';

			div_actions.append( duplicate );
		} );
	}, 10 );
}

fs_add_duplicate_field_on_react();

document.querySelector( '.wc-shipping-zone-method-rows' ).addEventListener( 'DOMNodeInserted', function ( event ) {
	fs_add_duplicate_field_on_react();
}, false );
