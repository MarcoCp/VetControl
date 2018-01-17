<?php 
	require('../class/Vet.class.php');

	$petition = $_POST['query'];

	$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM Usuarios ORDER BY idUsuarios DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM Usuarios WHERE idUsuarios LIKE '%".$q."%' OR Nombres LIKE '%".$q."%' OR Apellidos LIKE '%".$q."%' OR Dni LIKE '%".$q."%' OR Email LIKE '%".$q."%'";
		}

		$ConnectionDB = $ConnectionDB->query($query);

		if ($ConnectionDB->num_rows > 0) {
			$response.="<table class='table table-hover table-responsive'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>
							 		<th>Nombre</th>
							 		<th>Apellido</th>
							 		<th>Dni</th>
							 		<th>Email</th>
							 	</tr>
							</thead>
							<tbody>";
			while ($row = $ConnectionDB->fetch_assoc()) {
						$response.="<tr>
							<td>".$row['idUsuarios']."</td>
							<td>".$row['Nombres']."</td>
							<td>".$row['Apellidos']."</td>
							<td>".$row['Dni']."</td>
							<td>".$row['Email']."</td>
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
							 		<th>Dni</th>
							 		<th>Email</th>
							 	</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='4'><h2>Su busqueda no dio resultado</h2></th>
								</tr>
							</tbody>
						</table>";
		}

		echo $response;

	// $search = new Client;

	// $search = $search->search($_POST['query']);

	// echo $search;
 ?>