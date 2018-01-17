<?php

	require('class/Vet.class.php');

	$name=$_POST['name'];
	$pass=$_POST['pass'];

	$validate = new Sessions;

	$validate = $validate->ValidateUsers($name,$pass);
	
	echo $validate;

	// if ($validate==true) {
	// 	header('location:../dashboard.php');
	// } else {
	// 	echo "Usuario o Clave incorrecta";
	// }
	

 ?>