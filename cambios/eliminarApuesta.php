<?php
	require("funciones.php");
	$idapuesta = $_GET['idApuesta'];
	eliminarApuesta($idapuesta);
	header("Location:apuestas.php");
?>