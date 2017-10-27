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

	// Form Event
	var is_annual = $( 'input[name="is_annual"]:checked' ).val();
	if ( is_annual == 1 ) {
		$( '#begin_date_year' ).prop( 'disabled', true );
		$( '#begin_date_year' ).selectpicker( 'refresh' );
		$( '#end_date_year' ).prop( 'disabled', true );
		$( '#end_date_year' ).selectpicker( 'refresh' );
	}
	$( 'input[name="is_annual"]' ).change( function() {
		var is_annual = $( 'input[name="is_annual"]:checked' ).val();
		if ( is_annual == 1 ) {
			$( '#begin_date_year' ).prop( 'disabled', true );
			$( '#begin_date_year' ).selectpicker( 'refresh' );
			$( '#end_date_year' ).prop( 'disabled', true );
			$( '#end_date_year' ).selectpicker( 'refresh' );
		}
		else {
			$( '#begin_date_year' ).prop( 'disabled', false );
			$( '#begin_date_year' ).selectpicker( 'refresh' );
			$( '#end_date_year' ).prop( 'disabled', false );
			$( '#end_date_year' ).selectpicker( 'refresh' );
		}
	});

	var begin_month = $( '#begin_date_month' ).val();
	if ( begin_month == 2 ) {
		$( '#begin_date_day' ).find( 'option[value="29"]' ).prop( 'disabled', true );
		$( '#begin_date_day' ).find( 'option[value="30"]' ).prop( 'disabled', true );
		$( '#begin_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		$( '#begin_date_day' ).selectpicker( 'refresh' );
	}
	else if ( begin_month == 4 || begin_month == 6 || begin_month == 9 || begin_month == 11 ) {
		$( '#begin_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		$( '#begin_date_day' ).selectpicker( 'refresh' );
	}
	$( '#begin_date_month' ).change( function() {
		var begin_month = $( '#begin_date_month' ).val();
		if ( begin_month == 2 ) {
			$( '#begin_date_day' ).find( 'option[value="29"]' ).prop( 'disabled', true );
			$( '#begin_date_day' ).find( 'option[value="30"]' ).prop( 'disabled', true );
			$( '#begin_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		}
		else if ( begin_month == 4 || begin_month == 6 || begin_month == 9 || begin_month == 11 ) {
			$( '#begin_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		}
		else {
			$( '#begin_date_day' ).find( 'option[value="29"]' ).prop( 'disabled', false );
			$( '#begin_date_day' ).find( 'option[value="30"]' ).prop( 'disabled', false );
			$( '#begin_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', false );
		}
		$( '#begin_date_day' ).selectpicker( 'refresh' );
	});

	var end_month = $( '#end_date_month' ).val();
	if ( end_month == 2 ) {
		$( '#end_date_day' ).find( 'option[value="29"]' ).prop( 'disabled', true );
		$( '#end_date_day' ).find( 'option[value="30"]' ).prop( 'disabled', true );
		$( '#end_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		$( '#end_date_day' ).selectpicker( 'refresh' );
	}
	else if ( end_month == 4 || end_month == 6 || end_month == 9 || end_month == 11 ) {
		$( '#end_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		$( '#end_date_day' ).selectpicker( 'refresh' );
	}
	$( '#end_date_month' ).change( function() {
		var end_month = $( '#begin_date_month' ).val();
		if ( end_month == 2 ) {
			$( '#end_date_day' ).find( 'option[value="29"]' ).prop( 'disabled', true );
			$( '#end_date_day' ).find( 'option[value="30"]' ).prop( 'disabled', true );
			$( '#end_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		}
		else if ( end_month == 4 || end_month == 6 || end_month == 9 || end_month == 11 ) {
			$( '#end_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', true );
		}
		else {
			$( '#end_date_day' ).find( 'option[value="29"]' ).prop( 'disabled', false );
			$( '#end_date_day' ).find( 'option[value="30"]' ).prop( 'disabled', false );
			$( '#end_date_day' ).find( 'option[value="31"]' ).prop( 'disabled', false );
		}
		$( '#end_date_day' ).selectpicker( 'refresh' );
	});

	

	// Ajax
	$( '#form-event' ).submit( function(e) {
		e.preventDefault();
		
		var begin_day = $( '#begin_date_day' ).find( 'option:selected' ).prop( 'disabled' );
		var end_day   = $( '#end_date_day' ).find( 'option:selected' ).prop( 'disabled' );
		if ( begin_day == true || end_day == true ) {
			$( '#ajax' ).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Erreur lors de la sauvegarde :</strong> Date incorrecte.</div>');
			return;
		}

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