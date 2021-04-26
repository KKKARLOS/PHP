<?php
	unlink("images/fotoPerfil.jpg");
	$fichero = 'images/foto.jpg';
	$nuevo_fichero = 'images/fotoPerfil.jpg';

	if (!copy($fichero, $nuevo_fichero)) {
	    $mensaje="Error al copiar $fichero...\n";
	}	
	else
	{
		$mensaje="Foto eliminada";
	}
	header("Location:misDatos.php?mensaje=$mensaje");
?>