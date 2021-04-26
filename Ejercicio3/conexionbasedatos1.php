<?php
// Conectando, seleccionando la base de datos
$usuario = "root";
$contrasena = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$servidor = "localhost";
$basededatos = "biblioteca";
$conn = mysqli_connect($servidor, $usuario, $contrasena,$basededatos)
    or die("No se pudo conectar: ".mysqli_error());

echo "Connected successfully";
echo " ";

// La manera de encriptar la información

mysqli_set_charset($conn,"utf8");

// Realizar una consulta MySQL

$query = "insert into libros (cod_autor,isbn,titulo) values ('1','ISBN-BB','Libro B')";

//ejecutamos la consulta

mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error());
echo "Filas afectadas: " . mysqli_affected_rows($conn);
// Imprimir los resultados en HTML
/*echo "<table>\n";
while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
*/
// Liberar resultados
//mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($conn);
?>