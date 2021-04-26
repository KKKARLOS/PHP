<?php
	require("funciones.php");
	//Recojo los valores de los inputs enviados al submitir por post
	$email = $_POST["txtEmail"];
	$password = $_POST["txtPassword"];

	// Validar Password

	if (validarAcceso($email, $password))
	{
		$_SESSION["autorizado"] = true;
		$_SESSION["email"] = $_POST["txtEmail"];
		$pagina_destino="intranet.php";		
	}
	else
	{
		$_SESSION["autorizado"] = false;
		$pagina_destino="login.php";
	}
	// Si la clave no es correcta redirijo a la pagina de login en caso contrario 
	// permito entrar a la intranet
	
	header("Location:$pagina_destino");
?>
