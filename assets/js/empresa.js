$(function(){

	var file = $('#file');
	var img = $('#imagen');
	var logo = $('#milogo');
	var BASE = "http://localhost:8090/HammerContratistas/";

	$('#form').on('submit', function(e){
			
			e.preventDefault();

			const metodo = $(this).attr('method');
			const ruta = $(this).attr('action');
			const data = $(this).serialize();
			

			$.ajax({
				url : ruta,
				type: metodo,
				dataType: 'json',
				data: data,
				beforeSend: function(){
					console.log('enviando');
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
	});

	$('#form-logo').on('submit', function(e){
			
			e.preventDefault();

			const metodo = $(this).attr('method');
			const ruta = $(this).attr('action');
			const formData = new FormData($('#form-logo')[0]);

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
						logo.attr('src',BASE + "assets/imgs/" + response['path']);
						$('#exampleModal').modal('hide');

					}else{
						Swal('Oops...', response['mensaje'] , 'error')
					}
				}
			});
	});

	file.on('change', function(e){
		console.log(e.target.files[0]);
		 let fileReader = new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = (e)=>{
             var image = e.target.result;
             	img.attr('src',image);
            }
	})
})