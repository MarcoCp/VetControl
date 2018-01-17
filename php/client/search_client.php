<?php 
	require('../class/Vet.class.php');

	$petition = $_POST['query'];

	$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM Clientes ORDER BY idClientes DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM Clientes WHERE idClientes LIKE '%".$q."%' OR Nombres LIKE '%".$q."%' OR Apellidos LIKE '%".$q."%' OR Telefono LIKE '%".$q."%'";
		}

		$ConnectionDB = $ConnectionDB->query($query);

		if ($ConnectionDB->num_rows > 0) {
			$response.="<table class='table table-hover table-responsive'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>
							 		<th>Nombre</th>
							 		<th>Apellido</th>
							 		<th>Teléfono</th>
							 		<th>DNI</th>
							 	</tr>
							</thead>
							<tbody>";
			while ($row = $ConnectionDB->fetch_assoc()) {
						$response.="<tr>
							<td>".$row['idClientes']."</td>
							<td>".$row['Nombres']."</td>
							<td>".$row['Apellidos']."</td>
							<td>".$row['Telefono']."</td>
							<td>".$row['DNI']."</td>
							</tr>";
					}

			$response.="</tbody></table>";		
		} else {
			$response.="<table class='table table-responsive'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>
							 		<th>Nombre</th>
							 		<th>Apellido</th>
							 		<th>Teléfono</th>
							 		<th>DNI</th>
							 	</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='5'><h2>Su busqueda no dio resultado</h2></th>
								</tr>
							</tbody>
						</table>";
		}

		echo $response;

	// $search = new Client;

	// $search = $search->search($_POST['query']);

	// echo $search;
 ?>