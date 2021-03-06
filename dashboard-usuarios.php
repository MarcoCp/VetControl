<?php 
	session_start();

	if (!$_SESSION) {
		header("location:index.php");
	}
 ?>
<!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Usuarios | VetControl</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="icon" type="image/png" href="favicon.png"/>

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<header class="col-sm-12">
				<nav class="navbar justify-content-between">
					<a href="dashboard.php">
						<h1>VetControl <i class="fa fa-paw" aria-hidden="true"></i></h1>
					</a>
					<div class="form-inline">
						<a href="" class="btn btn-success"><?php echo "<i class='fa fa-user-o' aria-hidden='true'></i> ".$_SESSION['Nombres']." ".$_SESSION['Apellidos']; ?></a>
						<a href="dashboard-usuarios.php" class="btn btn-success active">Usuarios</a>					
						<a href="php/close_session.php" class="btn btn-success">Salir</a>
					</div>
				</nav>
			</header>
			<div class="col-md-3">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent" aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle navigation">
	    				<i class="fa fa-bars" aria-hidden="true"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarcontent">
						<div class="list-group">
							<a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa fa-tachometer" aria-hidden="true"></i> Escritorio</a>
							<a href="dashboard-cliente.php" class="list-group-item list-group-item-action"><i class="fa fa-user-o" aria-hidden="true"></i> Clientes</a>
							<a href="dashboard-mascotas.php" class="list-group-item list-group-item-action"><i class="fa fa-paw" aria-hidden="true"></i> Mascotas</a>
							<a href="dashboard-consultas.php" class="list-group-item list-group-item-action"><i class="fa fa-stethoscope" aria-hidden="true"></i> Consultas</a>
							<a href="#" class="list-group-item list-group-item-action disabled">Vacunas</a>
							<a href="#" class="list-group-item list-group-item-action disabled">Pesos</a>
							<a href="php/close_session.php" class="list-group-item list-group-item-action"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</a>
						</div>
					</div>
				</nav>
			</div>
			<div class="col-md-9">
				<div id="acordion" role="tablist">
					<div class="card">
						<div class="card-header" role="tab" id="insertar">
							<h5 class="mb-0">
								<a href="#insertar-tab" data-toggle="collapse" aria-expanded="true" aria-controls="insertar-tab">
									Insertar Usuario
								</a>
							</h5>
						</div>
						<div id="insertar-tab" class="collapse show" role="tabpanel" aria-labelledby="insertar" data-parent="#acordion">
							<form method="post" action="php/users/insert_users.php">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Nombre</label>
									 	<input type="text" name="name" class="form-control">										
									</div>
									<div class="form-group col-md-4">
										<label>Apellidos</label>
									 	<input type="text" name="lastname" class="form-control">									
									</div>
									<div class="form-group col-md-4">
										<label>DNI</label>
									 	<input type="text" name="dni" class="form-control">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>Email</label>
									 	<input type="email" name="email"" class="form-control">										
									</div>
									<div class="form-group col-md-6">
										<label>Contraseña</label>
									 	<input type="password" name="contrasena" class="form-control">
									</div>
								</div>								
								<input class="btn btn-primary col" type="submit" value="Insertar">
							</form>
						</div>
					</div>
					<div class="card">
						<div class="card-header" role="tab" id="actualizar">
							<h5 class="mb-0">
								<a href="#actualizar-tab" data-toggle="collapse" aria-expanded="true" aria-controls="actualizar-tab">
									Actualizar consulta
								</a>
							</h5>
						</div>				
						<div id="actualizar-tab" class="collapse" role="tabpanel" aria-labelledby="actualizar" data-parent="#acordion">
							<form method="post" action="php/users/update_users.php">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Id de Usuarios</label>
										<select name="idusers" id="idusers" class="form-control">
											<option value="0">N°</option>
											<?php 
												require_once('php/class/Vet.class.php');
												$users = new User;
												$users = $users->select();

												 while ($row = mysqli_fetch_assoc($users)) {
												 	echo "<option value=".$row['idUsuarios'].">".$row['idUsuarios']."</option>";
												 }
											 ?>
										</select>										
									</div>
									<div class="form-group col-md-4">
										<label>Nombre</label>
										<input type="text" name="name" id="name" class="form-control">
									</div>
									<div class="form-group col-md-4">
										<label>Apellidos</label>
										<input type="text" name="lastname" id="lastname" class="form-control">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>DNI</label>
										<input type="text" name="dni" id="dni" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<label>Email</label>
										<input type="email" name="email" id="email" class="form-control">
									</div>
								</div>
								<input class="btn btn-primary col" type="submit" value="Actualizar">
							</form>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Consultas</h4>
						<input type="search" id="search-users" name="search-users" placeholder="Buscar" class="form-control">
						<div id="table-search-users"></div>	
					</div>
				</div>				
			</div>
			<footer class="col-sm-12">
				<div class="row">
					<div class="col-md-8">
						<label>Sistema de Control Veterinario en versión Alpha</label>
					</div>
					<div class="col-md-4 text-right">
						<label>
							Dame una mano con el proyecto :D <a href="mailto:cpmarcoo@gmail.com">cpmarcoo@gmail.com</a>
						</label>
					</div>
				</div>				
			</footer>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/tether.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="ajax/ajax.js"></script>
	
</body>
</html>