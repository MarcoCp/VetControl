<?php 
require('../class/Vet.class.php');

$id = $_POST['id'];

$update = new ConnectionDB;

$update = $update->query("SELECT Clientes_idClientes FROM Mascotas WHERE idMascotas = $id");

$row = mysqli_fetch_assoc($update);

echo $row['Clientes_idClientes'];