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
</head>
<body style="width:600px;border:solid 1px black;height: 400px;position:absolute;top:100px;left:200px">