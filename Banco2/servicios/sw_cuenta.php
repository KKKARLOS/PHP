<?php session_start();
	include("../modelos/clase_cuenta.php");
	include("../modelos/clase_movimiento.php");

	$cuenta = new CCuenta();

	switch ($_POST["funcion"]) {

		case "Crear":
		
			//session_unset();

			$cuenta->Crear($_POST["nombre"]);						
			break;

		case "CambiarPin":

			$cuenta->Leer($_POST["idcuenta"]);
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

			$movimiento = new CMovimiento();
			$cuenta->movimientos = $movimiento->Cuenta($_POST["idcuenta"]);
			break;							
	}

	echo json_encode($cuenta);
?>