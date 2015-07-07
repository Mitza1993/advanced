$(document).ready(function(){
<<<<<<< HEAD
	$(".has-datepickeru").datepicker(
		{
			dateFormat:"yy-mm-dd",
			minDate: 0
		}
	);
	$(".has-datepicker").datepicker(
		{
			dateFormat:"yy-mm-dd",
			
=======
	$(".has-datepicker").datepicker(
		{
			dateFormat:"yy-mm-dd",
			minDate: 0
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
		}
	);
})


$("#formular-rapoarte").on('submit', function(e) {
	e.preventDefault();

	var dates = $(this).serialize();
	// console.log($(this).serialize());
	$.ajax({
	  method: "POST",
	  dataType: 'JSON',
	  url: "/raport/get-raport",
	  data: dates
	})
  	.done(function(result) {
<<<<<<< HEAD
  		 console.log(result);

  		var suma_datorata = 0, suma_acordata = 0, suma_primita = 0, suma_de_primit = 0, html = '', raportData = result;
  		var suma_comisioane=0;
=======
  		// console.log(result);

  		var suma_datorata = 0, suma_acordata = 0, suma_primita = 0, suma_de_primit = 0, html = '', raportData = result;

>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
  		$.ajax({
  			method: "POST",
  			dataType: 'JSON',
  			url: "/raport/get-suma",
  			data: dates
  		}).done(function(result) {

	  		$.each(result, function(index, data) {
<<<<<<< HEAD
	  			
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
	  			suma_datorata += parseFloat(data.suma_datorata);
	  			suma_acordata += parseFloat(data.suma_acordata);
	  		});


	  		$.each(raportData, function(index, data) {
<<<<<<< HEAD
	  			if(data.tip_tranzactie != 'Prelungire'){
	  			suma_primita += parseFloat(data.suma_primita);
	  		}
	  		else
	  		{
	  			suma_comisioane += parseFloat(data.suma_primita);
	  		}
=======
	  			suma_primita += parseFloat(data.suma_primita);
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
	  		});

	  		suma_de_primit = suma_datorata - suma_primita;

<<<<<<< HEAD
	  		var one = suma_de_primit.toFixed(2);

	  		html += '<tr>';
	        html += '	<td>'+suma_primita+'</td>';
	        html += '	<td>'+suma_acordata+'</td>';
	        html += '	<td>'+one+'</td>';
	        html += '	<td>'+suma_comisioane+'</td>';
=======
	  		html += '<tr>';
	        html += '	<td>'+suma_primita+'</td>';
	        html += '	<td>'+suma_acordata+'</td>';
	        html += '	<td>'+suma_de_primit+'</td>';
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
	      	html += '</tr>';

	      	$("#raport-results-table").html(html);  			
  		})


  	});
});

$("#formular-produse").on('submit',function(e)
{
	e.preventDefault();
	var datas = $(this).serialize;
	$.ajax({
		method:"POST",
		dataType:"JSON",
		url:"/raport/get-produse",
		data:datas
	})
	.done(function(result)
	{
		var counter1=0,counter2=0,counter3=0,html="";
		$.each(result, function(index, data) {
			if(data.situatie=='vandut')
			{
				counter1++;
			}
			if(data.situatie=='in stoc')
			{
				counter2++;
			}
			if(data.situatie=='amanetare')
			{
				counter3++;
			}

		});
		html += '<tr>';
        html += '	<td>'+counter2+'</td>';
        html += '	<td>'+counter1+'</td>';
        html += '	<td>'+counter3+'</td>';
      	html += '</tr>';
		$("#produse-results-table").html(html); 
	});
});




$("#formular-vanzari").on('submit', function(e) {
	e.preventDefault();

	var dates = $(this).serialize();
	// console.log($(this).serialize());
	$.ajax({
	  method: "POST",
	  dataType: 'JSON',
	  url: "/raport/get-vanzari",
	  data: dates
	})
  	.done(function(result) {
  		// console.log(result);

  		var suma_vanzari = 0, suma_cumparari = 0, html = '';

  		$.each(result, function(index, data) {
  			if(data.tip_tranzactie == 'Vanzare') {
<<<<<<< HEAD
  				console.log(data.suma_contractata);
=======
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
				suma_vanzari += parseFloat(data.suma_contractata);
  			}

  			if(data.tip_tranzactie == 'Cumparare') {
  				suma_cumparari += parseFloat(data.suma_contractata);
  			}
  		});

  		html += '<tr>';
        html += '	<td>'+suma_vanzari+' lei'+'</td>';
        html += '	<td>Vanzari</td>';
      	html += '</tr>';

  		html += '<tr>';
        html += '	<td>'+suma_cumparari+' lei'+'</td>';
        html += '	<td>Cumparari</td>';
      	html += '</tr>';

      	$("#vanzari-results-table").html(html);  			

  	});
})

$(document).ready(function(){
	$('input[name="option"]').on('change', function(){
		var situatie = $(this).val();
		$.ajax({
		  method: "POST",
		  dataType: 'JSON',
		  url: "/produse/index",
		  data: { situatie: situatie }
		})
	  	.done(function(result) {
	  		console.log(result);
	  		$(".partial_index_container").html(result.html);

<<<<<<< HEAD
	  		if(result.are==0)
	  		{
	  			$('.amanetare').hide();
	  		}
	  		if(result.actions == 0) {

=======
	  		if(result.actions == 0) {
>>>>>>> 1c9fa1dd40a0dbe2d794753bdcd615754b65fea0
	  			$("tr th:nth-of-type(5), tr td:nth-of-type(5)").hide();
	  		}

	  		if(result.hasDelete == 0) {
	  			$("td a:nth-of-type(3)").hide();
	  		}
	  	});
	})
})
