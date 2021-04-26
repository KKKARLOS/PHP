<?php
//Abrir una conexión con la bbdd que se llama "apuestas"
require("funciones.php");

//Obtenemos los datos del formulario:
$nombre = $_POST["txtNombre"];
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];

// Llamamos a la función insertar Usuario
$resultado = insertarPartido($nombre,$fecha,$hora); 

if ($resultado>0) 
{	
	$pagina="Location:catalogoPartidos.php";

} else {
	$pagina ="Location:altaPartido.php?mensaje=No se ha podido insertar";
}
header("$pagina");