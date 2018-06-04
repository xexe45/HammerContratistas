<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
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
			        <a class="nav-link" href="#">Bienvenido Usuario</a>
			     </li>
		    </ul>
		    
		  </div>
		</nav>
	</header>
	<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<section class="container-fluid top">
	<div class="row">
		<div class="col-md-3">
			<ul class="list-group">

			<a href="#" class="list-group-item list-group-item-action active">
			    Dashboard
			 </a>
			 <a href="<?=base_url()?>Administracion/portada" class="list-group-item list-group-item-action">Portada</a>
			  <a href="<?=base_url()?>Administracion/empresa" class="list-group-item list-group-item-action">Nuestra empresa</a>
			  <a href="<?=base_url()?>Administracion/filosofia" class="list-group-item list-group-item-action">Filosofía empresarial</a>
			  <a href="<?=base_url()?>Administracion/servicios" class="list-group-item list-group-item-action">Servicios</a>
			  <a href="<?=base_url()?>Administracion/proyectos" class="list-group-item list-group-item-action">Proyectos</a>
			  <a href="<?=base_url()?>Administracion/usuarios" class="list-group-item list-group-item-action">Usuarios</a>
			  <a href="<?=base_url()?>Administracion/clientes" class="list-group-item list-group-item-action">Clientes</a>
			  <a href="#" class="list-group-item list-group-item-action disabled">Salir del sistema</a>
			</ul>
		</div>
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="<?=base_url()?>inicio">Home</a></li>
				   
				   <li class="breadcrumb-item active" aria-current="page"><?=$this->uri->segment(2)?></li>
				 </ol>
			</nav>

