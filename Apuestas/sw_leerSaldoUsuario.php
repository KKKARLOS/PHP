<?php
include("conexionbd.php");
$email = $_POST["email"];

$consulta="select u.email, (u.saldo - ifnull(sum(a.importe),0)) as disponible from usuarios u left outer join apuestas a on u.email = a.email and a.liquidada=0 where u.email = '$email' group by a.email";

$datos = mysqli_query($conexion,$consulta);
$disponible = 0;
while ($fila = mysqli_fetch_assoc($datos)) {
	$disponible=$fila["disponible"];
}
mysqli_close($conexion);
$valor = number_format($disponible, 0, ",", ".");
//Devolvemos la respuesta:
//$valor = str_replace('.', '', $valor);
echo $valor;

?>