$(function(){
	const $rutaDefinitivia = window.location.href;
	const $btn1 = $('#btn1');
	const $btn2 = $('#btn2');

	$('#chartContainer, #chartContainer2').hide();

	$btn1.on('click', function(){
		$.ajax({
		url: $rutaDefinitivia + '/registros',
		type: 'get',
		data: {},
		dataType: 'json',
		success: function(response){
			$('#chartContainer').show();
			$btn1.hide();
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: "Comparativa Registros - Ediciones"
				},
				data: [{
					type: "pie",
					startAngle: 240,
					yValueFormatString: "##0.00\"%\"",
					indexLabel: "{label} {y}",
					dataPoints: response
				}]
			});
			chart.render();
		}
	});
	})
	
	$btn2.on('click', function(){
		$.ajax({
		url: $rutaDefinitivia + '/iteracciones',
		type: 'get',
		data: {},
		dataType: 'json',
		success: function(response){
			console.log(response);
			$('#chartContainer2').show();
			$btn2.hide();
			var chart = new CanvasJS.Chart("chartContainer2", {
				animationEnabled: true,
				theme: "light2", // "light1", "light2", "dark1", "dark2"
				title:{
					text: "Iteracciones por mes"
				},
				axisY: {
					title: "Iteracciones"
				},
				data: [{        
					type: "column",  
					showInLegend: true, 
					legendMarkerColor: "grey",
					legendText: "Meses",
					dataPoints: response
				}]
			});
			chart.render();
		}
	});
	})

	
	

	
})