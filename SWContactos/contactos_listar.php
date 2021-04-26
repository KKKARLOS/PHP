<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(0);
$res=0;
$desc="";
$status=0;
try {
	$json = file_get_contents('php://input');
	if ($json) {
		$input = json_decode($json,true);
		$id = $input["id"];
		//Comprobamos que vienen los datos necesarios:
		if (isset($id)) { 
			//Conectamos con la bbdd:
			include("conexion.php");
			//Array donde meteremos los datos que obtengamos:
			$result = array();
			//Obtenemos todos los contactos:
			$consulta = "select * from personas";
			if ($datos = mysqli_query($conexion,$consulta)) {
				$res = mysqli_num_rows($datos);
				//Pasamos los contactos obtenidos a un array asociativo (campo : valor)
				$result = mysqli_fetch_all ($datos, MYSQLI_ASSOC);
				/*
				while ($fila = mysqli_fetch_assoc($datos)) {
					$result[] = $fila;
				}
				*/
			} else {
				throw new Exception("No se ha ejecutado la consulta correctamente ($consulta)");
			}
		} else {
			throw new Exception("Falta id");
		}
	} else {
		throw new Exception("JSON de entrada nulo");
	}
} catch (Exception $e) {
	$status=451;
	$res=-1;
	$desc=$e->getMessage();
}
http_response_code($status);
$respuesta=array('res'=>$res,'desc'=>$desc,'result'=>$result);
echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>