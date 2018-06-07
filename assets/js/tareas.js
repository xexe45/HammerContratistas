$(function(){

		const BASE_URL = "http://localhost:8090/HammerContratistas/";

		comboServicios(BASE_URL + "Servicio");

		//Tabla de datos
	    const $table = $('#table');
	    const $rutaDefinitivia = 'http://localhost:8090/HammerContratistas/';
	    llenarTabla($table,$rutaDefinitivia);

	$('#form').on('submit', function(e){
		
		e.preventDefault();

		const method = $(this).attr('method');
		const ruta = $(this).attr('action');
		const data = $(this).serialize();

		$.ajax({
			url: ruta,
			type: method,
			data: data,
			dataType: 'json',
			beforeSend: function(){
				console.log('enviando....');
			},
			success: function(response){
				console.log(response);
				if(response['valido']){
					Swal('El sistema informa', response['mensaje'], 'success');
				}else{
					Swal('Oops...', response['mensaje'] , 'error')
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

function llenarTabla($table,rutaDefinitivia){

	$.get(rutaDefinitivia + 'Tarea', function(response){
		console.log(response);
    		
    		$(function () {
        		$table.bootstrapTable({data: response['data']});
        		$table.bootstrapTable('hideColumn','v1');
        		$table.bootstrapTable('hideColumn','v2');
        		
    		});
	},'json');
	
}