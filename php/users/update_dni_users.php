<?php 
require('../class/Vet.class.php');

$id = $_POST['id'];

$update = new ConnectionDB;

$update = $update->query("SELECT Dni FROM Usuarios WHERE idUsuarios = $id");

$row = mysqli_fetch_assoc($update);

echo $row['Dni'];