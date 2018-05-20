$(function(){
	
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
					}else{
						Swal('Oops...', response['mensaje'] , 'error')
					}
				}
			});
	});
})