<?php 
/**
* Validar
*/
class Validate 
{
	
	public function ValidateUsers($name,$pass)
	{
		require_once('class/ConnectionDB.class.php');

		$connection = new ConnectionDB();

		try {

			$connection = $connection->query("SELECT * FROM users WHERE name = '$name' and pass = '$pass'");

			$connection = mysqli_num_rows($connection);

			if ($connection==0) {
				return false;
			}
			else{
				return true;
			}

		} catch (Exception $e) {
			echo $e;
		}
	}
}

 ?>