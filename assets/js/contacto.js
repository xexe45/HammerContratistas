$(function(){

	//Tabla de datos
    const $table = $('#table');
    const $rutaDefinitivia = 'http://localhost:8090/HammerContratistas/';
    const $button = $('#button');
    llenarTabla($table,$rutaDefinitivia);

   $button.on('click', function(){
   		var selections = $table.bootstrapTable('getSelections');
   		
   		var seleccionadosSinVer = [];

   		if (selections.length > 0) {
   		
   			for(var i = 0; i < selections.length; i++){
   				if(selections[i]['v7'] == "0"){
   					seleccionadosSinVer.push(selections[i]);
   				}
   			}

   			if(seleccionadosSinVer.length == 0){
   				Swal('Oops...', 'No ha seleccionado ningún mensaje sin ver' , 'error')
   				seleccionadosSinVer = [];
   			}else{
   				$.ajax({
   					url: $rutaDefinitivia + '/Contacto/vistos',
   					type: 'post',
   					dataType: 'json',
   					data: {data: seleccionadosSinVer},
   					success: function(response){
   						console.log(response);
   						Swal('El sistema informa', response['mensaje'] , 'success')
   						$table.bootstrapTable('refresh', {
			             	url: $rutaDefinitivia + 'Contacto'
			        	});
   					}
   				});
   			}

   		}else{
   			Swal('Oops...', 'No ha seleccionado ningún mensaje' , 'error')
   		}
   });
})

function llenarTabla($table,rutaDefinitivia){
	$.get(rutaDefinitivia + 'Contacto', function(response){
		console.log(response);
    		$(function () {
        		$table.bootstrapTable({data: response['data']});
        		$table.bootstrapTable('hideColumn','v1');
    		});
	},'json');
	
}

function estadoFormatter(value) {
	var estado = "";
	if(value == 1){
		estado = "visto";
	}else if(value == 0){
		estado = "no visto";
	}
    return estado;
}


