
			<div class="card top-bottom">
			  <div class="card-body">
			    <div class="row">
			    	<div class="col-md-5">
			    		<div class="card">
						  <div class="card-body">
						  	<button class="btn btn-info" id="btn1"><i class="fa fa-pie-chart" aria-hidden="true"></i> Reporte comparación Registros - Edición</button>
						    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
						  </div>
						</div>
			    	</div>
			    	<div class="col-md-7">
			    		<div class="card">

						  <div class="card-body">
						  	<button class="btn btn-info" id="btn2"><i class="fa fa-line-chart" aria-hidden="true"></i> Reporte Iteracciones por mes</button>
						    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
						  </div>
						</div>
			    	</div>
			    </div>
					<div class="row top">
						<div class="col-md-12">
						<div class="card">
						  <div class="card-body">
						  	
								<?=form_open('Usuario/reporte', array("id" => "form"))?>
									<div class="form-group">
										<label for="usuario">Seleccionar Usuario*</label>
										<input type="text" name="user_id" id="user_id" class="form-control" required>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="usuario">Fecha Inicio*</label>
												<input type="date" name="date1" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="usuario">Fecha Fin *</label>
												<input type="date" name="date2" class="form-control" required>
											</div>
										</div>
									</div>
									<button class="btn btn-info" id="btn2"><i class="fa fa-line-chart" aria-hidden="true"></i> Reporte Iteracciones de usuario entre fechas</button>
								<?=form_close()?>
						    <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
						  </div>
						</div>
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
<script src="<?=base_url()?>assets/js/jquery.tokeninput.js"></script>
<script src="<?=base_url()?>assets/js/canvasjs.min.js"></script>
<script src="<?=base_url()?>assets/js/sweetalert2.all.js"></script>
<script src="<?=base_url()?>assets/js/reportes.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	ruta ='<?= base_url()?>';  
    	ejecutar();
  	});
</script>
</body>	
</html>

