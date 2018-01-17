<?php 

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

try {

	require_once('../class/Vet.class.php');

	if ($name and $lastname and $dni and $email and $contrasena == !null) {
		$user = new User;
		$user->insert($name,$lastname,$dni,$email,$contrasena);
		echo "<script type='text/javascript'>location.href='../../dashboard-usuarios.php';</script>";	
	} else {
		echo "<script type='text/javascript'>alert('Debe ingresar todo los campos');</script>";
		echo "<script type='text/javascript'>location.href='../../dashboard-usuarios.php';</script>";	
	}

} catch (Exception $e) {
	echo $e;
}

 ?>