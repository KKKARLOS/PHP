<?php
	$email = $_GET['email'];
	//PRINT "usuario".$email
	
	//abrir conexion
	require("conexionbd.php");

	//ejecutamos la query MySQL

	$query = "delete from usuarios where email='$email'";

	mysqli_query($conexion, $query);
	
	// Cerrar la conexión
	mysqli_close($conexion);
	header("Location:catalogoUsuarios.php");
?>