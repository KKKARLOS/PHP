<?php
session_start();

	$numero = $_POST["txtNumero"];
	$_SESSION["numero"] = $numero;
	
	if (!isset($_SESSION["ganador"])){
		$_SESSION["ganador"] = rand(1,10);
	}
?>
<html>
	<body>
		<?php
		if ($numero==$_SESSION["ganador"])
		{
			echo "Acierto";
			//$_SESSION["ganador"]=null;
			unset($_SESSION["ganador"]);
		}
		else
		{
			echo "<h1>Error</h1><br>";
			//echo "<h3>Trampa: ".$_SESSION["ganador"]."</h3>";
			echo "<a href='adivina.php'>Pulsa aquí para seguir jugando</a>";
		}
		?>
	</body>
</html>