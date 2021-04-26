<?php
include("conexionbd.php");
$idapuesta = $_POST["idapuesta"];

$consulta = "SELECT p.idPartido  
FROM partidos p
INNER JOIN apuestas a
on 	  p.idPartido = a.idPartido
WHERE idApuesta = $idapuesta
and   now() + interval 1 hour <= TIMESTAMP(p.fecha,p.hora)
and	  p.estado='A'";

$datos = mysqli_query($conexion,$consulta);
$total = mysqli_affected_rows($conexion);

if($total!=0)
	echo true;
else
	echo false;
//Devolvemos la respuesta:
?>