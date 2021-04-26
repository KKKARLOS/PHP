<?php session_start();
	include("../modelos/clase_cuenta.php");
	include("../modelos/clase_movimiento.php");

	$movimiento = new CMovimiento();

	switch ($_POST["funcion"]) {

		case "Insertar":
		
			// Inserto el movimiento

			$movimiento->Insertar($_POST["idcuenta"],$_POST["denominacion"],$_POST["importe"]);	
			
			// Actualizo el saldo de la cuenta

			$cuenta = new CCuenta();
			$cuenta->ActualizarSaldo($_POST["idcuenta"], $_POST["importe"]);
			break;
	}

	echo json_encode($movimiento);
?>			