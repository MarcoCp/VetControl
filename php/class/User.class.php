<?php 
/**
* Clase Usuarios
	Conexiones a Tabla Cliente
*/
require_once('ConnectionDB.class.php');

class Users
{

	function __construct()
	{
		
	}

	function insert($name,$lastname,$dni,$email,$contrasena)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT usuarios(idUsuarios,Nombres,Apellidos,Dni,Email,Contrasena) VALUES ('','$name','$lastname','$dni','$email','$contrasena')");

	}

	function select($order)
	{
		$insert = new ConnectionDB;
		// $insert = $insert->query("SELECT * FROM usuarios ORDER BY idusuarios DESC");
		// return $insert;


		if ($order == 1) {
			$insert = $insert->query("SELECT * FROM usuarios ORDER BY idusuarios DESC");
			return $insert;
		} 
		else{
			$insert = $insert->query("SELECT * FROM usuarios ORDER BY idusuarios ASC");
			return $insert;
		}
		
	}

	function update($idUsers,$name,$lastname,$dni,$email)
	{
		$update = new ConnectionDB;
		$update->query("UPDATE `usuarios` SET `Nombres`='$name' , `Apellidos`='$lastname', `Dni`='$dni','Email' = '$email' WHERE `usuarios`.`idUsuarios` = $idUsers");
	}

	function search($petition)
	{
		$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM Usuarios ORDER BY idUsuarios DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM Usuarios WHERE idUsuarios LIKE %$q% OR Nombres LIKE %$q% OR Apellidos LIKE %$q% OR Dni LIKE %$q% OR email LIKE %$q%" ;
		}

		$ConnectionDB = $ConnectionDB->query($query);

		if ($ConnectionDB->num_rows > 0) {
			$response.="<table class='table'>
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
		}

		return $response;
		$ConnectionDB->close();
	}


}
