<?php //Usaremos variables de sesión:
session_start();
//Obtenemos la posición seleccionada:
$pos_jugador = $_GET["pos"];
//Obtenemos de forma aleatoria la posición de la calavera:
$pos_calavera = rand(1,3);
//Contamos el intento realizado:
if (isset($_SESSION["total"])) {
	$_SESSION["total"]++;
} else {
	$_SESSION["total"]=1;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 400px; margin: 0 auto; border-style: double; margin-top:20px; padding: 10px; text-align: center;">
	<?php
	$fin_partida = false;
	for ($i=1;$i<=3;$i++) {
		$imagen = "ic_int.png";
		if ($i==$pos_jugador) {
			if ($i==$pos_calavera) {
				$imagen = "ic_cal.png";
				$fin_partida = true;
			} else {
				$imagen = "ic_premio.png";
			}
		}
		echo "<img src='$imagen' width='100'>";
	}
	echo "<br/>TOTAL:".$_SESSION["total"];
	if ($fin_partida) {
		//Eliminamos las variables de sesión:
		?>
		<form name="formulario" method="post" action="guardar_puntos.php">
		<table>
			<tr>
				<td>
		<input type="text" id="txtNombre" name="txtNombre" placeholder="Introduzca el nombre del jugador" style="width:400px">						
				</td>
			</tr>
			<tr>
				<td>
		<input style="width:110px;height: 30px" type="submit" name="btnGuardar" id="btnGuardar" value="Guardar Juego" />					
				</td>
			</tr>
		</table>

		</form>
		//echo "<p><small>Fin!! <a href='index.php'>Nueva partida</a></small></p>";
	<?php
	} else {
		echo "<p><small><a href='index.php'>Jugar de nuevo</a></small></p>";
	}
	?>

</body>
</html>