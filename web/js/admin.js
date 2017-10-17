jQuery(document).ready( function() {
	$( 'button.refresh' ).click( function() {
	    location.reload();
	});
	$( '[data-toggle="tooltip"]' ).tooltip();

	// DataTables
	$( '.table-data' ).DataTable({
		"dom": '<"dataTables_header" lf>t<"text-center" p>',
		"lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "Tout" ] ],
		"language": {
			"decimal":        "",
			"emptyTable":     "Aucune donnée",
			"info":           "_TOTAL_ entrées affichées",
			"infoEmpty":      "Aucune donnée",
			"infoFiltered":   "(filtrés parmi _MAX_ entrées)",
			"infoPostFix":    "",
			"thousands":      " ",
			"lengthMenu":     "Monter _MENU_ entrées",
			"loadingRecords": "Chargement...",
			"processing":     "Traitement...",
			"search":         "",
			"zeroRecords":    "Aucune donnée trouvée",
			"paginate": {
				"first":      "Premier",
				"last":       "Dernier",
				"next":       "&raquo;",
				"previous":   "&laquo;"
			},
			"aria": {
				"sortAscending":  " : trier de manière croissante",
				"sortDescending": " : trier de manière décroissante"
			}
		}
	});
	$( '.dataTables_filter' ).each( function() {
		$( this ).addClass( 'form-group' );
		$( this ).append( '<div class="input-group"></div>' );

		var input = $( this ).find( 'input' );
		$( this ).find( '.input-group' ).append( input );
		$( this ).find( 'label' ).detach();
		$( this ).find( '.input-group' ).append( '<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>' );

		input.addClass( 'form-control' );
		input.attr( 'placeholder', 'Rechercher dans le tableau' );
	});
	$( '.dataTables_length' ).each( function() {
		$( this ).find( 'select' ).addClass( 'form-control' );
	});
	$( '.dataTables_paginate' ).each( function() {
		var prevButton = $( this ).find( '.previous' );
		$( this ).addClass( 'btn-group' );
		$( this ).find( 'a' ).each( function() {
			$( this ).addClass( 'btn btn-default' );
			$( this ).insertBefore( prevButton );
		});
		$( this ).find( 'span' ).detach();
		prevButton.prependTo( this );
	});
	$( '.table-data' ).on( 'draw.dt', function () {
		$( this ).find( '.dataTables_paginate' ).hide();
		setTimeout( function(){
			$( '.dataTables_paginate' ).each( function() {
				var prevButton = $( this ).find( '.previous' );
				$( this ).addClass( 'btn-group' );
				$( this ).find( 'a' ).each( function() {
					$( this ).addClass( 'btn btn-default' );
					$( this ).insertBefore( prevButton );
				});
				$( this ).find( 'span' ).detach();
				prevButton.prependTo( this );
			});
			$( '.dataTables_paginate' ).show();
		}, 1 );
	} );

	// Tabs
	$( '#tabs-event a' ).click( function (e) {
		e.preventDefault()
		$( this ).tab( 'show' );
	});

	// Form Location
	var continent_value = $( '#continent' ).val();
	if ( continent_value == 'Monde' ) {
		$( '#country' ).find( '.optgroup-erasia' ).prop( 'disabled', true );
		$( '#country' ).find( '.optgroup-midgard' ).prop( 'disabled', true );
	}
	else if ( continent_value == 'Érasia' ) {
		$( '#country' ).find( '.optgroup-erasia' ).prop( 'disabled', false );
		$( '#country' ).find( '.optgroup-midgard' ).prop( 'disabled', true );
	}
	else if ( continent_value == 'Midgard' ) {
		$( '#country' ).find( '.optgroup-erasia' ).prop( 'disabled', true );
		$( '#country' ).find( '.optgroup-midgard' ).prop( 'disabled', false );
	}
	$( '#continent' ).change( function() {
		var continent_value = $( this ).val();
		if ( continent_value == 'Monde' ) {
			$( '#country' ).find( '.optgroup-erasia' ).prop( 'disabled', true );
			$( '#country' ).find( '.optgroup-midgard' ).prop( 'disabled', true );
		}
		else if ( continent_value == 'Érasia' ) {
			$( '#country' ).find( '.optgroup-erasia' ).prop( 'disabled', false );
			$( '#country' ).find( '.optgroup-midgard' ).prop( 'disabled', true );
		}
		else if ( continent_value == 'Midgard' ) {
			$( '#country' ).find( '.optgroup-erasia' ).prop( 'disabled', true );
			$( '#country' ).find( '.optgroup-midgard' ).prop( 'disabled', false );
		}
		$( '#country' ).selectpicker( 'val', '' );
	});

	// Ajax
	$( '#form-event' ).submit( function(e) {
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url:  $( this ).attr( 'action' ),
			data: $( this ).serialize(),
			success: function( data ) {
				if ( data.substring( 0, 4 ) == 'http' ) {
					window.location.href = data;
				}
				else {
					$( '#ok-save' ).hide();
					$( '#ajax' ).html( data );
				}
			}
		});
		
	});
});