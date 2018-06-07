<section class="proyecto text-center">
	<h2 class="titulo-p"> Alta calidad <br>en construcción </h2>
</section>
<section class="container p-3">

	<?php if ($opc == 3): ?>
				<div class="card-columns">
					<?php foreach ($datos as $dato): ?>
						<div class="card">
						    <img class="card-img-top" src="<?=base_url()?>assets/imgs/proyectos/<?=$dato->v5?>" alt="Card image cap">
						    <div class="card-body">
						      <a href="#"><h5 class="card-title"><?=$dato->v4?></h5></a>
						      
						    </div>
						  </div>
					<?php endforeach ?>
				</div>
				<nav aria-label="Page navigation example">
				<p><?php echo $this->pagination->create_links()?></p>
				</nav>
	<?php endif ?>
	<?php if ($opc == 2): ?>
				<div class="card-columns">
					<?php foreach ($datos as $dato): ?>
						<div class="card">
						    <img class="card-img-top" src="<?=base_url()?>assets/imgs/proyectos/<?=$dato->v5?>" alt="Card image cap">
						    <div class="card-body">
						      <a href="#"><h5 class="card-title"><?=$dato->v4?></h5></a>
						      
						    </div>
						  </div>
					<?php endforeach ?>
				</div>
				<p class="pull-right"><?php echo $this->pagination->create_links()?></p>
	<?php endif ?>		
</section>
