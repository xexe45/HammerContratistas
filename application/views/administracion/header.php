<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/btable/bootstrap-table.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/btable/bootstrap-table-group-by.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/token-input-facebook.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/home.css">
    <title>HammerContratistas</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <a class="navbar-brand" href="#">Hammer Contratistas</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		      
		    </ul>
		     <ul class="navbar-nav justify-content-end">
						
		        <li class="nav-item">
			        <a class="nav-link" href="#">Bienvenido <?=$this->session->userdata('user')?></a>
			    	</li>
						<li class="nav-item">
								<a class="nav-link" href="#">Última Conexión:  <?=$lastConnection->v4?></a>
						</li>
						<li class="nav-item">
								<a class="nav-link" href="<?=base_url()?>"><i class="fa fa-home"></i></a>
						</li>
						
		    </ul>
		    
		  </div>
		</nav>
	</header>
	<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<section class="container-fluid top">
	<div class="row">
		<div class="col-md-3 margen-abajo">
			<ul class="list-group">

			<a href="#" class="list-group-item list-group-item-action active">
			   <i class="fa fa-dashboard"></i> Dashboard 
			 </a>
			 <a href="<?=base_url()?>mensajes" class="list-group-item list-group-item-action"><i class="fa fa-envelope"></i> Mensajes</a>
			 <a href="<?=base_url()?>portada" class="list-group-item list-group-item-action"><i class="fa fa-home"></i> Portada</a>
			  <a href="<?=base_url()?>empresa" class="list-group-item list-group-item-action"><i class="fa fa-id-card"></i> Nuestra empresa</a>
			  <a href="<?=base_url()?>filosofia-empresarial" class="list-group-item list-group-item-action"><i class="fa fa-handshake-o"></i> Filosofía empresarial</a>
			  <a href="<?=base_url()?>servicios" class="list-group-item list-group-item-action"><i class="fa fa-server"></i> Servicios</a>
			   <a href="<?=base_url()?>tareas" class="list-group-item list-group-item-action"><i class="fa fa-briefcase"></i> Tareas x Servicio</a>
			  <a href="<?=base_url()?>proyectos" class="list-group-item list-group-item-action"><i class="fa fa-archive"></i> Proyectos</a>
			  <a href="<?=base_url()?>usuarios" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Usuarios</a>
			  <a href="<?=base_url()?>clientes" class="list-group-item list-group-item-action"><i class="fa fa-user-circle"></i> Clientes</a>
			  <a href="<?=base_url()?>Reportes" class="list-group-item list-group-item-action"><i class="fa fa-pie-chart"></i> Reportes</a>
				<a href="<?=base_url()?>Sistema" class="list-group-item list-group-item-action"><i class="fa fa-cogs"></i> Sistema</a>
			  <a href="<?=base_url()?>Login/salir" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i> Salir del sistema</a>
			</ul>
		</div>
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="<?=base_url()?>Administracion/inicio">Home</a></li>
				   <li class="breadcrumb-item active" aria-current="page"><?=$this->uri->segment(1)?></li>
			
				 </ol>

			</nav>

