
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

					  		<?=form_open('Empresa/filosofia', array("id" => "form"))?>
					  			<input type="hidden" name="id" value="<?=$filosofia->v1?>">
					  			<div class="form-group">
									<label for="historia">Historia de la empresa *</label>
									<textarea name="historia" id="historia" cols="30" rows="10" class="form-control" required><?=$filosofia->v2?></textarea>
								</div>
								<div class="form-group">
									<label for="mision">Misión de la empresa *</label>
									<textarea name="mision" id="mision" class="form-control" required><?=$filosofia->v3?></textarea>
								</div>
								<div class="form-group">
									<label for="vision">Visión de la empresa *</label>
									<textarea name="vision" id="vision" class="form-control" required><?=$filosofia->v4?></textarea>
								</div>
					  			<!--<div class="form-group">
					  				<label for="slide1">Prima Imagen para presentar al público </label>
					  				<input type="file" class="form-control" name="slide1" id="slide1">
					  			</div>-->
					  			<!--<div class="form-group">
					  				<label for="slide2">Segunda Imagen para presentar al público</label>
					  				<input type="file" class="form-control" name="slide2" id="slide2">
					  			</div>-->
					  			
								<div class="form-group">
									<label for="valores">Valores de la empresa *</label>
									<textarea name="valores" id="valores" class="form-control" required><?=$filosofia->v7?></textarea>
								</div>
							  
							  <button type="submit" class="btn btn-success">Registrar</button>
							
							<?=form_close()?>
					  	
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
<script src="<?=base_url()?>assets/js/sweetalert2.all.js"></script>
<script src="<?=base_url()?>assets/js/filosofia.js"></script>
</body>	
</html>

