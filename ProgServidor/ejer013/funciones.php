<?php
session_start();
require("conexionbd.php");
function crearPartida() {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	//Insertamos una nueva partida
	$consulta="insert into partidas (turno, estado) values ('0','1')";
	//Ejecutamos la consulta
	mysqli_query($conexion,$consulta);
	//Obtener el id Partida creado por la bbdd:
	$idPartida = mysqli_insert_id($conexion);
	//Creamos la secuencia aleatoria de puntos y calavera:
	$valores = array();
	for($i=0;$i<10;$i++) {
		$valores[]=$i;
	}
	//Desordenamos el array para que sea aleatorio:
	shuffle($valores);
	//Para ver el contenido completo del array:
	//var_dump($valores); exit;
	//Insertamos en la bbdd la secuencia aleatoria asociada a la partida:
	for ($i=0;$i<10;$i++) {
		$valor = $valores[$i];
		$posicion = $i+1;
		$consulta = "insert into posiciones(posicion,valor,partida) values ('$posicion','$valor','$idPartida')";
		mysqli_query($conexion,$consulta);
	}

	//Devolvemos el nuevo id de Partida
	return $idPartida;
}

function obtenerSecuencia($idPartida) {
	//Para poder usar la variable conexión (variable global):
	global $conexion;
	//Obtenemos los valores y estado de cada posición:
	$consulta = "Select * from posiciones where partida='$idPartida' order by id Asc";
	$datos = mysqli_query($conexion,$consulta);
	return $datos;
}
function puntuacionTotal($idPartida) {
	global $conexion;
	$consulta = "Select sum(pinchado*valor) as puntuacion from posiciones where partida='$idPartida'";
	$datos = mysqli_query($conexion,$consulta);
	$fila = mysqli_fetch_assoc($datos);
	$puntuacion = $fila["puntuacion"];
	return $puntuacion;
}
function clickPosicion($idPartida,$posicion) {
	$fin_partida = false;
	global $conexion;
	//Actualimos el turno:
	$consulta = "update partidas set turno = turno+1 where id='$idPartida'";
	mysqli_query($conexion,$consulta);
	$consulta = "select turno from partidas where id='$idPartida'";
	$datos = mysqli_query($conexion,$consulta);
	$fila = mysqli_fetch_assoc($datos);
	$turno = $fila["turno"];
	//Indicamos que la posicion ha sido clickada y en que turno
	$consulta = "update posiciones set pinchado='$turno' where partida='$idPartida' and posicion='$posicion'";
	mysqli_query($conexion,$consulta);

	//Obtenemos el valor que hay en la posición:
	$consulta = "Select valor from posiciones where posicion='$posicion' and partida='$idPartida'";
	$datos = mysqli_query($conexion,$consulta);
	$fila = mysqli_fetch_assoc($datos);
	$valor = $fila["valor"];
	//Si en la posición hay puntos:
	if ($valor>0) {
		//Si ya solo queda la calavera se acabó la partida:
		if ($turno>=9) {
			$fin_partida = true;
		}
	} else {
		//Ha encontrado la calavera, se acabó la partida
		$fin_partida = true;
	}
	if ($fin_partida) {
		$consulta = "update partidas set estado='-1' where id='$idPartida'";
		mysqli_query($conexion,$consulta);
	}
	return $fin_partida;
}
?>