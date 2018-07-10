<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/custom.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/portada.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/conocenos.css">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/imgs/logo.ico">
    
    <title>HammerContratistas</title>
  </head>
  <body>
  <header>
   <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light margen-arriba">
      <div class="container">
         <img src="<?=base_url()?>assets/imgs/logo.jpg" width="70" height="70" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == ''){ ?> active <?php }   ?>" href="<?=base_url()?>">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == 'Conocenos'){ ?> active <?php }   ?>" href="<?=base_url()?>Conocenos">Conócenos</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="http://blog.bootswatch.com">Servicios</a>
            </li>-->
            <li class="nav-item dropdown <?php if($this->uri->segment(1) == 'HammerProyectos'){ ?> active <?php }   ?>">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Proyectos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?=base_url()?>HammerProyectos/concluidos">Concluidos</a>
                <a class="dropdown-item" href="<?=base_url()?>HammerProyectos/proceso">Proceso</a>
                
              </div>
            </li>
          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == 'nuestros-clientes'){ ?> active <?php }   ?>" href="<?=base_url()?>nuestros-clientes">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>Login">Iniciar Sesión </a>
            </li>
            
          </ul>

        </div>
      </div>
    </div>
  </header>
  