<?php
	$password="1234";
	$enc_password=base64_encode($password);
	echo "Encriptado:".$enc_password;
	$desenc_password=base64_decode($enc_password);
	echo "Desencriptado:".$desenc_password;
	
	require("CUsuario.php");

	// instanciar objeto cuenta
	$usuario = new CUsuario();
	echo "<p>".var_dump($usuario)."</p>";

	//Validar password
	//$usuario->Registrar("asier.perdiguero@gmail.com","Asier Perdiguero","1111");

	$usuario->confirmarRegistro("v2gEvJ8gwsIJ9ULVdDPJdcbevIHKpc");
	//echo "<p>".var_dump($usuario)."</p>";
		
?>