<?php
session_start();

//Declarar la función que se encarga de validar el acceso:
function ValidarAcceso($email,$pass) {
	$valido = true;
	if (!is_numeric($pass)) $valido=false;
	if (strlen($pass)<4) $valido=false;
	if ($pass%2==1) $valido = false;

	if ((strpos($email, '.com')==false) && (strpos($email, '.net')==false)) {
		$valido = false;
	}
	//Al acabar devuelvo un resultado True o False que indica
	//si el acceso es válido  o no:
	return $valido;
}





if (ValidarAcceso($_POST["email"],$_POST["password"])==false) {
	$nueva_pagina = "login.php?msg=Acceso no válido";
} else {
	$_SESSION["email"] = $_POST["email"];
	$nueva_pagina = "intranet.php";
}
header("Location:$nueva_pagina");
?>