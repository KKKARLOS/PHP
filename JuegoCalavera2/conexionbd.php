<?php			
		// Conectando, seleccionando la base de datos
//local
		$usuario = "root";
		$contrasena = "";  // en mi caso tengo contraseña
		$servidor = "localhost";
		$basededatos = "juegocalavera2";
		$conn = mysqli_connect($servidor, $usuario, $contrasena,$basededatos)
		    or die("No se pudo conectar: ".mysqli_error());
/*web
		$usuario = "bd_cebanc";
		$contrasena = "bdCebanc2019";  // en mi caso tengo contraseña
		$servidor = "mysql.bymhost.com";
		$basededatos = "bd_juegocal";
		$conn = mysqli_connect($servidor, $usuario, $contrasena,$basededatos)
		    or die("No se pudo conectar: ".mysqli_error());		    
		// La manera de encriptar la información
*/
		mysqli_set_charset($conn,"utf8");
?>
