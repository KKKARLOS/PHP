<?php session_start();

	require_once("../modelos/clase_cuenta.php");
	require_once("../modelos/clase_movimiento.php");

	$cuenta = new CCuenta();

	switch ($_POST["funcion"]) {

		case "Crear":

			$cuenta->Crear($_POST["nombre"]);		
			break;

		case "CambiarPin":

			$cuenta->ObtenerDatosCuenta($_POST["idcuenta"]);
			$cuenta->CambiarPin($_POST["idcuenta"], $_POST["pin"]);
			break;

		case "ValidarPin":

			$cuenta->ValidarPin($_POST["nombre"],$_POST["pin"]);
			break;

		case "ObtenerDatosCuenta":

			$cuenta->ObtenerDatosCuenta($_POST["idcuenta"]);
			break;

		case "ActualizarSaldo":

			$cuenta->ActualizarSaldo($_POST["idcuenta"], $_POST["importe"]);
			break;

		case "Movimientos":
		
			$cuenta->Movimientos($_POST["idcuenta"]);
			break;							
	}

	echo json_encode($cuenta);
?>