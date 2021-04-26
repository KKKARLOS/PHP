<?php 

	$pos_calavera = rand(1,9);

	// generar los numeros aleatorios únicos correspondientes a cada casilla

	$arrayNumeros = range(1, 9); 
	shuffle($arrayNumeros); 
	array_unshift($arrayNumeros, $pos_calavera);
	foreach ($arrayNumeros as $val) { 
	    echo $val . '<br />'; 
	}
?>