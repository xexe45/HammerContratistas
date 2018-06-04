<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hammer Contratistas</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/login.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/imgs/logo.ico">
</head>
<body>
	<div class="container">
		<div class="row top">
			<div class="col-md-12 text-center encabezado">
				<h1 class="titulo">Hammer Contratistas</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card box">
				  <div class="card-body">
				    <div class="row">
				    	<div class="col-md-12 cabecera text-center">
				    		<h4 class="cabecera-titulo">LOGIN</h4>
				    	</div>
				    </div>
				    <hr>
				    <div class="row">
				    	<div class="col-md-12">
				    		<form>
				    		<div class="form-group">
				    			<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
								  </div>
								  <input type="email" class="form-control" placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1" required maxlength="200" minlength="12">
								</div>
				    		</div>
				    		<div class="form-group">
				    			<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon12"><i class="fa fa-key"></i></span>
								  </div>
								  <input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon12" required maxlength="200" minlength="6">
								</div>
				    		</div>
				    		<div class="form-group">
				    			<button type="submit" class="btn btn-success btn-block"><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</button>
				    		</div>
				    	</form>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>