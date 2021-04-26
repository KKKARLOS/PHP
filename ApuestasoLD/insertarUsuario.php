<?php
//Abrir una conexión con la bbdd que se llama "apuestas"
require("funciones.php");

//Obtenemos los datos del formulario:
$email = $_POST["txtEmail"];
$nombre = $_POST["txtNombre"];
$password = $_POST["txtPassword"];
$saldo = $_POST["txtSaldo"];

// Llamamos a la función insertar Usuario
$resultado = insertarUsuario($email,$nombre,$password,$saldo,'J'); 

if ($resultado>0) 
{	
	if ($_SESSION["rol"]=="A") $pagina="Location:catalogoUsuarios.php";
	else					   $pagina="Location:login.php";
} else {
	$pagina ="Location:registrar.php?msg=No se ha podido insertar";
}
header("$pagina");