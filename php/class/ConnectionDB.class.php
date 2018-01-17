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


 ?>