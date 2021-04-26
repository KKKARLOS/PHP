<?php
	$password="1234";
	$enc_password=base64_encode($password);
	echo "Encriptado:".$enc_password;
	$desenc_password=base64_decode($enc_password);
	echo "Desencriptado:".$desenc_password;
/*	
	require("CUsuario.php");

	// instanciar objeto cuenta
	$usuario = new CUsuario();
	echo "<p>".var_dump($usuario)."</p>";

	//Validar password
	$usuario->ValidarPassword("jc.perdiguerocarlos@gmail.com","1234");
	echo "<p>".var_dump($usuario)."</p>";
*/		
?>