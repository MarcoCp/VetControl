<?php 
require('../class/Vet.class.php');

$id = $_POST['id'];

$update = new ConnectionDB;

$update = $update->query("SELECT DNI FROM Clientes WHERE idClientes = $id");

$row = mysqli_fetch_assoc($update);

echo $row['DNI'];