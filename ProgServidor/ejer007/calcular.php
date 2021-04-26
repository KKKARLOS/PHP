<?php
//Creamos una función para calcular el presupuesto:
function CalcularPresupuesto($destino,$dias,$seguro,$viajeros) {
	//El objetivo es devolver el importe del viaje según los parámetros:
	$total = 0;
	//Añadimos lo correspondiente al destino elegido:
	if ($destino == 1) $total=$total+200;
	if ($destino == 2) $total=$total+150;
	if ($destino == 3) $total=$total+100;
	//Añadimos lo correspondiente a los días:
	$total = $total + ($dias*20);
	//Añadimos si corresponde, lo del seguro:
	if ($seguro==true) $total = $total + 30;
	//Multiplicamos por el número de viajeros:
	$total = $total * $viajeros;
	return $total;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.container {
		    width:70%;
		    text-align:center;
		    margin: auto;
		}
		.linea {
			width: 100%;
			margin: 20px; 
		}
	</style>

</head>
<body>
	<div class="container">
		<h2>RESUMEN Y PRESUPUESTO:</h2>
		<?php
			//Nombre del destino:
			$destino ="";
			if ($_POST["destino"] == 1) $destino="Tenerife";
			if ($_POST["destino"] == 2) $destino="Benidorm";
			if ($_POST["destino"] == 3) $destino="Madrid";
			//Comprobamos si ha elegido seguro o no (true o false):
			$seguro = false;
			if (isset($_POST["seguro"])) $seguro=true;
		?>
		<div class="linea">DESTINO: <?php echo $destino; ?></div>
		<div class="linea">DIAS: <?php echo $_POST["dias"]; ?></div>
		<div class="linea">SEGURO: <?php if ($seguro==true) echo "SI"; else echo "NO"; ?></div>
		<div class="linea">VIAJEROS: <?php echo $_POST["viajeros"]; ?></div>
		<br/>
		<div class="linea">PRESUPUESTO: <?php echo CalcularPresupuesto($_POST["destino"],$_POST["dias"],$seguro,$_POST["viajeros"]); ?></div>

	</div>
	
</body>
</html>