<?php session_start();
	include("../modelos/clase_usuario.php");

	if (isset($_SESSION["usuario"]))
		$usuario = unserialize($_SESSION["usuario"]);

	switch ($_POST["funcion"]) {

		case "Registrar":
		
			session_unset();
			$usuario = new CUsuario();
			$usuario->Registrar($_POST["usuario"]);						
			break;

		case "CambiarPassword":

			$usuario->CambiarPassword($_POST["password"]);
			break;

		case "ValidarPassword":

			$usuario->ValidarPassword($_POST["usuario"],$_POST["password"]);
			break;

		case "actualizarSaldo":

			$usuario->actualizarSaldo($_POST["importe"]);
			break;						
	}
	$_SESSION["usuario"]=serialize($usuario);
	echo json_encode($usuario);
?>