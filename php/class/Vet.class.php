<?php 
/**
* Conexion a db MySql con Mysqli
*/
class ConnectionDB extends Mysqli
{
	
	private $dbhost = 'localhost';
	private $dbuser = 'parameta_vet';
	private $dbpass = 'gatitoslindos-22';
	private $dbname = 'parameta_vet';

	function __construct()
	{
		try {
			parent::__construct($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);

		} catch (Exception $e) {
			echo $e;
		}
	}
}

/**
* Validar
*/
class Sessions 
{
	
	public function ValidateUsers($email,$pass)
	{

		$connection = new ConnectionDB();

		try {
			// $pass = password_verify($pass, $passHash);

			$connection = $connection->query("SELECT * FROM `Usuarios` WHERE `Email`='$email' AND `Contrasena`='$pass'");

			// $connection = $connection->fetch_assoc();
			$connection = mysqli_fetch_assoc($connection);

			if ($connection['idUsuarios']==!null) {

				session_start();
				$_SESSION['idUsuarios'] = $connection['idUsuarios'];
				$_SESSION['Nombres'] = $connection['Nombres'];
				$_SESSION['Apellidos'] = $connection['Apellidos'];
				$_SESSION['DNI'] = $connection['DNI'];
				$_SESSION['Email'] = $connection['Email'];

				return true;
			}
			else{
				return false;
			}

		} catch (Exception $e) {
			echo $e;
		}
	}
	// public function CloseUsers()
	// {
	// 	session_destroy();
	// }
}

/**
* Clase Usuarios
	Conexiones a Tabla Usuarios
*/
class User
{

	function __construct()
	{
		
	}

