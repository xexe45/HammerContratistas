	<section class="top">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
				for($i = 0; $i < $contador; $i++){
					?>
						<li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>" <?php if ($i == 0): ?>
							class="active"
						<?php endif ?> ></li>
					<?php
				}
			?>
			
		</ol>
		<div class="carousel-inner">
			<?php foreach ($slides as $key => $value): ?>

				<div <?php
					if($key == 0){
						?>
						class="carousel-item active"
						<?php
					}else{
						?>
						class="carousel-item"
						<?php
					}
				?> >
					<img class="d-block w-100" src="<?=base_url()?>assets/imgs/portada/<?=$value->v2?>" alt="First slide">
					<div class="carousel-caption d-none d-md-block">
						<h3><?=$value->v4?></h3>
						<p><?=$value->v5?></p>
					</div>
				</div>
			<?php endforeach ?>
			
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>
	</section>
	<section class="container bienvenido">
		<div class="row">
			<div class="col-md-12 texto">
				<h2>BIENVENIDO</h2>
			</div>
		</div>
		<div class="row vision">
			<div class="col-sm-12 col-md-5">
				<img src="<?=base_url()?>assets/imgs/<?=$info->v3?>" alt="">
			</div>
			<div class="col-sm-12 col-md-7 mivision">
				<p class="parrafo">
					¿Quiénes Somos?
				</p>
				<p class="parrafo linea">
					<?=$info->v8?>
				</p>
				
				
			</div>
		</div>
	</section>
	<section class="servicios">
		<div class="container-fluid presentacion">
		    <div class="row">
		        <div class="col-lg-12 titulo">
		            <h2>SERVICIOS</h2>
		        </div>
		    </div>
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="card-deck" id="tarjetas">
					</div>
		    	</div>
				
		    </div>
		    
		    
		</div>
		

		
	</section>
	<section class="detalle">
		<div class="row">
			<div class="col-md-12 texto">
				<h2 class="titulo">EXCELENTE INGENIERÍA <br>EN DISEÑO</h2>
			</div>
		</div>
	</section>
	<section class="customers container-fluid">
		<div class="row">
			<div class="col-md-12 texto">
				<h2>CLIENTES</h2>
			</div>
		</div>
	   <div class="customer-logos slider">
	   		<?php foreach ($clientes as $cliente): ?>
	   			<div class="slide"><img src="<?=base_url()?>assets/imgs/customers/<?=$cliente->v3?>"></div>
	   		<?php endforeach ?>
	      
	   </div>
	</section>
	<section class="contacto">
		<div class="row">
			<div class="col-md-12 texto">
				<h2>CONTACTO</h2>
			</div>
		</div>
		<div class="row contactanos">
			<div class="col-md-6">
				<p><i class="fa fa-map-marker" aria-hidden="true"></i> Av. Los Tallanes G-5. Urb. La Providencia - Piura</p>
				<p><i class="fa fa-phone" aria-hidden="true"></i> 073-596193 / 963956610</p>
				<p><i class="fa fa-envelope-o" aria-hidden="true"></i> proyectos@hammer.com.pe</p>
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.581407563227!2d-80.62806898569234!3d-5.170829196247754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904a100ec2c4b919%3A0x590a90086dcc66a5!2sEstablo+La+Providencia!5e0!3m2!1ses-419!2spe!4v1523813978316" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-md-6 textos">
				
				<?=form_open('Home/contacto', array("id" => "form"))?>
					<div class="form-group">
						<label for="name">Nombre Completo *</label>
						<input type="text" name="name" class="form-control" placeholder="Nombre Completo" maxlength="255" minlength="2">
					</div>
					<div class="form-group">
						<label for="name">Teléfono *</label>
						<input type="text" name="phone" class="form-control" placeholder="Teléfono" maxlength="15" minlength="6">
					</div>
				  	<div class="form-group">
					    <label for="exampleInputEmail1">Corre Electrónico *</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="correo">
					    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo electrónico con terceros.</small>
				  	</div>
				  	<div class="form-group">
				  		<label for="mensaje">Mensaje *</label>
				  		<textarea name="mensaje" class="form-control" id="" cols="30" rows="7"></textarea>
				  	</div>
				  
				  <button type="submit" class="btn btn-primary btn-block">Enviar</button>
				<?=form_close()?>
			</div>
		</div>
	</section>
	