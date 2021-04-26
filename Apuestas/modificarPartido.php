<?php
//Abrir una conexión con la bbdd que se llama "apuestas"
require("funciones.php");
  
//Obtenemos los datos del formulario:

$idPartido = $_POST["idPartido"];
$nombre = $_POST["txtNombre"];
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];
$minutoGol = $_POST["txtMinutoGol"];
$estado = $_POST["cboEstado"];

// Llamamos a la función modificar datos del Partido

$resultado = modificarPartido($idPartido,$nombre,$fecha,$hora,$minutoGol,$estado); 

if ($resultado>0) 
	$pagina = "Location:catalogoPartidos.php";
else 
	$pagina ="Location:datosPartido.php?idpartido=$idPartido&mensaje=No se ha podido modificar";

header("$pagina");