<?php
//Abrir una conexión con la bbdd que se llama "biblioteca"
require("conexionbd.php");

//Obtenemos de la URL (metodo GET) el isbn del libro a eliminar:
$isbn = $_GET["isbn"];
//Preparamos la consulta a lanzar a la bbdd en lenguaje SQL:
$consulta="delete from libros where isbn='$isbn'";
//Ejecutamos la consulta
mysqli_query($conexion,$consulta);

//Cerrar la conexión con la bbdd
mysqli_close($conexion);
//Redirigimos a la página listar libros:
header("Location:listar_libros.php");