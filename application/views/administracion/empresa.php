
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
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  	<br>
					  	<div class="row">
					  		<div class="col-md-7">
					  			<img src="<?=base_url()?>assets/imgs/empresa.jpg" class="img-fluid" alt="">
					  		</div>
					  		<div class="col-md-5">
					  			<p>Módulo para editar la <b>principal información</b> de la empresa, así como modificar el <b>logo</b> que será presentado a los visitantes.</p>
					  		</div>
					  	</div>
					  	
					  </div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  	<div class="top">
					  		<div class="row">	
								<div class="col-md-9">	
									<form id="form" method="POST" action="<?=base_url()?>Empresa/update">
					  					<input type="hidden" name="id" value="<?=$info->v1?>">
							  			<div class="form-group">
							  				<label for="nombre">Nombre *</label>
							  				<input type="text" name="nombre" id="nombre" required="" class="form-control" maxlength="80" minlength="2" value="<?=$info->v2?>">
							  			</div>
							  			<!--<div class="form-group">
							  				<label for="logo">Logo</label>
							  				<input type="file" class="form-control" name="logo" id="logo">
							  			</div>-->
							  			
							  			<div class="form-group">
							  				<label for="ruc">Ruc *</label>
							  				<input type="text" class="form-control" name="ruc" id="ruc" required class="form-control" minlength="11" maxlength="11" value="<?=$info->v4?>">
							  			</div>
							  			<div class="form-group">
							  				<label for="direccion">Dirección *</label>
							  				<input type="text" class="form-control" name="direccion" id="direccion" required="" class="form-control" maxlength="255" minlength="8" value="<?=$info->v5?>">
							  			</div>
							  			<div class="form-group">
							  				<label for="telefono">Teléfono *</label>
							  				<input type="text" class="form-control" name="telefono" id="telefono" required="" class="form-control" maxlength="12" minlength="6" value="<?=$info->v6?>">
							  			</div>
							  			
							  			<div class="form-group">
							  				<label for="correo">Correo Electrónico *</label>
							  				<input type="text" class="form-control" name="correo" id="correo" required="" class="form-control" maxlength="200" minlength="8" value="<?=$info->v7?>">
							  			</div>
										<div class="form-group">
											<label for="presentacion">Presentación de la empresa al público *</label>
											<textarea name="presentacion" id="presentacion" cols="30" rows="10" class="form-control" required><?=$info->v8?></textarea>
										</div>
									  
									  <button type="submit" class="btn btn-success">Registrar</button>
									</form>
								</div>
								<div class="col-md-3 text-center">
										<img src="<?=base_url()?>assets/imgs/<?=$info->v3?>" alt="" id="milogo" class="img-fluid">
										<br>	
										<button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm btn-block">Cambiar logo</button>	
								</div>
					  		</div>
					  		
					  	</div>
					  </div>
					  
					</div>
			  </div>
			</div>
		</div>
	</div>
		
	</section>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Cambiar Logo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      
		      <?=form_open_multipart('Empresa/update_logo', array("id" => "form-logo"));?>
		      <div class="modal-body">
		      		<input type="hidden" name="id" value="<?=$info->v1?>">
		        	<img src="<?=base_url()?>assets/imgs/<?=$info->v3?>" alt="" class="img-fluid" id="imagen">
		        	<div class="form-group">
		        		<label for="file">Seleccionar Nuevo logo *</label>
		        		<input id="file" name="file" type="file" required class="form-control">
		        	</div>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
		      </div>
		      <?=form_close()?>
	      
	    </div>
	  </div>
	</div>
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/sweetalert2.all.js"></script>
<script src="<?=base_url()?>assets/js/empresa.js"></script>
</body>	
</html>

