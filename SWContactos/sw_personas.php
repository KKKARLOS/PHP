<?php 
	require_once("cpersonas.php");
	session_start();
	$persona = new CPersona();
	$desc="";
	$status=0;
	$res=$_REQUEST["funcion"];
	switch ($_REQUEST["funcion"]) {
		case "insertar":
			try {
				$persona->insertar
					(
					$_REQUEST["nombre"],
					$_REQUEST["edad"]
					);
				$res=$persona;
				$status=200;
					
			} catch (Error $e) {
				$status=451;
				$desc=$e->getMessage();
				$data = array('status' => 451, 'error' => $desc);
				http_response_code($status);
				echo json_encode($data);
				return;
			}
			break;

		case "actualizar":

			//session_unset();
			try {
				$anuncio->actualizar
					(
					$_REQUEST["id"],
					$_REQUEST["nombre"],
					$_REQUEST["edad"]
					);
				$res=$anuncio;
				$status=200;					
	
			} catch (Error $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;
						
		case "eliminar":

			try {
				$persona->eliminar($_REQUEST["id"]);
				$res=$persona;
				$status=200;
	
			} catch (Error $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;

		case "obtenerDatos":	
	
			try {
				$persona->ObtenerDatos($_REQUEST["id"]);
				$res=$persona;
				$status=200;				

			} catch (Error $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;	
	}

	http_response_code($status);
	echo json_encode($res, JSON_UNESCAPED_UNICODE);
?>