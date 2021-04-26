<?php
include("conexion_bd.php");
$idFamilia = $_POST["idFamilia"];
$consulta = "Select id,nombre from platos where idFamilia=$idFamilia";
$datos = mysqli_query($conexion,$consulta);
$platos = array();
while ($fila = mysqli_fetch_assoc($datos)) {
	$platos[]=$fila;
}
mysqli_close($conexion);
echo json_encode($platos);
?>