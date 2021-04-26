<h1>
<?php
//print ($_FILES["archivo-a-subir"]["type"]);
/*if ((($_FILES["archivo-a-subir"]["type"] == "image/gif")
  || ($_FILES["archivo-a-subir"]["type"] == "image/jpeg")
  || ($_FILES["archivo-a-subir"]["type"] == "image/jpg"))
  || ($_FILES["archivo-a-subir"]["type"] == "image/png")	
  && ($_FILES["archivo-a-subir"]["size"] < 1000000))
 */
$mensaje="";

if (($_FILES["archivo-a-subir"]["type"] == "image/jpeg") ) //&& ($_FILES["archivo-a-subir"]["size"] < 1000000))
{
 	$target_path = "images/fotoPerfil.jpg"; 
	//$target_path = $target_path . basename( $_FILES['archivo-a-subir']['name']); 
	if(move_uploaded_file($_FILES['archivo-a-subir']['tmp_name'], $target_path)) 
	{ 
	$mensaje= "El archivo ". basename( $_FILES['archivo-a-subir']['name'])." ha sido subido exitosamente!"; 
	} 
	else
	{ 
	$mensaje="Hubo un error al subir tu archivo! Por favor intenta de nuevo."; 
	} 
}
else
{
 $mensaje="Archivo Invalido!!, comprueba las restricciones.";
}

header("Location:misDatos.php?mensaje=$mensaje");

?>
</h1>
