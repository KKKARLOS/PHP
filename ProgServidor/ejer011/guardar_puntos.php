<?php
session_start();
//Abrir una conexión con la bbdd que se llama "biblioteca"
require("conexionbd.php");

//Obtenemos los datos del formulario:
$puntos = $_SESSION["total"];
$nombre = $_POST["nombre"];
$fecha = date("Y-m-d h:i:s");
//Preparamos la consulta a lanzar a la bbdd en lenguaje SQL:
$consulta="insert into puntuaciones (fecha,puntos,nombre) values ('$fecha','$puntos','$nombre')";
//Ejecutamos la consulta
mysqli_query($conexion,$consulta);
//Obtener el número de filas afectadas:
$resultado = mysqli_affected_rows($conexion);

//Listamos las 5 mejores puntuaciones:
$consulta="Select * from puntuaciones order by puntos Desc limit 5";
//Ejecutamos la consulta
$datos = mysqli_query($conexion,$consulta);

//Cerrar la conexión con la bbdd
mysqli_close($conexion);
//Eliminamos la información de sesión:
session_unset();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 400px; margin: 0 auto; border-style: double; margin-top:20px; padding: 10px; ">
	<h3>Top 5 puntuaciones</h3>
	<div>
		<ol>
		<?php while ($fila = mysqli_fetch_assoc($datos)) { 
			$puntos = $fila["puntos"];
			$nombre = $fila["nombre"];
			$fecha = $fila["fecha"];
			echo "<li> PTOS: <strong>$puntos</strong> - <small>($fecha)</small> - $nombre</li>";
		}
		?>
		</ol>
	</div>
	<p><a href="index.php">Nueva partida</a>
</body>
</html>