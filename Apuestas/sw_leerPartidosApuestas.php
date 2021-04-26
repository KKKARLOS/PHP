<?php
include("conexionbd.php");
$email = $_POST["email"];
$consulta = "SELECT idPartido, nombre, DATE_FORMAT(fecha,'%d/%m/%Y') as fecha, hora, minutoGol, estado FROM partidos 
	WHERE idPartido not in ( select idPartido FROM APUESTAS where email='$email') and estado='A' order by fecha desc, hora desc" ;  
	//and   now() + interval 3 hour <= TIMESTAMP(p.fecha,p.hora)
$datos = mysqli_query($conexion,$consulta);
$partido = array();
while ($fila = mysqli_fetch_assoc($datos)) {
	$partido[]=$fila;
}
mysqli_close($conexion);
echo json_encode($partido);
?>