
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
					  		<?=form_open_multipart('Proyectos/store' , array("id" => "form"))?>
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
					  				<label for="slug">Slug</label>
					  				<input type="text" readonly name="slug" class="form-control" id="slug">
					  			</div>
					  			<div class="form-group">
								  	<label for="tipo">Estado de Proyecto*</label>
								  	<select name="tipo" id="tipo" class="form-control">
								  		<option value="">Seleccionar Estado de proyecto...</option>
								  		<option value="proceso">En proceso</option>
								  		<option value="concluido">Concluido</option>
								  	</select>
							  	</div>
							  	<!--<div class="form-group">
								  	<label for="cliente_id">Cliente*</label>
								  	<select name="cliente_id" id="cliente_id" class="form-control">
								  		<option value="">Seleccionar Cliente...</option>
								  		
								  	</select>
							  	</div>-->
							  	<div class="form-group">
							  		<label for="cliente_id">Cliente *</label>
							  		<input type="text" class="form-control" name="cliente_id" id="cliente_id">
							  	</div>
							  	<div class="form-group">
							  		<label for="fecha">Fecha de inicio *</label>
							  		<input type="date" class="form-control" name="fecha" id="fecha" required>
							  	</div>
					  			
					  			<div class="form-group">
					  				<label for="img_principal">Imagen del proyecto</label>
					  				<input type="file" class="form-control" name="file" id="file" class="form-control">
					  			</div>
					  			<div class="form-group">
									<label for="descripcion">Descripción del proyecto *</label>
									<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" required></textarea>
								</div>
							  
							  <button type="submit" class="btn btn-success">Registrar</button>
							<?=form_close()?>
					  	</div>
					  </div>
					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					  	<br>
					  	<button id="btn-clientes" class="btn btn-primary"><i class="fa fa-list"></i> Cargar Listado...</button>
					  	<table id="table" 
		                data-sort-name="v1"
		                data-sort-order="desc"
		                data-search="true"
		                data-pagination="true"               
		                data-page-size="5"
		                data-page-list="[5,8,10]"
		                data-pagination-first-text="Primero"
		                data-pagination-pre-text="Anterior"
		                data-pagination-next-text="Siguiente"
		                data-pagination-last-text="Último">
		                  <thead>
		                    <tr>
		                      <!--<th data-field="state" data-radio="true"></th>-->
		                      <th data-field="v1">ID</th>
		                      <th data-field="v2">SERVICIO_ID</th>
		                      <th data-field="v3">SERVICIO</th>
		                      <th data-field="v4">PROYECTO</th>
		                      <th data-field="v5">ESTADO</th>
		                      <th data-field="v6">CLIENTE_ID</th>
		                      <th data-field="v7">CLIENTE</th>
		                      <th data-field="v8">FECHA DE INICIO</th>
		                      <th data-field="v9" data-formatter="imageFormatter">Imagen</th>
		                      <th data-field="v10">DESCRIPCION</th>
		                      <th data-formatter="buttonFormatter" data-field="v4">Galería</th>
		                    </tr>
		                  </thead>
		                </table>
					  </div>
					</div>
			  </div>
			</div>
		</div>
	</div>
		
	</section>

<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/btable/bootstrap-table.min.js"></script>
<script src="<?=base_url()?>assets/js/sweetalert2.all.js"></script>
<script src="<?=base_url()?>assets/js/jquery.tokeninput.js"></script>
<script src="<?=base_url()?>assets/js/speakingurl.min.js"></script>
<script src="<?=base_url()?>assets/js/slugify.min.js"></script>
<script src="<?=base_url()?>assets/js/proyectos.js"></script>
</body>	
</html>

