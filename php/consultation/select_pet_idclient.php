<?php 
$idclient = $_POST['idclient'];

try {
	require_once('../class/Vet.class.php');
	$select = new Pet;
	$select = $select->select_pet($idclient);

	while ($row = mysqli_fetch_assoc($select)) {
		echo "<option value=".$row['idMascotas'].">".$row['idMascotas']." - ".$row['Nombre']."</option>";
	}

} catch (Exception $e) {
	echo $e;
}