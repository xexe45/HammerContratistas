
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
					  		<?=form_open('Usuario/doreg',array("id" => "form"))?>
					  		
					  			<div class="form-group">
					  				<label for="nombre">Nombres *</label>
					  				<input type="text" name="nombre" id="nombre" required="" class="form-control" maxlength="80" minlength="2" placeholder="Nombres de Usuario">
					  			</div>
					  			<div class="form-group">
					  				<label for="apellidos">Apellidos *</label>
					  				<input type="text" class="form-control" name="apellidos" id="apellidos" required="" class="form-control" maxlength="80" minlength="2" placeholder="Apellidos de Usuario">
					  			</div>
					  			<div class="form-group">
					  				<label for="dni">DNI *</label>
					  				<input type="text" class="form-control" name="dni" id="dni" required class="form-control" minlength="8" maxlength="8" placeholder="DNI">
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
							    <label for="correo">Correo Electrónico *</label>
							    <input type="email" class="form-control" id="correo" name="correo" maxlength="150" minlength="12" placeholder="Enter email">
							    
							  </div>
							  <div class="form-group">
							    <label for="password">Contraseña *</label>
							    <input type="password" class="form-control" id="password" placeholder="Password" name="password" maxlength="20" minlength="6">
							  </div>
							  <div class="form-group">
							  	<label for="rol">Rol *</label>
							  	<select name="rol" id="rol" class="form-control">
							  		<option value="">Seleccionar Rol...</option>
							  		<option value="admin">Administrador</option>
							  		<option value="user">Usuario</option>
							  	</select>
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
		                      <th data-field="v2">Nombres</th>
		                      <th data-field="v3">Apellidos</th>
		                      <th data-field="v4">Dni</th>
		                      <th data-field="v5">Teléfono</th>
		                      <th data-field="v6">Dirección</th>
		                      <th data-field="v7">Correo</th>
		                      <th data-field="v8">Rol</th>
		                      <th data-field="v9">Fecha de registro</th>
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
<script src="<?=base_url()?>assets/js/usuario.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$r='<?= base_url()?>';  
    	ejecutar();
  	});
</script>
</body>	
</html>

