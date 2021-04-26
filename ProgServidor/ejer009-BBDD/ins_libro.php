<?php
//Abrir una conexión con la bbdd que se llama "biblioteca"
require("conexionbd.php");

//Obtenemos los datos del formulario:
$isbn = $_POST["txtIsbn"];
$titulo = $_POST["txtTitulo"];
$cod_autor = $_POST["txtAutor"];
//Preparamos la consulta a lanzar a la bbdd en lenguaje SQL:
$consulta="insert into libros (isbn,titulo,cod_autor) values ('$isbn','$titulo','$cod_autor')";
//Ejecutamos la consulta
mysqli_query($conexion,$consulta);
//Obtener el número de filas afectadas:
$resultado = mysqli_affected_rows($conexion);
//echo "Filas afectadas: $resultado";

//Cerrar la conexión con la bbdd
mysqli_close($conexion);
if ($resultado>0) {
	$pagina = "Location:listar_libros.php";
} else {
	$pagina ="Location:alta_libro.php?msg=No se ha podido insertar";
}
header("Location:$pagina");