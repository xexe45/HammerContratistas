<section class="filosofia text-center">
	<h2 class="titulo-f"> Nuestros Clientes <br>respaldan nuestro trabajo profesional </h2>
</section>
<section class="container tp">
    <div class="card-columns">
        <?php foreach ($clientes as $cliente): ?>
        <div class="card">
            <img class="card-img-top" src="<?=base_url()?>assets/imgs/customers/<?=$cliente->v3?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><?=$cliente->v2?></h5>
           
            <a style="text-decoration: none" target="_blank" href="<?=$cliente->v4?>" class="card-text cl"><small class="text-muted"><?=$cliente->v4?></small></a>
            </div>
        </div>
        <?php endforeach ?>
        
    </div>
</section>

