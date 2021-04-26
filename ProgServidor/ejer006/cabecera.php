<?php
session_start();
//Comprobamos si es un usuario logueado:
if (!isset($_SESSION["email"])) {
	header("Location:login.php?msg=Login necesario");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 600px; margin: 0 auto; border-style: double; margin-top:20px; padding: 10px">
	<p>
		<a href="intranet.php">Intranet</a> | 
		<a href="misdatos.php">Mis datos</a> | 
		<a href="logout.php">(logout)</a>
	</p>