
			<div class="card top-bottom">
			  <div class="card-body">
			    <ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Presentación</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registro</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Listado</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  	<div class="container top">
					  		<div class="row">
					  			<div class="col-md-6">
					  				<img src="<?=base_url()?>assets/imgs/logo.jpg" class="img-fluid" alt="">
					  			</div>
					  			<div class="col-md-6">
					  				<p>Módulo para <b>registro y edición</b> de los elementos <b>slides</b> en la portada de la página web de la empresa.</p>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  	<div class="top">

					  		<?=form_open_multipart('Portada/registrar', array("id" => "form"))?>

					  			<div class="form-group">
					  				<label for="logo">Imagen de Slide*</label>
					  				<input type="file" class="form-control" name="file" id="file" required>
					  			</div>
					  			<div class="form-group">
					  				<label for="titulo">Título *</label>
					  				<input type="text" name="titulo" id="titulo" required class="form-control" maxlength="200" minlength="2" placeholder="Título">
					  			</div>
					  			<div class="form-group">
					  				<label for="subtitulo">Sub Título *</label>
					  				<input type="text" name="subtitulo" id="subtitulo" required class="form-control" maxlength="200" minlength="2" placeholder="Título">
					  			</div>
					  			
					  	
					  			
							  <button type="submit" class="btn btn-success">Registrar</button>

							<?=form_close()?>

					  	</div>
					  </div>
					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
					</div>
			  </div>
			</div>
		</div>
	</div>
		
	</section>

<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/sweetalert2.all.js"></script>
<script src="<?=base_url()?>assets/js/portada.js"></script>
</body>	
</html>

