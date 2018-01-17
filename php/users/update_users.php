<?php 

$id = $_POST['idusers'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$dni = $_POST['dni'];
$email = $_POST['email'];

try {

	require_once('../class/Vet.class.php');

	if ($id and $name and $lastname and $dni and $email == !null) {
		$users = new User;
		$users->update($id,$name,$lastname,$dni,$email);
		echo "<script type='text/javascript'>location.href='../../dashboard-usuarios.php';</script>";	
	} else {
		echo "<script type='text/javascript'>alert('Debe ingresar todo los campos');</script>";
		echo "<script type='text/javascript'>location.href='../../dashboard-usuarios.php';</script>";	
	}

} catch (Exception $e) {
	echo $e;
}
