<?php
include("conexion_bd.php");
$nombre = $_POST["nombre"];
$consulta = "Select * from autores where nombre like '$nombre%'";
$datos = mysqli_query($conexion,$consulta);
$usuarios = array();
while ($fila = mysqli_fetch_assoc($datos)) {
	$usuarios[]=$fila;
}
mysqli_close($conexion);
echo json_encode($usuarios);
?>