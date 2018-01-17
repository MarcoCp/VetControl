<?php 

$idclient =$_POST['idClient'];
$name = $_POST['name'];
$species = $_POST['species'];
$race = $_POST['race'];
$haircolor = $_POST['haircolor'];
$birthdate = $_POST['birthdate'];

try {

	include('class/Vet.class.php');

	$pet = new Pet;
	$pet->insert($idclient,$name,$species,$race,$haircolor,$birthdate);

	echo "<script type='text/javascript'>location.href='../dashboard-mascotas.php';</script>
";
} catch (Exception $e) {
	echo $e;
}

 ?>