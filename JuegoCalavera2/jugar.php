<?php 
//Usaremos variables de sesión:
session_start();

// Conectando, seleccionando la base de datos
require("conexionbd.php");

//Obtenemos la posición seleccionada:
$casilla_pulsada = $_GET["pos"];
// $casilla_valor= $_GET["val"];

// comprobar que si ha pulsado la calavera (fin partida)
$query = "select valor from posiciones where idPartida=".$_SESSION["idPartida"]." and idCasilla=0";

$result = mysqli_query($conn, $query);

$data=mysqli_fetch_assoc($result);
$casilla_calavera=$data['valor'];

/*while ($fila = mysqli_fetch_row($result)) {
    $casilla_calavera=$fila[valor];
}
*/
$fin_partida = false;

if ($_SESSION["turno"]>=9) $fin_partida = true; 

$query = "update posiciones set pinchado=1 where idPartida=".$_SESSION["idPartida"]." and idCasilla=$casilla_pulsada";

//echo "casilla calavera:$casilla_calavera";
//echo "casilla:$casilla_pulsada";

mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 950px; margin: 0 auto; border-style: double; margin-top:20px; padding: 30px; text-align: center;">
	<?php
	$query = "select idPartida,idCasilla,valor,pinchado from posiciones where IdPartida = ".$_SESSION["idPartida"];

	$result = mysqli_query($conn, $query);
	$casilla_valor=0;

	while ($row = mysqli_fetch_array($result)){ 
		$idCasilla= $row["idCasilla"];
		$valor=$row["valor"];
		$pinchado=$row["pinchado"];

		if ($idCasilla==0) continue;

		$imagen = "ic_int.png";	

		if ($pinchado==1) 
		{
			//echo "casilla pulsada:$casilla_pulsada";
			//echo "casilla:$idCasilla";
			if ($idCasilla==$casilla_pulsada) $casilla_valor=$valor;

			if ($casilla_calavera==$casilla_pulsada and $idCasilla==$casilla_pulsada)
			{
				$imagen = "ic_cal.png";	
				$fin_partida=true;
			}
			else
			{
				$imagen = "$idCasilla.jpg";
			}
		}			
	    echo "<img src='$imagen' height='100' width='100'>";
	} 
	// Free result set
	mysqli_free_result($result);
	
	
	//acumulamos puntuacion7$=0;
	$puntosTurno=0;
	if ($fin_partida==false)
	{
		if (!isset($_SESSION["total"])) $_SESSION["total"] = 0;	

		$puntosTurno = $_SESSION["turno"] * $casilla_valor;
		$_SESSION["total"] = $_SESSION["total"] + $puntosTurno;

		$query = "update partidas set puntos=$puntosTurno where idPartida=".$_SESSION["idPartida"]." and turno=".$_SESSION["turno"];
		mysqli_query($conn, $query);
	}
	
	// Cerrar la conexión
	mysqli_close($conn);

	//echo "<br/>Casilla:$casilla_valor";
	echo "<br/><br/><br/>TURNO:".$_SESSION["turno"];
	echo "<br/>PUNTOS TURNO:$puntosTurno";
	echo "<br/>TOTAL:".$_SESSION["total"];
	echo "<br/><br/>";
	if ($fin_partida) {
		//Eliminamos las variables de sesión

		unset($_SESSION["idPartida"]);
		unset($_SESSION["turno"]);
		unset($_SESSION["total"]);
		?>
		<form name="formulario" method="post" action="guardar_puntos.php">
		<table>
			<tr>
				<td>
		<input type="text" id="txtNombre" name="txtNombre" placeholder="Introduzca el nombre del jugador" style="width:400px">			
				</td>
				<td>
		<input style="width:110px;height: 30px" type="submit" name="btnGuardar" id="btnGuardar" value="Guardar Juego" />					
				</td>				
			</tr>
		</table>

		</form>
		<p><small>Fin!! <a href='index.php'>Nueva partida</a></small></p>
	<?php
	} else {
		$_SESSION["turno"]=$_SESSION["turno"]+1;
		echo "<p><small><a href='index.php'>Jugar de nuevo</a></small></p>";
	}
	?>

</body>
</html>