	function insert($name,$lastname,$dni,$email,$contrasena)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT INTO `Usuarios` (`idUsuarios`, `Nombres`, `Apellidos`, `Dni`, `Email`, `Contrasena`) VALUES (NULL,'$name','$lastname','$dni','$email','$contrasena')");
	}

	function select($order)
	{
		$select = new ConnectionDB;
		// $select = $select->query("SELECT * FROM Usuarios ORDER BY idUsuarios DESC");
		// return $select;


		if ($order == 1) {
			$select = $select->query("SELECT * FROM Usuarios ORDER BY idUsuarios DESC");
			return $select;
		} 
		else{
			$select = $select->query("SELECT * FROM Usuarios ORDER BY idUsuarios ASC");
			return $select;
		}
		
	}

	function update($idUsers,$name,$lastname,$dni,$email)
	{
		$update = new ConnectionDB;
		$update->query("UPDATE `Usuarios` SET `Nombres` = '$name', `Apellidos` = '$lastname', `Dni` = '$dni', `Email` = '$email' WHERE `Usuarios`.`idUsuarios` = $idUsers;");
	}

	function search($petition)
	{
		$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM Usuarios ORDER BY idUsuarios DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM Usuarios WHERE idUsuarios LIKE %$q% OR Nombres LIKE %$q% OR Apellidos LIKE %$q% OR Dni LIKE %$q% OR Email LIKE %$q%" ;
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

/**
* Clase cliente
	Conexiones a Tabla Cliente
*/
class Client
{

	function __construct()
	{
		
	}

	function insert($name,$lastname,$phone,$dni)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT INTO Clientes(idClientes,Nombres,Apellidos,Telefono,DNI) VALUES ('','$name','$lastname','$phone','$dni')");

	}

	function select($order)
	{
		$insert = new ConnectionDB;
		// $insert = $insert->query("SELECT * FROM Clientes ORDER BY idClientes DESC");
		// return $insert;


		if ($order == 1) {
			$insert = $insert->query("SELECT * FROM Clientes ORDER BY idClientes DESC");
			return $insert;
		} 
		else{
			$insert = $insert->query("SELECT * FROM Clientes ORDER BY idClientes ASC");
			return $insert;
		}
		
	}

	function update($idclient,$name,$lastname,$phone,$dni)
	{
		$update = new ConnectionDB;
		$update->query("UPDATE `Clientes` SET `Nombres`='$name' , `Apellidos`='$lastname', `Telefono`='$phone', `DNI`='$dni' WHERE `Clientes`.`idClientes` = $idclient");
	}

	function search($petition)
	{
		$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM Clientes ORDER BY idClientes DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM Clientes WHERE idClientes LIKE %$q% OR Nombres LIKE %$q% OR Apellidos LIKE %$q% OR Telefono LIKE %$q%";
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

/**
* Clase Mascota
	Conexion a la tabla Mascotas
*/
class Pet
{
	
	function __construct()
	{
		
	}

	function insert($idclient,$name,$species,$race,$haircolor,$birthdate,$photo)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT INTO `Mascotas`(`idMascotas`, `Clientes_idClientes`, `Nombre`, `Especie`, `Raza`, `ColorPelo`, `FechaNacimiento`, `Foto`) VALUES (NULL,$idclient,'$name','$species','$race','$haircolor','$birthdate','$photo')");

 	}

	function select($order)
	{
		$select = new ConnectionDB;
		// $select = $select->query("SELECT * FROM Mascotas ORDER BY idMascotas DESC");
		// return $select;


		if ($order == 1) {
			$select = $select->query("SELECT * FROM Mascotas ORDER BY idMascotas DESC");
			return $select;
		} 
		else{
			$select = $select->query("SELECT * FROM Mascotas ORDER BY idMascotas ASC");
			return $select;
		}
		
	}

	function select_pet($idclient)
	{
		$select = new ConnectionDB;
		$select = $select->query("SELECT * FROM `Mascotas` WHERE `Clientes_idClientes`=$idclient");
		return $select;
	}

	function select_Multi()
	{
		$select = new ConnectionDB;
		$select = $select->query("SELECT `idMascotas`,Clientes.Nombres AS nomcliente,Clientes.Apellidos AS apecliente,`Nombre`,`Especie`,`Raza`,`ColorPelo`,`FechaNacimiento` FROM `Mascotas` INNER JOIN Clientes on Clientes.idClientes = Mascotas.Clientes_idClientes");
		return $select;
	}

	function update($id,$idclient,$name,$species,$race,$haircolor,$birthdate)
	{
		$update = new ConnectionDB;
		$update->query("UPDATE `Mascotas` SET `Clientes_idClientes` = '$idclient', `Nombre` = '$name', `Especie` = '$species', `Raza` = '$race', `ColorPelo` = '$haircolor', `FechaNacimiento` = '$birthdate' WHERE `Mascotas`.`idMascotas` = $id");
	}

	function search($petition)
	{
		$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM Mascotas ORDER BY idMascotas DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM Mascotas WHERE idMascotas LIKE %$q% OR Nombres LIKE %$q% OR Apellidos LIKE %$q% OR Telefono LIKE %$q%";
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
							<td>".$row['idMascotas']."</td>
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

/**
* Clase Consultas
	Conexiones a Tabla Consultas
*/
class Consultation
{

	function __construct()
	{
		
	}

	function insert($idCliente,$idMascota,$fecha,$consulta,$descripcion,$costo)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT INTO `Consultas` (`idConsultas`, `Mascotas_Clientes_idClientes`, `Mascotas_idMascotas`, `Fecha`, `Consulta`, `Descripcion`, `Costo`) VALUES (NULL,'$idCliente','$idMascota','$fecha','$consulta','$descripcion','$costo')");
	}

	function select($order)
	{
		$select = new ConnectionDB;
		// $select = $select->query("SELECT * FROM Consultas ORDER BY idConsultas DESC");
		// return $select;


		if ($order == 1) {
			$select = $select->query("SELECT * FROM Consultas ORDER BY idConsultas DESC");
			return $select;
		} 
		else{
			$select = $select->query("SELECT * FROM Consultas ORDER BY idConsultas ASC");
			return $select;
		}
		
	}

	function selectCanvas()
	{
		$select = new ConnectionDB;

		$select->query("SET lc_time_names = 'es_MX';");
		$select = $select->query("SELECT MonthName(Fecha) AS x, count(*) AS y from Consultas where year(Fecha) = year(curdate()) group by MonthName(fecha) ORDER BY `x` DESC");
		// $data_points = array();

		// while ($row = mysqli_fetch_assoc($select)) {
		// 	$point = array("valorx" => $row['x'], "valory" => $row['y']);
		// 	array_push($data_points, $point);
		// }

		// return json_encode($data_points);

		return $select;
	}

	function update($id,$idclient,$idpet,$date,$consultation,$description,$cost)
	{
		$update = new ConnectionDB;
		$update->query("UPDATE `Consultas` SET `Mascotas_Clientes_idClientes` = $idclient, `Mascotas_idMascotas` = $idpet, `Fecha` = '$date', `Consulta` = '$consultation', `Descripcion` = '$description', `Costo` = $cost WHERE `Consultas`.`idConsultas` = $id");

	}

	function search($petition)
	{
		$ConnectionDB = new ConnectionDB;
		$response = "";
		$query="SELECT * FROM Consultas ORDER BY idConsultas DESC";

		if ($petition == !null) {
			$q = $ConnectionDB->real_escape_string($petition);
			$query = "SELECT * FROM Consultas WHERE idConsultas LIKE %$q% OR Nombres LIKE %$q% OR Apellidos LIKE %$q% OR Dni LIKE %$q% OR Email LIKE %$q%" ;
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
							<td>".$row['idConsultas']."</td>
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


 ?>