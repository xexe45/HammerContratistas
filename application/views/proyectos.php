<section class="proyecto text-center">
	<h2 class="titulo-p"> Alta calidad <br>en construcción </h2>
</section>
<section class="container p-3">
	
	<?php if ($opc == 3): ?>
				<?php if (count($datos) == 0): ?>
					<div class="text-center">
						<p>No se han encontrando proyectos concluidos</p>
						<img class="img-fluid" src="<?=base_url()?>assets/imgs/empty.png" alt="">
					</div>
					
				<?php endif ?>
				<?php if (count($datos) > 0): ?>
					<div class="card-columns">
					<?php foreach ($datos as $dato): ?>
						<div class="card">
						    <img class="card-img-top" src="<?=base_url()?>assets/imgs/proyectos/<?=$dato->v5?>" alt="Card image cap">
						    <div class="card-body">
						      <a class="enlace" nameproyecto="<?=$dato->v4?>" idproyecto="<?=$dato->v1?>" descripcion="<?=$dato->v6?>" href="#"><h5 class="card-title"><?=$dato->v4?></h5></a>
						      
						    </div>
						  </div>
					<?php endforeach ?>
				</div>
				<nav aria-label="Page navigation example">
				<p><?php echo $this->pagination->create_links()?></p>
				</nav>
				<?php endif ?>
				
	<?php endif ?>
	<?php if ($opc == 2): ?>
				<?php if (count($datos) == 0): ?>
					<div class="text-center">
						<p>No se han encontrando proyectos en proceso</p>
						<img class="img-fluid" src="<?=base_url()?>assets/imgs/empty.png" alt="">
					</div>
					
				<?php endif ?>
				<?php if (count($datos) > 0): ?>
					<div class="card-columns">
					<?php foreach ($datos as $dato): ?>
						<div class="card">
						    <img class="card-img-top" src="<?=base_url()?>assets/imgs/proyectos/<?=$dato->v5?>" alt="Card image cap">
						    <div class="card-body">
						      <a class="enlace" nameproyecto="<?=$dato->v4?>" idproyecto="<?=$dato->v1?>" descripcion="<?=$dato->v6?>" href="#"><h5 class="card-title"><?=$dato->v4?></h5></a>
						      
						    </div>
						  </div>
					<?php endforeach ?>
				</div>
				<nav aria-label="Page navigation example">
				<p><?php echo $this->pagination->create_links()?></p>
				</nav>
				<?php endif ?>
	<?php endif ?>		
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-6"></div>
        	<div class="col-md-6" id="describeme">
        		
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
