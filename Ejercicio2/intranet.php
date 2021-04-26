
<?php
	//Incluir código reutilizable en varias páginas (include o require)
	require("cabecera.php");
	//uso de la variable de session
	print "<h1>Bienvenido ".$_SESSION["email"]."</h1>";
?>
<br><br>
<ul>
	<li><a href='misDatos.php'>Ver mis datos</a></li>
	<li><a href='logout.php'>Salir de la aplicación</a></li>
</ul>
<?php
require("pie.php");
?>

