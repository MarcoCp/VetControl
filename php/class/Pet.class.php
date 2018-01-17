<?php 
/**
* Clase Mascota
	Conexion a la tabla Mascotas
*/
require('ConnectionDB.class.php');

class Pet
{
	
	function __construct()
	{
		
	}

	public function insert($idclient,$name,$species,$race,$haircolor,$birthdate)
	{
		$insertar = new ConnectionDB;
		$insertar->query("INSERT Mascotas(idMascotas, Clientes_idClientes, Nombre, Especie, Raza, ColorPelo, FechaNacimiento) VALUES ('',$idclient,'$name','$species','$race','$haircolor','$birthdate')");

 	}

	public function select()
	{
		$insert = new ConnectionDB;
		$insert = $insert->query("SELECT * FROM Mascotas ORDER BY idMascotas DESC");
		return $insert;


		// if ($order == 1) {
		// 	$insert = $insert->query("SELECT * FROM Mascotas ORDER BY idMascotas DESC");
		// 	return $insert;
		// } 
		// else{
		// 	$insert = $insert->query("SELECT * FROM Mascotas ORDER BY idMascotas ASC");
		// 	return $insert;
		// }
		
	}
}

 ?>