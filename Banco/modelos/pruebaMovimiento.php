<?php
	require('clase_cuenta.php');
	require('clase_movimiento.php');
	// instanciar objeto movimiento
	$movimiento = new CMovimiento();
	
	echo '<p>'.var_dump($movimiento).'</p>';
	//Insertamos movimientos Insertar($idcuenta,$importe,$denominacion)
	$movimiento->Insertar(30,'Ingreso',1000);
	echo '<p>'.var_dump($movimiento).'</p>';
	$movimiento->Insertar(30,'Ingreso',2000);
	echo '<p>'.var_dump($movimiento).'</p>';
	$movimiento->Insertar(30,'Ingreso',3000);
	echo '<p>'.var_dump($movimiento).'</p>';
	$movimiento->Insertar(30,'Ingreso',4000);
	echo '<p>'.var_dump($movimiento).'</p>';
	$movimiento->Insertar(30,'Ingreso',5000);
	echo '<p>'.var_dump($movimiento).'</p>';
	$movimiento->Insertar(30,'Transferencia',-2000);
	echo '<p>'.var_dump($movimiento).'</p>';	
	$movimiento->Insertar(30,'Retirada en efectivo',-1500);
	echo '<p>'.var_dump($movimiento).'</p>';
	
	//LEER
	$cuenta = new CCuenta();
	$cuenta->movimientos = $movimiento->Cuenta(30);
	//echo '<p>'.var_dump($cuenta).'</p>';
?>