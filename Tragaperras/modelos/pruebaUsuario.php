<?php
	require("clase_usuario.php");

	// instanciar objeto usuario
	$usuario = new CUsuario();
	//Registrar usuario
	$usuario->Registrar("Karlos");
	echo "<p>".var_dump($usuario)."</p>";
	//Cambiar password
	$usuario->CambiarPassword("123456");
	echo "<p>".var_dump($usuario)."</p>";
	//Validar password
	$resultado = $usuario->ValidarPassword("Karlos","123456");
	echo "<p>".var_dump($usuario)."</p>";
	echo "Resultado:".$resultado;
	$resultado = $usuario->ValidarPassword("Karlos","333333");
	echo "<p>".var_dump($usuario)."</p>";
	echo "Resultado:".$resultado;
	$usuario->actualizarSaldo(500);
	echo "<p>".var_dump($usuario)."</p>";
	$usuario->actualizarSaldo(1500);
	echo "<p>".var_dump($usuario)."</p>";
?>