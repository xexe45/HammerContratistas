$(function(){

	//Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = 'http://localhost:8090/HammerContratistas/';
  
    const $clientes = $('#btn-clientes');

    $table.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $clientes.on('click', function(){
      llenarTabla($table,$rutaDefinitivia);
      $table.show();
      $(this).hide();
    })

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
						$table.bootstrapTable('refresh', {
			             	url: $rutaDefinitivia + 'Clientes'
			        	});
						$('#form')[0].reset();
					}else{
						Swal('Oops...', response['mensaje'] , 'error')
					}
				}
			});
	});
})

function llenarTabla($table,rutaDefinitivia){
	$.get(rutaDefinitivia + 'Clientes', function(response){
		console.log(response);
    		$(function () {
        		$table.bootstrapTable({data: response['data']});
        		$table.bootstrapTable('hideColumn','v1');
    		});
	},'json');
	
}

function imageFormatter(value, row){
 	let r =  "http://localhost:8090/HammerContratistas/assets/imgs/customers/" + value;
 	return '<img width="200" class="img-fluid" src="'+r+'" />';
}

function isValidURL(u){
    
    elm = document.createElement('input');
    elm.setAttribute('type', 'url');
  
  	elm.value = u;
  	return elm.validity.valid;
}