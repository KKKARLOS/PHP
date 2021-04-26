<?php
	//Necesario para gestionar variables de session
	session_start();
	if (!isset($_SESSION["email"])) 
	{
		header("Location:login.php?mensaje=Necesitas loguearte");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="jquery/jquery.js"></script>
	<script src="jquery/moment.js"></script>
<body background="images/fondo2.jpg">