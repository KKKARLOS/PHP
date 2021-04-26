<?php 	//Vamos a usar variables de sesi�n:
session_start();

//Recogemos el n�mero apostado:
$apuesta = $_POST["apuesta"];

//Solo tenemos que inventar un n�mero la primera vez, mientras no acierte
//se mantiene el mismo n�mero:
if (!isset($_SESSION["ganador"])) {
	//Obtenemos el ganador de forma aleatoria:
	$_SESSION["ganador"] = rand(1,10);
}
?>
<html>
	<body>
		<?php
		if ($apuesta == $_SESSION["ganador"]) {
			echo "Acierto!!";
			//Elimino la variable de sesi�n:
			unset($_SESSION["ganador"]);
		} else {
			echo "<h3>TRAMPA: ".$_SESSION["ganador"]."</h3>";
			echo "Fallo!";
			echo "<br/><a href='adivina.php'>Volver a jugar</a>";
		}
		?>
		
	</body>
</html>