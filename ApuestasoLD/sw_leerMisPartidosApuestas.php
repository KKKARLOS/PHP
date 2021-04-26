<?php
include("conexionbd.php");
$email = $_POST["email"];
$consulta = "
SELECT p.idPartido, p.nombre, DATE_FORMAT(p.fecha,'%d/%m/%Y') as fecha, p.hora, p.minutoGol as minutoGolReal, p.estado,a.importe,a.minutoGol as minutoGolApuesta, a.idApuesta 
FROM APUESTAS a INNER JOIN PARTIDOS p ON a.idPartido=p.idPartido WHERE email='$email'";
$datos = mysqli_query($conexion,$consulta);
$partido = array();
while ($fila = mysqli_fetch_assoc($datos)) {
	$partido[]=$fila;
}
mysqli_close($conexion);
echo json_encode($partido);
?>