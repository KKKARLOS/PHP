<?php session_start();
include '../../model/cpeliculas.php';
$pagina="peliculas_view.php";
$msg="";
try {
	if (isset($_GET["op"])) {
		$obj = new CPeliculas();
		switch ($_GET["op"]) {
			case 1: //Insertar nueva película
				$obj->Insertar($_POST["p_title"],$_POST["p_anio"],$_POST["p_video"],$_POST["p_desc"]);
				if ($id<=0) {
					$msg="No se ha podido insertar la película";
				}
				break;
			case 2: //Actualizar película
				$total = $obj->Actualizar($_POST["p_id"],$_POST["p_title"],$_POST["p_anio"],$_POST["p_video"],$_POST["p_desc"]);
				if ($total<=0) {
					$msg="No se ha podido actualizar la película";
				}
				break;
			case 3: //Eliminar película
				$total = $obj->Eliminar($_GET["id"]);
				if ($total<=0) {
					$msg="No se ha podido eliminar la película";
				}
				break;
		}
	}
} catch (Exception $e) {
	$msg=$e->getMessage();
	echo $msg;
}
header("Location:$pagina?msg=$msg");
?>