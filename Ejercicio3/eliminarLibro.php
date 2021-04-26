<?php
	$isbn = $_GET['isbn'];
	//PRINT "Libro".$isbn
	$usuario = "root";
	$contrasena = "";  // en mi caso tengo contraseña
	$servidor = "localhost";
	$basededatos = "biblioteca";
	$conn = mysqli_connect($servidor, $usuario, $contrasena,$basededatos)
    or die("No se pudo conectar: ".mysqli_error());

	// La manera de encriptar la información

	mysqli_set_charset($conn,"utf8");

// Realizar una consulta MySQL

	$query = "delete from libros where isbn='".$isbn."'";


	mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error());
	mysqli_close($conn);
	header("Location:conexionbasedatos2.php");
?>