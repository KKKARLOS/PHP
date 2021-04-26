<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>    
<script>
	function confirmarEliminar(strIsbn,strTitulo)
	{
		valor=confirm("Seguro que deseas el eliminar el libro "+strTitulo+"?");
		if (valor) location.href="eliminarLibro.php?isbn="+strIsbn;
	}
</script>

</head>
<body>
<?php
	// Conectando, seleccionando la base de datos
	
	require("conexionbd.php");

	// Realizar una consulta MySQL

	$query = "select cod_autor,isbn,titulo from libros";

	//ejecutamos la consulta

	echo "<h3>Lista de Libros</h3>";
	
	if ($result = mysqli_query($conn, $query))
	{
		echo '<ul>';
		while ($row = mysqli_fetch_array($result)){ 
			$isbn=$row["isbn"];
			$titulo=$row["titulo"];
			
			echo "<li>($isbn) $titulo" 
?>
			<img onclick="confirmarEliminar('<?php echo $isbn;?>','<?php echo $titulo;?>')" src="delete.png" width="15"/>
			<a href="editarlibro.php?isbn='<?php echo $isbn;?>'"><img src="edit.png" width="15"/></a>
			</li>
<?php 
		}
		echo "</ul>";
	}
	
	// Free result set
	mysqli_free_result($result);

	// Cerrar la conexión
	mysqli_close($conn);
?>
<input onclick="location.href='altalibro.php'" style="width:110px;height: 30px" type="button" name="btnAlta" id="btnAlta" value="Alta Libro" /></body>
</html>	