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
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
    	$(document).ready(function(){
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

    	});
    	
    </script>
  </body>
</html>