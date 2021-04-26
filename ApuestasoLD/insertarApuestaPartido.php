<?php
//Abrir una conexión con la bbdd que se llama "apuestas"
require("funciones.php");

//Obtenemos los datos del formulario:
$email = $_POST["email"];
$idpartido = $_POST["idpartido"];
$importe = $_POST["txtImporte"];
$minuto = $_POST["txtMinutoGol"];

print "email:$email";
print "idpartido:$idpartido";
print "importe:$importe";
print "minuto:$minuto";

// Llamamos a la función insertar Usuario
$resultado = insertarApuesta($email,$idpartido,$importe,$minuto); 

if ($resultado>0) 
{	
	$pagina="Location:apuestas.php";

} else {
	$pagina ="Location:nuevaApuesta.php?mensaje=No se ha podido insertar";
}
header("$pagina");