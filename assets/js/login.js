$(function(){
	const base_url = "http://localhost:8090/HammerContratistas/";
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
					location.href = base_url + "inicio";
				}else{
					Swal('Oops...', response['mensaje'] , 'error')
				}
				$('#form')[0].reset();
			}
		});

	})

})