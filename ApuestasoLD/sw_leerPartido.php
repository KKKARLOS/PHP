<?php
include("conexionbd.php");
$idpartido = $_POST["idpartido"];
$consulta = "SELECT idPartido, nombre, fecha, hora, minutoGol, estado FROM partidos where idpartido='$idpartido'";
$datos = mysqli_query($conexion,$consulta);
$partido = array();
while ($fila = mysqli_fetch_assoc($datos)) {
	$partido[]=$fila;
}
mysqli_close($conexion);
echo json_encode($partido);
?>