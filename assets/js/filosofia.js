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

	$('.frm-slider').on('submit', function(e){

		e.preventDefault();

		const method = $(this).attr('method');
		const ruta = $(this).attr('action');
		const formData = new FormData($(this)[0]);

		console.log(formData);

	})
})