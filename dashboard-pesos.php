<!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Dashboard</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">

	<link rel="icon" type="image/png" href="favicon.png"/>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a href="dashboard.php" class="list-group-item list-group-item-action">Escritorio</a>
					<a href="dashboard-cliente.php" class="list-group-item list-group-item-action">Clientes</a>
					<a href="dashboard-mascotas.php" class="list-group-item list-group-item-action">Mascotas</a>
					<a href="dashboard-consultas.php" class="list-group-item list-group-item-action">Consultas</a>
					<a href="dashboard-vacunas.php" class="list-group-item list-group-item-action">Vacunas</a>
					<a href="dashboard-pesos.php" class="list-group-item list-group-item-action active">Pesos</a>
				</div>
			</div>
			<div class="col-md-9">
				<h1>Insertar Mascota</h1>
				<form method="post" action="php/insert_pet.php">
				 	<input type="text" name="idClient">
				 	<input type="text" name="name">
				 	<input type="text" name="species">
				 	<input type="text" name="race">
				 	<input type="text" name="haircolor">
				 	<input type="date" name="birthdate">
					<input type="submit" value="insertar">
				</form>
				<h1>Ver Tabla mascota</h1>
				<div>
				<table class="table">
				 	<thead class="thead-dark">
					 	<tr>
					 		<!-- <th>ID</th>
					 		<th>Nombre</th>
					 		<th>Apellido</th>
					 		<th>Telefono</th> -->
					 	</tr>
					</thead>
					<tbody>
				 	<?php 
				 		require('php/class/Pet.class.php');

						$pet = new Pet;
						
						$pet = $pet->select();

						while ($row1 = mysqli_fetch_assoc($pet)) {
							echo "<tr>";
							echo "<td>".$row1['idmascotas']."</td>";
							echo "<td>".$row1['Clientes_idClientes']."</td>";
							echo "<td>".$row1['Nombre']."</td>";
							echo "<td>".$row1['Especie']."</td>";
							echo "<td>".$row1['Raza']."</td>";
							echo "<td>".$row1['ColorPelo']."</td>";
							echo "<td>".$row1['FechaNacimiento']."</td>";
							echo "</tr>";
						}
					?>
				 	</tbody>
				</table>					
			</div>
		</div>

	</div>
	
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/tether.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/ajax.js"></script>
	
</body>
</html>