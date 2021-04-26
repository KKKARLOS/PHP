<?php
	$isbn = $_GET['isbn'];
	//PRINT "Libro".$isbn
	
	//abrir conexion
	require("conexionbd.php");

	//ejecutamos la query MySQL

	$query = "delete from libros where isbn='".$isbn."'";

	mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error());
	
	// Cerrar la conexión
	mysqli_close($conn);
	header("Location:listalibros.php");
?>