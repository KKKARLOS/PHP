<?php
require("funciones.php");
$posicion = $_GET["pos"];
$idPartida = $_SESSION["idPartida"];
//Acciones debidas a hacer click en esa posición:
$fin_partida = clickPosicion($idPartida,$posicion);
if (!$fin_partida) {
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 600px; margin: 0 auto; border-style: double; margin-top:20px; padding: 10px; text-align: center;">
	<h3>Partida finalizada!</h3>
	<?php 
	//Pintamos el estado actual de la partida:
	$posiciones = obtenerSecuencia($_SESSION["idPartida"]);
	$posicion=0;
	while ($fila = mysqli_fetch_assoc($posiciones)) { 
		$posicion++;
		$id = $fila["id"];
		$posicion = $fila["posicion"];
		$valor = $fila["valor"];
		$pinchado = $fila["pinchado"];
		if ($pinchado) {
			echo "<img src='n$valor.jpg' width='40'/>";
		} else {
			echo "<img src='ic_int.png' width='40'>";
		}
		?>
	<?php 
	}
	//Mostramos los puntos actuales de la partida:
	$puntuacion = puntuacionTotal($_SESSION["idPartida"]);
	echo "<h3>Puntuación: $puntuacion</h3>";
	//Eliminamos la info de sesión:
	session_unset();
	?>
	<h3><a href="index.php">Nueva partida</a></h3>
</body>
</html>