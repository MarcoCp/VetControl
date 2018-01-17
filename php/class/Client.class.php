<?php 
/**
* Clase cliente
	Conexiones a Tabla Cliente
*/
require('ConnectionDB.class.php');

class Client
{

	function __construct()
	{
		
	}

	public function insert($name,$lastname,$phone)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT clientes(idClientes,Nombres,Apellidos,Telefono) VALUES ('','$name','$lastname','$phone')");

	}

	public function select($order)
	{
		$insert = new ConnectionDB;
		// $insert = $insert->query("SELECT * FROM clientes ORDER BY idClientes DESC");
		// return $insert;


		if ($order == 1) {
			$insert = $insert->query("SELECT * FROM clientes ORDER BY idClientes DESC");
			return $insert;
		} 
		else{
			$insert = $insert->query("SELECT * FROM clientes ORDER BY idClientes ASC");
			return $insert;
		}
		
	}

	public function search($petition)
	{
		$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM clientes ORDER BY idClientes DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM clientes WHERE idClientes LIKE %$q% OR Nombres LIKE %$q% OR Apellidos LIKE %$q% OR Telefono LIKE %$q%";
		}

		$ConnectionDB = $ConnectionDB->query($query);

		if ($ConnectionDB->num_rows > 0) {
			$response.="<table class='table'>
							<thead class='thead-dark'>
							 	<tr>
							 		<th>ID</th>
							 		<th>Nombre</th>
							 		<th>Apellido</th>
							 		<th>Telefono</th>
							 	</tr>
							</thead>
							<tbody>";
			while ($row = $ConnectionDB->fetch_assoc()) {
						$response.="<tr>
							<td>".$row['idClientes']."</td>
							<td>".$row['Nombres']."</td>
							<td>".$row['Apellidos']."</td>
							<td>".$row['Telefono']."</td>
							</tr>";
					}

			$response.="</tbody></table>";		
		}

		return $response;
		$ConnectionDB->close();
	}


}


class Pet
{
	
	function __construct()
	{
		
	}

	public function insert($idclient,$name,$species,$race,$haircolor,$birthdate)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT mascotas(idmascotas, Clientes_idClientes, Nombre, Especie, Raza, ColorPelo, FechaNacimiento) VALUES ('',$idclient,'$name','$species','$race','$haircolor','$birthdate')");

 	}

	public function select()
	{
		$insert = new ConnectionDB;
		$insert = $insert->query("SELECT * FROM mascotas ORDER BY idmascotas DESC");
		return $insert;


		// if ($order == 1) {
		// 	$insert = $insert->query("SELECT * FROM mascotas ORDER BY idmascotas DESC");
		// 	return $insert;
		// } 
		// else{
		// 	$insert = $insert->query("SELECT * FROM mascotas ORDER BY idmascotas ASC");
		// 	return $insert;
		// }
		
	}
}
 ?>