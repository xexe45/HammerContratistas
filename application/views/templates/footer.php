<footer>
		<section class="container pie">
			<div class="row">
				<div class="col-md-4">
					 <img src="<?=base_url()?>assets/imgs/logo.jpg" width="70" height="70" alt="">
				</div>
				<div class="col-md-4 text-center derechos">
					®2018, DERECHOS RESERVADOS 
				</div>
				<div class="col-md-4 infos">
					<p class="parr">Tel. 963956610 /proyectos@hammer.com.pe</p>
				</div>
			</div>
		</section>
	</footer>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
    	$(document).ready(function(){
        const BASE_URL = '<?=base_url()?>';
        $.ajax({
            url: BASE_URL + 'Servicio',
            type: 'GET',
            dataType: 'json',
            success: function(response){
                console.log(response);
                
                var cards = ''; 

                for(var i=0; i<response['data'].length; i++){
                   
                    cards += '<div class="col-md-4 bot">'
                    cards += '<div class="card">'
                    cards +=   '<img class="card-img-top" src="'+BASE_URL+"assets/imgs/servicios/"+response['data'][i]['v3']+'" alt="Card image cap">'
                    cards +=   '<div class="card-body">'
                    cards +=     '<a href="'+BASE_URL+'HammerServicios/servicios/'+response['data'][i]['v1']+'"><h5 class="card-title">'+response['data'][i]['v2']+'</h5></a>'
                    //cards +=     '<p class="card-text">'+response['data'][i]['v4']+'</p>'
                   
                     cards +=  '</div>'
                    cards += '</div>'
                    cards += '</div>'

                }
                $('#tarjetas').html(cards);
            }
        });
    	// manual carousel controls
	    $('.next').click(function(){ $('.carousel').carousel('next');return false; });
	    $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });

	    $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
            });


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
                        $('#form')[0].reset();
                    }else{
                        Swal('Oops...', response['mensaje'] , 'error')
                    }
                }
            });
    });

    	});
    	
    </script>
  </body>
</html>