<?php
	//Necesario para gestionar variables de session
	session_start();
	
	// Eliminación de las variables de session
	
	unset($_SESSION["autorizado"]);
	unset($_SESSION["email"]);
	
	//Redirigir a la página de login

	header("Location:login.php");
?>