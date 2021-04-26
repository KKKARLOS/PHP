<?php session_start();
include '../../model/cusuarios.php';
$pagina="login_view.php";
$msg="";
try {
	if (isset($_GET["op"])) {
		$obj = new CUsuarios();
		switch ($_GET["op"]) {
			case 1: //Login de usuario
			$id=$obj->Validar($_POST["mail"],$_POST["pass"]);
				//Si el $id>0, login es válido, creamos una sesión:
			if ($id>0) {
					//Cargo los datos del usuario (la función validar
					//ya ha cargado los atributos ID y Nombre:
				$_SESSION["us_id"] = $id;
				$_SESSION["us_nombre"] = $obj->getNombre();
					//Redirigimos a la intranet
				$pagina = "../intranet/intranet_view.php";
			} else {
				$pagina="login_view.php?msg=Login incorrecto";
			}
			break;
			case 2: //Insertar usuario
			$id=$obj->Insertar($_POST["nombre"],$_POST["mail"],$_POST["pass"]);
				//$id=$obj->TotalUsuarios();
				//$id=$obj->Insertar("Pepe","mail@mail.com","1234");

			if ($id>0) {
				echo "Correcto $id";
			} else {
				echo "Incorrecto";
			}
			break;
			case 3: //Crear pass aleatorio y enviar por mail
			
				break;
			case 4: //Confirmar un registro de usuario
				//Recibimos por la url el token de confirmación de registro:
				if (isset($_GET["token"])) {
					$reg_token = $_GET["token"];
						//Comprobamos si es correcto:
					if ($obj->confirmarRegistro($reg_token)>0) {
							//Ha ido bien, redirigimos a una página que muestre mensaje ok:
						$pagina="login_view.php?msg=Registro confirmado, prueba a loguearte";
					} else {
						$pagina="registro_view.php?msg=No se ha podido confirmar tu registro";
					}
				}
				break;
			case 5: //Actualizar los datos del perfil de un usuario:
				//Comprobamos si viene foto:
				$foto_name = basename($_FILES["foto"]["name"]);
				if ($foto_name!=null) {
					//Obtenemos la extensión:
					$foto_ext = end(explode(".",$foto_name));
					$foto_name_rnd = $obj->ramdonString(20).".".$foto_ext;
					$carpeta = "../../fotos/";
					$destino = $carpeta.$foto_name_rnd;
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) {
						//Actualizamos con foto:
						$obj->Actualizar($_POST["id"],$_POST["nombre"],$foto_name_rnd);
						$pagina="perfil_view.php";
					} else {
						$obj->Actualizar($_POST["id"],$_POST["nombre"]);
						$pagina="perfil_view.php?msg=No se ha podido actualizar tu foto de perfil";
					}
				} else {
					//Actualizamos sin foto:
					$obj->Actualizar($_POST["id"],$_POST["nombre"]);
					$pagina="perfil_view.php";
				}
			break;
		}
	}
} catch (Exception $e) {
	$msg=$e->getMessage();
	echo $msg;
}
header("Location:$pagina");
?>