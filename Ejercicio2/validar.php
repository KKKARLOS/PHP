<?php
	//Necesario para gestionar variables de session
	session_start();
	// Declaración de la función de usuario para validar el acceso

	function validarAcceso($email,$password)
	{
		$valido=false;
		if (is_numeric($password)){
			$resto=$password%2;
			$longitud=strlen($password);

			if ($resto==0&&$longitud>=4){
				if (
					(strpos($_POST["txtEmail"], '.net'))
					or
					(strpos($_POST["txtEmail"], '.com'))
				    )			
				{
					$valido=true;
					$_SESSION["autorizado"] = true;
					$_SESSION["email"] = $_POST["txtEmail"];
					$pagina_destino="intranet.php";					
				}			
			}		
		}
		return $valido;		
	}

	//Recojo los valores de los inputs enviados al submitir por post
	$email = $_POST["txtEmail"];
	$password = $_POST["txtPassword"];

	// Validar Password
	if (validarAcceso($email, $password))
	{
		$_SESSION["autorizado"] = true;
		$_SESSION["email"] = $_POST["txtEmail"];
		$pagina_destino="intranet.php";			
	}
	else
	{
		$_SESSION["autorizado"] = false;
		$pagina_destino="login.php";
	}
	// Si la clave no es correcta redirijo a la pagina de login en caso contrario 
	// permito entrar a la intranet
	
	header("Location:$pagina_destino");
?>
