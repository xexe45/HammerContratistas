
			<div class="card top-bottom">
			  <div class="card-body">
			    <ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Presentación</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Editar Información</a>
					  </li>
					  
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  	<div class="top">
					  		<form>
					  		
					  			<div class="form-group">
					  				<label for="nombre">Nombre *</label>
					  				<input type="text" name="nombre" id="nombre" required="" class="form-control" maxlength="80" minlength="2" placeholder="Nombres de la empresa">
					  			</div>
					  			<div class="form-group">
					  				<label for="logo">Logo</label>
					  				<input type="file" class="form-control" name="logo" id="logo">
					  			</div>
					  			
					  			<div class="form-group">
					  				<label for="ruc">Ruc *</label>
					  				<input type="text" class="form-control" name="ruc" id="ruc" required class="form-control" minlength="11" maxlength="11" placeholder="Ruc">
					  			</div>
					  			<div class="form-group">
					  				<label for="telefono">Teléfono *</label>
					  				<input type="text" class="form-control" name="telefono" id="telefono" required="" class="form-control" maxlength="12" minlength="6" placeholder="Teléfono">
					  			</div>
					  			<div class="form-group">
					  				<label for="direccion">Dirección *</label>
					  				<input type="text" class="form-control" name="direccion" id="direccion" required="" class="form-control" maxlength="255" minlength="8" placeholder="Dirección de Usuario">
					  			</div>
								<div class="form-group">
									<label for="presentacion">Presentación de la empresa al público *</label>
									<textarea name="presentacion" id="presentacion" cols="30" rows="10" class="form-control" required></textarea>
								</div>
							  
							  <button type="submit" class="btn btn-success">Registrar</button>
							</form>
					  	</div>
					  </div>
					  
					</div>
			  </div>
			</div>
		</div>
	</div>
		
	</section>

<script src="<?=base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>	
</html>

