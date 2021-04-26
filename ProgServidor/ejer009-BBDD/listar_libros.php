<?php
//Abrir una conexión con la bbdd que se llama "biblioteca"
require("conexionbd.php");

//Preparamos la consulta a lanzar a la bbdd en lenguaje SQL:
$consulta="Select isbn,titulo from libros";
//Ejecutamos la consulta
$datos = mysqli_query($conexion,$consulta);

//Obtener el número de filas afectadas (cuantas filas devuelve la select):
$total = mysqli_affected_rows($conexion);
//Cerrar la conexión con la bbdd
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Lista de libros</h3>
	<ul>
	<?php while ($fila = mysqli_fetch_assoc($datos)) { 
		$isbn = $fila["isbn"];
		$titulo = $fila["titulo"];
		echo "<li><small>($isbn)</small> $titulo
			<a href='eliminar_libro.php?isbn=$isbn'>
			<img src='images/papelera.jpg' width='16'/>
			</a>
		</li>";
	}
	?>
	</ul>
	<h4><?php echo "Número de libros: $total"; ?></h4>
</body>
</html>