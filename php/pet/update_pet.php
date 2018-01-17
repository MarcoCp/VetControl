<?php 
$id = $_POST['idpet'];
$idclient =$_POST['idClient'];
$name = $_POST['name'];
$species = $_POST['species'];
$race = $_POST['race'];
$haircolor = $_POST['haircolor'];
$birthdate = $_POST['birthdate'];

try {

	require_once('../class/Vet.class.php');

	if ($id and $idclient and $name and $species and $race == !null) {
		$pet = new Pet;
		$pet->update($id,$idclient,$name,$species,$race,$haircolor,$birthdate);
		echo "<script type='text/javascript'>location.href='../../dashboard-mascotas.php';</script>";	
	} else {
		echo "<script type='text/javascript'>alert('Debe ingresar todo los campos');</script>";
		echo "<script type='text/javascript'>location.href='../../dashboard-mascotas.php';</script>";	
	}

} catch (Exception $e) {
	echo $e;
}
