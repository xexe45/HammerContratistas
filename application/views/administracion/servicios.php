
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

					  		<?=form_open_multipart('Servicio/registrar', array("id" => "form"))?>
					  		
					  			<div class="form-group">
					  				<label for="servicio">Nombre de servicio *</label>
					  				<input type="text" name="servicio" id="servicio" required="" class="form-control" maxlength="150" minlength="4" placeholder="Nombre de servicio">
					  			</div>
					  			<div class="form-group">
					  				<label for="logo">Imagen de servicio *</label>
					  				<input type="file" class="form-control" name="file" id="file">
					  			</div>
					  			<div class="form-group">
					  				<label for="descripcion">Descripción de servicio *</label>
					  				<textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"></textarea>
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
		                      <th data-field="v2">SERVICIO</th>
		                      <th data-field="v3" data-formatter="imageFormatter">Imagen</th>
		                      <th data-field="v4">Descripción</th>
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
<script src="<?=base_url()?>assets/js/servicios.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		ruta ='<?= base_url()?>';  
    ejecutar();
  	});
</script>
</body>	
</html>

