$(function(){
	const BASE_URL = "http://localhost:8090/HammerContratistas/";
	//Tabla de datos
	const $table = $('#table');
    const $rutaDefinitivia = 'http://localhost:8090/HammerContratistas/';	    llenarTabla($table,$rutaDefinitivia);
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
					$('#form')[0].reset();
					$table.bootstrapTable('refresh', {
			             url: $rutaDefinitivia + 'Usuario'
			        });
				}else{
					Swal('Oops...', response['mensaje'] , 'error')
				}
			}
		});

	})

})

function llenarTabla($table,rutaDefinitivia){

	$.get(rutaDefinitivia + 'Usuario', function(response){
		console.log(response);
    		
    		$(function () {
        		$table.bootstrapTable({data: response['data']});
        		$table.bootstrapTable('hideColumn','v1');  		
    		});
	},'json');
	
}