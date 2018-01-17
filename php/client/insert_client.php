<?php 

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$dni = $_POST['dni'];

try {

	include('../class/Vet.class.php');

	if ($name and $lastname and $phone and $dni== !null) {
		$client = new Client;
		$client->insert($name,$lastname,$phone,$dni);
		echo "<script type='text/javascript'>location.href='../../dashboard-cliente.php';</script>";	
	} else {
		echo "<script type='text/javascript'>alert('Debe ingresar todo los campos');</script>";
		echo "<script type='text/javascript'>location.href='../../dashboard-cliente.php';</script>";	
	}

} catch (Exception $e) {
	echo $e;
}

 ?>