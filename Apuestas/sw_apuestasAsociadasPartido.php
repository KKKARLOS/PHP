<?php
include("conexionbd.php");
$idpartido = $_POST["idpartido"];

$datos = mysqli_query($conexion,"select idApuesta from apuestas where idPartido = '$idpartido'");
$total = mysqli_affected_rows($conexion);

if($total!=0)
	echo true;
else
	echo false;
//Devolvemos la respuesta:
?>