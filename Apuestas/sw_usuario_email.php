<?php
include("conexionbd.php");
$email = $_POST["email"];

$datos = mysqli_query($conexion,"select email from usuarios where email = '$email'");
$total = mysqli_affected_rows($conexion);

if($total!=0)
	echo "true";
else
	echo "false";
//Devolvemos la respuesta:
?>