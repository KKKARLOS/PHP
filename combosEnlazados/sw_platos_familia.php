<?php
include("conexion_bd.php");
$consulta = "Select idFamilia,nombre from platosfamilia";
$datos = mysqli_query($conexion,$consulta);
$platos = array();
while ($fila = mysqli_fetch_assoc($datos)) {
	$platos[]=$fila;
}
mysqli_close($conexion);
echo json_encode($platos);
?>