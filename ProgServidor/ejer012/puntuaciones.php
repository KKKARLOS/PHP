<?php
//Obtengo de la url la página actual. 
//Si no se indica, mostramos la primera:
if (isset($_GET["p"])) {
	$pag_actual = $_GET["p"];
} else {
	$pag_actual = 1;
}
//Tamaño de cada página (registros a mostrar):
$tam_pag = 4;
//Cuantos registros hay? Consultamos a la bbdd:
require("conexionbd.php");
//Obtener el número de registros:
$consulta="Select count(*) as TOTAL from puntuaciones";
$datos = mysqli_query($conexion,$consulta);
$fila = mysqli_fetch_assoc($datos);
$total_registros = $fila["TOTAL"];
//Sabiendo el total de registros y el tamaño de página, calculamos el total de páginas, redondeando hacia arriba:
$num_paginas = ceil($total_registros/$tam_pag);
//Listamos las puntuaciones según la página en la que estoy:
// Página 1: 0-3
// Página 2: 4-7
// Página 3: 8-11
// Página 4: 12-15 ...
$reg_inicial = ($pag_actual-1)*$tam_pag;
$consulta="Select * from puntuaciones limit $reg_inicial,$tam_pag";
//Ejecutamos la consulta
$datos = mysqli_query($conexion,$consulta);

//Cerrar la conexión con la bbdd
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 400px; margin: 0 auto; border-style: double; margin-top:20px; padding: 10px; ">
	<div>
		<strong>TOTAL PUNTUACIONES: <?php echo $total_registros;?></strong>
		<span style="float:right">
			<a href="index.php">Nueva partida</a>
		</span>
	</div>
	<div>
		<ul>
		<?php while ($fila = mysqli_fetch_assoc($datos)) { 
			$puntos = $fila["puntos"];
			$nombre = $fila["nombre"];
			$fecha = $fila["fecha"];
			echo "<li> PTOS: <strong>$puntos</strong> - <small>($fecha)</small> - $nombre</li>";
		}
		?>
		</ul>
		<div><?php
			for ($i=1;$i<=$num_paginas;$i++) {
				if ($i==$pag_actual) {
					echo "$i ";
				} else {
					echo "<a href='puntuaciones.php?p=$i'>$i</a> ";
				}
			}
			?>
		</div>
	</div>
</body>
</html>