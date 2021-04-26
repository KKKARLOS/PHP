<?php
// Conectando, seleccionando la base de datos
$usuario = "root";
$contrasena = "";  // en mi caso tengo contraseña
$servidor = "localhost";
$basededatos = "biblioteca";
$conn = mysqli_connect($servidor, $usuario, $contrasena,$basededatos)
    or die("No se pudo conectar: ".mysqli_error());


// La manera de encriptar la información

mysqli_set_charset($conn,"utf8");

// Realizar una consulta MySQL

$query = "select  cod_autor,isbn,titulo from libros";

//ejecutamos la consulta

$result = mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error());
//echo "Filas afectadas: " . mysqli_affected_rows($conn);
/*
$result2 = $result;
// Imprimir los resultados en HTML
echo "<style>";
echo "<style>";
echo "<table style='border:1px solid black;collapse:collapsed'>\n";
echo "<tr><td width='200px'>Cod.Autor</td><td width='200px'>ISBN</td><td width='200px'>Titulo</td></tr>"; 

while ($row = mysqli_fetch_array($result)){ 
    echo '<tr><td>'.$row["cod_autor"].'</td>'; 
    echo '<td>'.$row["isbn"].'</td>';
    echo '<td>'.$row["titulo"].'</td></tr>'; 
} 
 
echo "</table>\n";
*/
print "Lista de Libros";
echo '<ul>';
while ($row = mysqli_fetch_array($result)){ 
	$isbn=$row["isbn"];
	$titulo=$row["titulo"];
	
/*    echo '<li>('.$row["isbn"].') '.$row["titulo"].') <a href=eliminarLibro.php?isbn='.$row["isbn"].'><img src="delete.png"/></a></li>'; */
    echo "<li>($isbn) $titulo" ?>
    <img onclick="confirmarEliminar('<?php echo $isbn;?>','<?php echo $titulo;?>')" src="delete.png" width="15"/>
	</li>
<?php } 
	echo "</ul>";


// Free result set
mysqli_free_result($result);

// Liberar resultados
//mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($conn);
?>
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
	
</body>
</html>