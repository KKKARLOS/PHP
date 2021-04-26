<?php
	//PRINT "Libro".$isbn
	
	//abrir conexion
	require("conexionbd.php");

	//ejecutamos la query MySQL

	$query = "update libros set titulo='".$_POST['txtTitulo']."', cod_autor=".$_POST['cboAutor']." where isbn=".$_POST['txtIsbn'];

	mysqli_query($conn, $query) or die('actualización fallida: ' . mysqli_error());
	
	// Cerrar la conexión
	mysqli_close($conn);
	header("Location:listalibros.php");
?>