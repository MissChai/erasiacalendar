jQuery(document).ready(function(){
	var months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
	
	// On initialise au mois en cours
	$('.month').hide();
	var current_date = new Date();
	var current_year = current_date.getFullYear();
	var smallest_year = current_date.getFullYear();
	var bigest_year = current_date.getFullYear() + 2;
	var current_month = current_date.getMonth() + 1;
	var current = '#' + current_year + '-' + current_month;
	$(current).show();
	$('.years a#' + current_year).addClass('active');
	$('.months a#' + current_month).addClass('active');

	// On actualise à l'année voulue
	$('.years a').click(function() {
		var year = $(this).attr('id');
		if (year != current_year)
		{
			var change = '#' + year + '-' + current_month;
			$(current).slideUp();
			$(change).slideDown();
			
			$('.years a#' + year).addClass('active');
			$('.years a#' + current_year).removeClass('active');
			
			$('#current .current-year').text(year);
			current = '#' + year + '-' + current_month;
			current_year = year;
		}
	});
	
	// On actualise au mois voulu
	$('.months a').click(function() {
		var month = $(this).attr('id');
		if (month != current_month)
		{
			var change = '#' + current_year + '-' + month;
			$(current).slideUp();
			$(change).slideDown();
			
			$('.months a#' + month).addClass('active');
			$('.months a#' + current_month).removeClass('active');
			
			$('#current .current-month').text(months[month - 1]);
			current = '#' + current_year + '-' + month;
			current_month = month;
		}
	});
	
	// On passe au mois pécédent	
	$('#prev').click(function() {
		if (!((current_year == smallest_year) && (current_month == 1)))
		{
			if (current_month == 1) 
			{
				var month = 12;
				var year = parseFloat(current_year) - 1;
				var change = '#' + year + '-' + month;
				$(current).slideUp();
				$(change).slideDown();
			
				$('.months a#' + month).addClass('active');
				$('.months a#' + current_month).removeClass('active');
				$('.years a#' + year).addClass('active');
				$('.years a#' + current_year).removeClass('active');
							
				$('#current .current-month').text(months[month - 1]);
				current = '#' + current_year + '-' + month;
				current_month = month;
				$('#current .current-year').text(year);
				current = '#' + year + '-' + current_month;
				current_year = year;
			} 
			else
			{
				var month = parseFloat(current_month) - 1;
				var change = '#' + current_year + '-' + month;
				$(current).slideUp();
				$(change).slideDown();
			
				$('.months a#' + month).addClass('active');
				$('.months a#' + current_month).removeClass('active');
			
				$('#current .current-month').text(months[month - 1]);
				current = '#' + current_year + '-' + month;
				current_month = month;
			}
		}
	});
	
	// On passe au mois suivant
	$('#next').click(function() {
		if (!((current_year == bigest_year) && (current_month == 12)))
		{
			if (current_month == 12) 
			{
				var month = 1;
				var year = parseFloat(current_year) + 1;
				var change = '#' + year + '-' + month;
				$(current).slideUp();
				$(change).slideDown();
			
				$('.months a#' + month).addClass('active');
				$('.months a#' + current_month).removeClass('active');
				$('.years a#' + year).addClass('active');
				$('.years a#' + current_year).removeClass('active');
							
				$('#current .current-month').text(months[month - 1]);
				current = '#' + current_year + '-' + month;
				current_month = month;
				$('#current .current-year').text(year);
				current = '#' + year + '-' + current_month;
				current_year = year;
			} 
			else
			{
				var month = parseFloat(current_month) + 1;
				var change = '#' + current_year + '-' + month;
				$(current).slideUp();
				$(change).slideDown();
			
				$('.months a#' + month).addClass('active');
				$('.months a#' + current_month).removeClass('active');
			
				$('#current .current-month').text(months[month - 1]);
				current = '#' + current_year + '-' + month;
				current_month = month;
			}
		}		
	});	

	// Affichage de la description des events
	$('.month ul.events li .desc').hide();
	$('.month ul.events li .title').hover(function() {
		jQuery(this).next(".desc").slideToggle("fast");
	});
});