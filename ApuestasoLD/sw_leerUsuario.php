<?php
include("conexionbd.php");
$email = $_POST["email"];
$consulta = "Select nombre, password, saldo from usuarios where email='$email'";
$datos = mysqli_query($conexion,$consulta);
$usuario = array();
while ($fila = mysqli_fetch_assoc($datos)) {
	$usuario[]=$fila;
}
mysqli_close($conexion);
echo json_encode($usuario);
?>