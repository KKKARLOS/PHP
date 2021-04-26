<?php
require("cabecera.php");
?>
	<h1>MIS DATOS:</h1>
	<h3>Usuario: <?php echo $_SESSION["email"];?></h3>
	<h3>Foto perfil:</h3>
	<img src="images/fotoperfil.jpg" width="90" />
	<form enctype="multipart/form-data" method="POST" action="cambiarfoto.php">
		<input type="file" name="fotoperfil" size="30"/>
		<p>
		<input type="submit" value="Actualizar Foto"/>
		</p>
	</form>
<?php
require("pie.php");
?>