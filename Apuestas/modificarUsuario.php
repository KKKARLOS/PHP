<?php
//Abrir una conexión con la bbdd que se llama "apuestas"
require("funciones.php");

//Obtenemos los datos del formulario:
$origen = $_POST["origen"];
$email = $_POST["email"];
$nombre = $_POST["txtNombre"];
$password = $_POST["txtPassword"];
$saldo = $_POST["txtSaldo"];

// Llamamos a la función insertar Usuario
$resultado = modificarUsuario($email,$nombre,$password,$saldo); 

if ($resultado>0) {
	$pagina = "Location:$origen?email=$email";
} else {
	$pagina = "Location:misDatos.php?email=$email&mensaje=No se ha podido modificar";
}
header("$pagina");