<?php 
require('../class/Vet.class.php');

$id = $_POST['id'];

$update = new ConnectionDB;

$update = $update->query("SELECT Descripcion FROM Consultas WHERE idConsultas = $id");

$row = mysqli_fetch_assoc($update);

echo $row['Descripcion'];