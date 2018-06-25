<section class="servicio text-center">
	<h2 class="titulo-s"> Servicios </h2>
</section>
<section class="servicios">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				 <div class="card">
				    <img class="card-img" src="<?=base_url()?>assets/imgs/servicios/<?=$servicio->v3?>" alt="Card image">
				  </div>
				
			</div>
			<div class="col-md-6 service">
				<h2 class="serviceh2"><?=$servicio->v2?></h2>
				<p class="servicep text-justify">
					<?=$servicio->v4?>
				</p>
			</div>
		</div>
	</div>
	
</section>