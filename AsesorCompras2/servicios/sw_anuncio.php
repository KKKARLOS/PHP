<?php 
	require_once("../modelos/canuncio.php");
	session_start();
	$anuncio = new CAnuncio();
	$desc="";
	$status=0;

	switch ($_POST["funcion"]) {


		case "insertar":
			try {
				$anuncio->insertar
					(
					$_POST["nombre"],
					$_POST["foto"],
					$_POST["precio_venta"],
					$_POST["urlportalventa"],
					$_POST["idsitioweb"],
					$_POST["email"],
					$_POST["precio_correcto"],
					$_POST["precio_chollo"],
					$_POST["idcategoria"]
					);
				$res=$anuncio;
				$status=200;
					
			} catch (Exception $e) {
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
					$_POST["idanuncio"],
					$_POST["nombre"],
					$_POST["foto"],
					$_POST["precio_venta"],
					$_POST["urlportalventa"],
					$_POST["idsitioweb"],
					$_POST["email"],
					$_POST["precio_correcto"],
					$_POST["precio_chollo"],
					$_POST["idcategoria"]
					);
				$res=$anuncio;
				$status=200;					
	
			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;
						
		case "eliminar":

			try {
				$anuncio->eliminar($_POST["idanuncio"]);
				$res=$anuncio;
				$status=200;
	
			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;

		case "catalogo":

			try {
				$res=$anuncio->catalogo($_POST["email"]);
				$status=200;					

			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;

		case "catalogoCategoria":

			try {
				$res=$anuncio->catalogoCategoria($_POST["idcategoria"]);
				$status=200;					

			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;

		case "catalogoPrecio":

			try {
				$res=$anuncio->catalogoPrecio($_POST["color"]);
				$status=200;					

			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;

		case "catalogoTotal":

			try {
				$token = $_POST['token'];
 
				if($_SESSION['token'] == $token){
					$res=$anuncio->catalogoTotal();
					$status=200;
				}else{
					$status=451;
					$data = array('status' => 451, 'error' => "Has intentado acceder sin utilizar el token de seguridad");
					http_response_code($status);
					echo json_encode($data);
					return;					
				}				

			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;

		case "obtenerDatos":	
	
			try {
				$anuncio->ObtenerDatos($_POST["idanuncio"]);
				$res=$anuncio;
				$status=200;				

			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;	

		case "estadisticas":

			try {
				$res=$anuncio->estadisticas();
				$status=200;					

			} catch (Exception $e) {
				$status=451;
				$data = array('status' => 451, 'error' => $e->getMessage());
				http_response_code($status);
				echo json_encode($data);
				return;
			}			
			break;


		case "catalogoCategoriaPrecioMin":
		
			try {
				$res=$anuncio->catalogoCategoriaPrecioMin();
				$status=200;					

			} catch (Exception $e) {
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