<?php
	//Incluir código reutilizable en varias páginas
	include("cabecera.php");	
	//uso de la variable de session
	print "<h1 style='margin-left:15px'>Usuario: ".$_SESSION["email"]."</h1>";
?>

<ul>
	<li><a href='intranet.php'>Volver Intranet</a></li>
	<li><a href='logout.php'>Salir de la aplicación</a></li>
</ul>
<form enctype="multipart/form-data" action="subir-archivos.php" method="POST">
<div style="margin-left:10px">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> 
	Elige la foto a Subir:
	<input name="archivo-a-subir" type="file" /><input type="submit" value="Subir Archivo" />
</div>
<div style="margin-top:20px;margin-left:120px;width:200px;height:200px">
<?php
	$nombre_fichero = 'images/fotoPerfil.jpg';

	if (file_exists($nombre_fichero)) {
		print "entra";
	    echo "<img src='images/fotoPerfil.jpg' id='foto' whidth='200' height='200'/>";
	    echo "<br><a href='eliminarFoto.php'>Eliminar Foto</a></br>";
	}
?>
</div>
<h3 id="divMensaje" style="margin-top:90px">
<?php
	//comprobar si existe la variable
	
	if (isset($_GET["mensaje"])){
		$mensaje = $_GET["mensaje"];
		echo "Aviso: $mensaje";
	}
?>	
</h3>
</form>
<?php
include("pie.php");
?>