<?php
	session_start();
	require("clase_partida.php");

	// instanciar objeto partida
	$partida = new CPartida();
	//Comenzar Partida
	$partida->Comenzar();
	echo "<p>".var_dump($partida)."</p";
	//Obtención Saldo
	$partida->ObtenerPremio($partida->valores);
	echo "<p>".var_dump($partida)."</p";
	
	echo "<p>".var_dump($partida)."</p";	
?>