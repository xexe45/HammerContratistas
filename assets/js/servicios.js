$(function(){

	//Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = 'http://localhost:8090/HammerContratistas/';
    llenarTabla($table,$rutaDefinitivia);


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
						$('#form')[0].reset();
						$table.bootstrapTable('refresh', {
			             	url: $rutaDefinitivia + 'Servicio'
			        	});
					}else{
						Swal('Oops...', response['mensaje'] , 'error');
					}
				}
			});
	});

})

function llenarTabla($table,rutaDefinitivia){
	$.get(rutaDefinitivia + 'Servicio', function(response){
		console.log(response);
    		
    		$(function () {
        		$table.bootstrapTable({data: response['data']});
        		$table.bootstrapTable('hideColumn','v1');
    		});
	},'json');
	
}

function imageFormatter(value, row){
 	let r =  "http://localhost:8090/HammerContratistas/assets/imgs/servicios/" + value;
 	return '<img class="img-fluid" src="'+r+'" />';
}