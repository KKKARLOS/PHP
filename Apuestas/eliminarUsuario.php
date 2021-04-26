<?php
	require("funciones.php");
	$email = $_GET['email'];
	eliminarUsuario($email);
	header("Location:catalogoUsuarios.php");
?>

