<?php 

$idclient =$_POST['idClient'];
$name = $_POST['name'];
$species = $_POST['species'];
$race = $_POST['race'];
$haircolor = $_POST['haircolor'];
$birthdate = $_POST['birthdate'];

$photo = $_FILES['photo']['name'];
$route = $_FILES['photo']['tmp_name'];
$destination = "img/Mascotas/".$photo;

try {

	require_once('../class/Vet.class.php');
	if ($idclient and $name and $species and $race and $haircolor and $birthdate == !null) {
		
		copy($route,"../../".$destination);

		$destination = "https://vet.parametaleros.com/".$destination;

		$pet = new Pet;
		$pet->insert($idclient,$name,$species,$race,$haircolor,$birthdate,$destination);
		echo "<script type='text/javascript'>location.href='../../dashboard-mascotas.php';</script>";			
	} else {
		echo "<script type='text/javascript'>alert('Debe ingresar todo los campos');</script>";
		echo "<script type='text/javascript'>location.href='../../dashboard-mascotas.php';</script>";
	}


} catch (Exception $e) {
	echo $e;
}

 ?>