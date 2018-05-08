
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
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  	<div class="top">
					  		<form>
					  			<div class="form-group">
								  	<label for="servicio_id">Servicio al que corresponde*</label>
								  	<select name="servicio_id" id="servicio_id" class="form-control">
								  		<option value="">Seleccionar Servicio...</option>
								  	</select>
							  	</div>
					  			<div class="form-group">
					  				<label for="nombre">Nombre de Proyecto *</label>
					  				<input type="text" name="nombre" id="nombre" required="" class="form-control" maxlength="80" minlength="2" placeholder="Nombre de Proyecto">
					  			</div>
					  			<div class="form-group">
								  	<label for="estado">Estado de Proyecto*</label>
								  	<select name="estado" id="estado" class="form-control">
								  		<option value="">Seleccionar Estado de proyecto...</option>
								  		<option value="proceso">En proceso</option>
								  		<option value="concluido">Concluido</option>
								  	</select>
							  	</div>
							  	<div class="form-group">
								  	<label for="cliente_id">Cliente*</label>
								  	<select name="cliente_id" id="cliente_id" class="form-control">
								  		<option value="">Seleccionar Cliente...</option>
								  		
								  	</select>
							  	</div>
					  			
					  			<div class="form-group">
					  				<label for="img_principal">Imagen del proyecto *</label>
					  				<input type="file" class="form-control" name="img_principal" id="img_principal" class="form-control">
					  			</div>
					  			<div class="form-group">
									<label for="descripcion">Descripción del proyecto *</label>
									<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" required></textarea>
								</div>
							  
							  <button type="submit" class="btn btn-success">Registrar</button>
							</form>
					  	</div>
					  </div>
					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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

