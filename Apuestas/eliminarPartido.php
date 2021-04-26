<?php
	require("funciones.php");
	$idpartido = $_GET['idPartido'];
	eliminarPartido($idpartido);
	header("Location:catalogoPartidos.php");
?>