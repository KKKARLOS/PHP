<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if (isset($_GET["msg"])) {
		echo "<h2>".$_GET["msg"]."</h2";
	}
	//Obtenemos la lista de autores para montar el control de selección:
	//Abrir una conexión con la bbdd que se llama "biblioteca"
	require("conexionbd.php");
	$consulta="select * from autores";
	$datos = mysqli_query($conexion,$consulta);
	mysqli_close($conexion); 
	?>
	<h3>Alta libro</h3>
	<form method="POST" action="ins_libro.php">
		<label>ISBN:</label>
		<input type="text" name="txtIsbn"/>
		<br/>
		<label>TITULO:</label>
		<input type="text" name="txtTitulo"/>
		<br/>
		<label>AUTOR:</label>
		<select name="txtAutor">
			<?php while ($fila = mysqli_fetch_assoc($datos)) { 
				$cod_autor = $fila["cod_autor"];
				$nombre = $fila["nombre"];
				echo "<option value='$cod_autor'>$nombre</option>";
			}?>
		</select>
		<br/>
		<input type="submit" value="Alta"/>
	</form>
</body>
</html>