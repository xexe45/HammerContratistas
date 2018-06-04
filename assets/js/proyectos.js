$(function(){

	const BASE_URL = "http://localhost:8090/HammerContratistas/";

	comboServicios(BASE_URL + "Servicio");
	comboClientes(BASE_URL + "Clientes");

	$("#cliente_id").tokenInput(BASE_URL + "Clientes/buscar", {
        theme: "facebook",
        tokenLimit: 1
    });

	$('#form').on('submit', function(e){

		e.preventDefault();

		const metodo = $(this).attr('method');
		const ruta = $(this).attr('action');
		const formData = new FormData($('#form')[0]);

		$.ajax({
			url : ruta,
			type: metodo,
			data: formData,
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){
				console.log('enviando');
			},
			success: function(response){
				console.log(response);
				
				if(response['valido']){
					
					Swal('El sistema informa', response['mensaje'], 'success');
						$("#cliente_id").tokenInput("clear");
						$('#form')[0].reset();
					}else{
						Swal('Oops...', response['mensaje'] , 'error');
					}
				}
			});
	})

})

function comboServicios(ruta){

	$.ajax({
		url: ruta,
		type: 'get',
		dataType: 'json',
		success: function(response){

			console.log(response);
			var options = "<option value=''>Seleccionar Servicio...</option>";

			for(var i = 0; i < response['data'].length; i++){
				options += "<option value='"+response['data'][i]['v1']+"'>"+ response['data'][i]['v2'] +"</option>";
			}

			$('#servicio_id').html(options);

		}
	});

}

function comboClientes(ruta){

	$.ajax({
		url: ruta,
		type: 'get',
		dataType: 'json',
		success: function(response){

			console.log(response);
			var options = "<option value=''>Seleccionar Cliente...</option>";

			for(var i = 0; i < response['data'].length; i++){
				options += "<option value='"+response['data'][i]['v1']+"'>"+ response['data'][i]['v2'] +"</option>";
			}

			$('#cliente_id').html(options);
			
		}
	});

}