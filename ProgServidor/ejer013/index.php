<?php
require("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 600px; margin: 0 auto; border-style: double; margin-top:20px; padding: 10px; text-align: center;">
	<h3>Si encuentras la calavera pierdes!</h3>
	<?php 
	//Comprobamos si hay una partida en juego:
	if (!isset($_SESSION["idPartida"])) {
		//Creamos una nueva partida:
		$_SESSION["idPartida"] = crearPartida();
	}
	//Obtenemos la secuencia actual:
	$posiciones = obtenerSecuencia($_SESSION["idPartida"]);
	//Comprobamos si tenemos datos asociados, sino, creamos una nueva partida
	if (mysqli_num_rows($posiciones)==0) {
		$_SESSION["idPartida"] = crearPartida();
		$posiciones = obtenerSecuencia($_SESSION["idPartida"]);
	}
	$posicion=0;
	while ($fila = mysqli_fetch_assoc($posiciones)) { 
		$posicion++;
		$id = $fila["id"];
		$posicion = $fila["posicion"];
		$valor = $fila["valor"];
		$pinchado = $fila["pinchado"];
		if ($pinchado>0) {
			echo "<img src='n$valor.jpg' width='40'/>";
		} else {
			echo "<a href='jugada.php?pos=$posicion'><img src='ic_int.png' width='40'></a>";
		}
		?>
	<?php 
	}
	//Mostramos los puntos actuales de la partida:
	$puntuacion = puntuacionTotal($_SESSION["idPartida"]);
	echo "<h3>Puntuación: $puntuacion</h3>";
	?>
</body>
</html>