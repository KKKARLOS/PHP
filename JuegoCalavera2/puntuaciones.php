<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		table, td , th	{border:1px solid black;}
		table {border-collapse: collapse;}
		th {background-color: gray; }
	</style>	
</head>
<body>
	<h1>Todas las puntuaciones</h1></br>
	<br/>
	<table width=600>
	<tr>
		<th>Posición</th>
		<th>Nombre</th>
		<th>Puntos</th>
	</tr>	
<?php
// Conectando, seleccionando la base de datos
	require("conexionbd.php");

	// Realizar una consulta MySQL
	$filasPagina =  4;
	$pagina = 1;
	
	$query = "select id, fecha, puntos, nombre from puntuaciones order by puntos desc";
	$result = mysqli_query($conn, $query);
	$numRegistros = mysqli_num_rows($result);
	$totalPaginas = ceil($numRegistros/$filasPagina);

	if (isset($_GET["pagina"]))	$pagina = $_GET["pagina"];

	$desde = ($pagina-1)*$filasPagina;
	$query = "select id, fecha, puntos, nombre from puntuaciones order by puntos desc limit ".$desde.",".$filasPagina;

	$result = mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error());

	//echo "<br/>";
	//echo "Numero de registros: ".$numRegistros;
	//echo "<br/>";
	//echo "Numero de páginas: ".$totalPaginas;

	//ejecutamos la consulta

	$result = mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error());

	$cont = 0;
	while ($row = mysqli_fetch_array($result)){ 
		$cont = $cont + 1;
		$nombre=$row["nombre"];
		$puntos=$row["puntos"];
		echo "<tr>";
	    echo "<td>".$cont."</td>";
	    echo "<td>".$nombre."</td>";
	    echo "<td>".$puntos."</td>";
	    echo "</tr>";
	} 

	// Free result set
	mysqli_free_result($result);

	// Cerrar la conexión
	mysqli_close($conn);
?>
</table>
<br/>
<?php 
	$x = 1; 
	while($x <= $totalPaginas) {
	    echo "<a href='puntuaciones.php?pagina=$x.'/>$x</a> ";
	    $x++;
	} 
?>
<br/>
<br/>
<a href='index.php'>Volver al indice</a>
</body>
</html>