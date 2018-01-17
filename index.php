 <?php  	
 	session_start();

	if ($_SESSION) {
		header("location:dashboard.php");
	}
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<title>VetControl | Alpha</title>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="icon" type="image/png" href="favicon.png"/>

 </head>
 <body id="body-validate">
 	<div class="container">
 		<div class="row" id="row-validate">
 			<div class="col-md-6 align-self-center">
 				<div class="jumbotron">
 					<h1 class="display-3">VetControl <i class="fa fa-paw" aria-hidden="true"></i></h1>
 					<p class="lead">Ayuda fácil y gratis para las veterinarias con ganas de tener control sobre su negocio.</p>
 					<hr class="my-4">
 					<p>Esta es la primera versión del sistema de control veterianario</p>
 					<p class="lead">
 						<a href="mailto:cpmarcoo@gmail.com" class="btn btn-primary btn-lg" role="button">Contáctame</a>
 					</p>
 				</div>
 			</div>
 			<div class="col-md-6 align-self-center">
			 	<form>
			 		<div class="form-group form-validate">
			 			<label for="name">Usuario</label>
			 			<input type="text" name="name" id="name" class="form-control">
			 			<label for="pass">Contraseña</label>
						<input type="password" name="pass" id="pass" class="form-control">
			 		</div>
			 		<a href="#" onclick="validate();" class="btn btn-primary">Entrar</a>
			 		<label id="result"></label>
			 	</form>				
		 	</div>
 		</div>
 	</div>
	
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/tether.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="ajax/ajax.js"></script>

 </body>
 </html>