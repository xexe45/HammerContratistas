$(function(){

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

	$('#form-slides').on('submit', function(e){

		e.preventDefault();

		const method = $(this).attr('method');
		const ruta = $(this).attr('action');
		const formData = new FormData($('#form-slides')[0]);

		$.ajax({
				url : ruta,
				type: method,
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
						$('#form-slides')[0].reset();
					}else{
						Swal('Oops...', response['mensaje'] , 'error')
					}
				}
			});
		

	})
})