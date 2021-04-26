<?php session_start();
	//Necesario para gestionar variables de session
	
	if (!isset($_SESSION["email"])) 
	{
		header("Location:login.php?mensaje=Necesitas email");
		exit;
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