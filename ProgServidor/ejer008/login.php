<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 600px; margin: 0 auto; border-style: double; margin-top:20px; padding: 10px">

	<?php
		if (isset($_GET["msg"])) {
			echo "<h2>".$_GET["msg"]."</h2>";
		}
	?>
	<form method="POST" action="validar.php">
		<h3>Usuario:</h3>
		<input type="email" id="email" name="email" size="20"/>

		<h3>Pass:</h3>
		<input type="password" id="password" name="password" size="6"/>
		<p><input type="submit" value="Validar"/></p>
	</form>
</body>
</html>