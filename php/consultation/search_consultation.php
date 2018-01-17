<?php 
	require('../class/Vet.class.php');

	$petition = $_POST['query'];

	$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT `idConsultas`, `Clientes`.`Nombres`AS `nomcliente`, `Mascotas`.`Nombre`AS `nommascota`, `Fecha`, `Consulta`, `Descripcion`, `Costo` FROM `Consultas` INNER JOIN `Clientes` on `Clientes`.`idClientes` = `Consultas`.`Mascotas_Clientes_idClientes` INNER JOIN `Mascotas` on `Mascotas`.`idMascotas` = `Consultas`.`Mascotas_idMascotas` ORDER BY `idConsultas` DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT `idConsultas`, `Clientes`.`Nombres`AS `nomcliente`, `Mascotas`.`Nombre`AS `nommascota`, `Fecha`, `Consulta`, `Descripcion`, `Costo` FROM `Consultas` INNER JOIN `Clientes` on `Clientes`.`idClientes` = `Consultas`.`Mascotas_Clientes_idClientes` INNER JOIN `Mascotas` on `Mascotas`.`idMascotas` = `Consultas`.`Mascotas_idMascotas`  WHERE idMascotas LIKE '%".$q."%' OR `Clientes`.`Nombres` LIKE '%".$q."%' OR `Mascotas`.`Nombre` LIKE '%".$q."%' OR `Fecha` LIKE '%".$q."%' OR `Consulta` LIKE '%".$q."%' OR `Costo` LIKE '%".$q."%'";
		}

		$ConnectionDB = $ConnectionDB->query($query);

		if ($ConnectionDB->num_rows > 0) {
			$response.="<table class='table table-hover table-responsive'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>							 		
							 		<th>Dueño</th>
							 		<th>Mascota</th>
							 		<th>Fecha</th>
							 		<th>Consulta</th>
							 		<th>Descripción</th>
							 		<th>Costo</th>
							 	</tr>
							</thead>
							<tbody>";
			while ($row = $ConnectionDB->fetch_assoc()) {
						$response.="<tr>
							<td>".$row['idConsultas']."</td>
							<td>".$row['nomcliente']."</td>
							<td>".$row['nommascota']."</td>
							<td>".$row['Fecha']."</td>
							<td>".$row['Consulta']."</td>
							<td>".$row['Descripcion']."</td>
							<td>".$row['Costo']."</td>			
							</tr>";
					}

			$response.="</tbody></table>";		
		} else {
			$response.="<table class='table table-responsive'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>							 		
							 		<th>Dueño</th>
							 		<th>Mascota</th>
							 		<th>Fecha</th>
							 		<th>Consulta</th>
							 		<th>Descripción</th>
							 		<th>Costo</th>
							 	</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='7'><h2>Su busqueda no dio resultado</h2></th>
								</tr>
							</tbody>
						</table>";
		}

		echo $response;

	// $search = new Client;

	// $search = $search->search($_POST['query']);

	// echo $search;
 ?>