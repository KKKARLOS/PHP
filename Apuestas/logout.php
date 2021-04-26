<?php
	//Necesario para gestionar variables de session
	session_start();
	
	// Eliminación de las variables de session
	session_unset();
	/*
	unset($_SESSION["autorizado"]);
	unset($_SESSION["email"]);
	unset($_SESSION["nombre"]);
	unset($_SESSION["rol"]);
	unset($_SESSION["mensaje"]);
	*/
	//Redirigir a la página de login

	header("Location:login.php");
?>