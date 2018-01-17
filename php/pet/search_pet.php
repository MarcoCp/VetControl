<?php 
	require('../class/Vet.class.php');

	$petition = $_POST['query'];

	$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT `idMascotas`,Clientes.Nombres AS nomcliente,Clientes.Apellidos AS apecliente,`Nombre`,`Especie`,`Raza`,`ColorPelo`,`FechaNacimiento`,`Foto` FROM `Mascotas` INNER JOIN Clientes on Clientes.idClientes = Mascotas.Clientes_idClientes ORDER BY idMascotas DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT `idMascotas`,Clientes.Nombres AS nomcliente,Clientes.Apellidos AS apecliente,`Nombre`,`Especie`,`Raza`,`ColorPelo`,`FechaNacimiento`,`Foto` FROM `Mascotas` INNER JOIN Clientes on Clientes.idClientes = Mascotas.Clientes_idClientes WHERE idMascotas LIKE '%".$q."%' OR Nombre LIKE '%".$q."%' OR especie LIKE '%".$q."%' OR raza LIKE '%".$q."%' OR colorpelo LIKE '%".$q."%' OR Clientes.Nombres LIKE '%".$q."%' OR Clientes.Apellidos LIKE '%".$q."%'";
		}

		$ConnectionDB = $ConnectionDB->query($query);

		if ($ConnectionDB->num_rows > 0) {
			$response.="<table class='table table-hover table-responsive'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>							 		
							 		<th>Nombre</th>
							 		<th>Especie</th>
							 		<th>Raza</th>
							 		<th>Color de Pelo</th>
							 		<th>Fecha de Nacimiento</th>
							 		<th>Dueño</th>
							 		<th>Foto</th>
							 	</tr>
							</thead>
							<tbody>";
			while ($row = $ConnectionDB->fetch_assoc()) {
						$response.="<tr>
							<td>".$row['idMascotas']."</td>
							<td>".$row['Nombre']."</td>
							<td>".$row['Especie']."</td>
							<td>".$row['Raza']."</td>
							<td>".$row['ColorPelo']."</td>
							<td>".$row['FechaNacimiento']."</td>
							<td>".$row['nomcliente']." ".$row['apecliente']."</td>
							<td><img class='rounded-circle' width='25px' height='25px' src='".$row['Foto']."'></td>			
							</tr>";
					}

			$response.="</tbody></table>";		
		} else {
			$response.="<table class='table table-responsive'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>							 		
							 		<th>Nombre</th>
							 		<th>Especie</th>
							 		<th>Raza</th>
							 		<th>Color de Pelo</th>
							 		<th>Fecha de Nacimiento</th>
							 		<th>Dueño</th>
							 		<th>Foto</th>
							 	</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='8'><h2>Su busqueda no dio resultado</h2></th>
								</tr>
							</tbody>
						</table>";
		}

		echo $response;

	// $search = new Client;

	// $search = $search->search($_POST['query']);

	// echo $search;
 ?>