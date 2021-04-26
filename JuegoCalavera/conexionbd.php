<?php			
		// Conectando, seleccionando la base de datos
		$usuario = "root";
		$contrasena = "";  // en mi caso tengo contraseña
		$servidor = "localhost";
		$basededatos = "juegocalavera";
		$conn = mysqli_connect($servidor, $usuario, $contrasena,$basededatos)
		    or die("No se pudo conectar: ".mysqli_error());

		// La manera de encriptar la información

		mysqli_set_charset($conn,"utf8");
?>