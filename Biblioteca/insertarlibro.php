<?php
	// Conectando, seleccionando la base de datos
	$usuario = "root";
	$contrasena = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
	$servidor = "localhost";
	$basededatos = "biblioteca";
	$conn = mysqli_connect($servidor, $usuario, $contrasena,$basededatos)
	    or die("No se pudo conectar: ".mysqli_error());

	// La manera de encriptar la información

	mysqli_set_charset($conn,"utf8");

	// Realizar una consulta MySQL

	$query = "insert into libros (cod_autor,isbn,titulo) values ('".$_POST['cboAutor']."','".$_POST['txtIsbn']."','".$_POST['txtTitulo']."')";

	//ejecutamos la consulta
	
	mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error());
	// Cerrar la conexión
	mysqli_close($conn);
	header("Location:listalibros.php");
?>