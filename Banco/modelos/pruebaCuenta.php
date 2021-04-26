<?php
	require("clase_cuenta.php");

	// instanciar objeto cuenta
	$cuenta = new CCuenta();
	echo "<p>".var_dump($cuenta)."</p>";
	//Crear cuenta nombre
	$cuenta->Crear("Pepe	");
	echo "<p>".var_dump($cuenta)."</p>";
	//LEER
	$cuenta->Leer(9);
	echo "<p>".var_dump($cuenta)."</p>";
	//Cambiar pin
	$cuenta->CambiarPin("5555");
	echo "<p>".var_dump($cuenta)."</p>";
	//Validar pin
	$cuenta->ValidarPin("Karlos","5555");
	echo "<p>".var_dump($cuenta)."</p>";
	$cuenta->ValidarPin("Karlos","1234");
	echo "<p>".var_dump($cuenta)."</p>";
	$cuenta->ActualizarSaldo(500);
	echo "<p>".var_dump($cuenta)."</p>";
	$cuenta->ActualizarSaldo(1500);
	echo "<p>".var_dump($cuenta)."</p>";
?>