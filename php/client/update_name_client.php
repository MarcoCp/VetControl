<?php 
require('../class/Vet.class.php');

$id = $_POST['id'];

$update = new ConnectionDB;

$update = $update->query("SELECT Nombres FROM Clientes WHERE idClientes = $id");

$row = mysqli_fetch_assoc($update);

echo $row['Nombres'];