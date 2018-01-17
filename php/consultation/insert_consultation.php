<?php 

$idclient =$_POST['idClient_Consultation'];
$idpet = $_POST['idPet_Consultation'];
$date = $_POST['date_Consultation'];
$consultation = $_POST['query_Consultation'];
$description = $_POST['description_Consultation'];
$cost = $_POST['cost_Consultation'];

try {

	require_once('../class/Vet.class.php');
	if ($idclient and $idpet and $date and $consultation and $description and $cost == !null) {
		$Consultation = new Consultation;
		$Consultation->insert($idclient,$idpet,$date,$consultation,$description,$cost);
		echo "<script type='text/javascript'>location.href='../../dashboard-consultas.php';</script>";			
	} else {
		echo "<script type='text/javascript'>alert('Debe ingresar todo los campos');</script>";
		echo "<script type='text/javascript'>location.href='../../dashboard-consultas.php';</script>";
	}


} catch (Exception $e) {
	echo $e;
}

 ?>