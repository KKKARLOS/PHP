<?php
	// Conectando, seleccionando la base de datos
	require("conexionbd.php");
	session_start();

	// Realizar una consulta MySQL
    $fecha = date("Y-m-d h:i:s");
	$query = "insert into puntuaciones (fecha, puntos, nombre) values ('$fecha','".$_SESSION['total']."','".$_POST['txtNombre']."')";

	//ejecutamos la consulta
	
	mysqli_query($conn, $query) or die('inserción fallida: ' . mysqli_error());

	// Eliminación de las variables de session
	
	unset($_SESSION["total"]);	
	// Cerrar la conexión
	//mysqli_close($conn);
?>	
	<html>
	<head>
	<style type="text/css">
		table, td , th	{border:1px solid black;}
		table {border-collapse: collapse;}
		th {background-color: gray; }
	</style>

	</head>
	<title></title>
	<body>
		<h1>5 mejores puntuaciones</h1></br>
		<br/>
		<table width=600>
		<tr>
			<th>Posición</th>
			<th>Nombre</th>
			<th>Puntos</th>
		</tr>
<?php		
	$query = "select id, fecha, puntos, nombre from puntuaciones order by puntos desc limit 5";

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

	//header("Location:index.php");
?>
</table>
</br>
<br/>
<a href='index.php'>Volver al indice</a>
<br/>
<a href='puntuaciones.php'>Ver todas las puntuaciones</a>
</body>
</html>