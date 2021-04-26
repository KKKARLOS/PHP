<?php session_start();
	include("../modelos/clase_partida.php");
	include("../modelos/clase_usuario.php");

	$partida = new CPartida();
	
	switch ($_POST["funcion"]) {

		case "Jugar":
			
			$partida->Comenzar();
			$partida->ObtenerPremio($partida->valores);
			
			$usuario = unserialize($_SESSION["usuario"]);
			$usuario->actualizarSaldo($partida->premio);
			$_SESSION["usuario"]=serialize($usuario);
			break;		
	}
	echo json_encode($partida);
?>