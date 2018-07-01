function ejecutar(){

	//Tabla de datos
	const $table = $('#table');	    
    //llenarTabla($table,$rutaDefinitivia);
    const $clientes = $('#btn-clientes');

    $table.hide();
    //llenarTabla($table,$rutaDefinitivia);

    $clientes.on('click', function(){
      $.get($r + 'Usuario', function(response){
		console.log(response);
    		
    		$(function () {
        		$table.bootstrapTable({data: response['data']});
        		$table.bootstrapTable('hideColumn','v1');  		
    		});
	},'json');
      $table.show();
      $(this).hide();
    })
    
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
			             url: $r + 'Usuario'
			        });
				}else{
					Swal('Oops...', response['mensaje'] , 'error')
				}
			}
		});

	})

}
	