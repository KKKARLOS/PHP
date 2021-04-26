<?php 	//Vamos a usar variables de sesión:
session_start();

//Recogemos el número apostado:
$apuesta = $_POST["apuesta"];

//Solo tenemos que inventar un número la primera vez, mientras no acierte
//se mantiene el mismo número:
if (!isset($_SESSION["ganador"])) {
	//Obtenemos el ganador de forma aleatoria:
	$_SESSION["ganador"] = rand(1,10);
}
?>
<html>
	<body>
		<?php
		if ($apuesta == $_SESSION["ganador"]) {
			echo "Acierto!! <a href='adivina.php'>Nueva partida</a>";
			//Elimino todas las variables de sesión:
			session_unset();
		} else {
			echo "<h3>TRAMPA: ".$_SESSION["ganador"]."</h3>";
			echo "Fallo!";
			//Calculo el nuevo min o max:
			if ($apuesta > $_SESSION["ganador"]) {
				$_SESSION["max"] = $apuesta;
			} else {
				$_SESSION["min"] = $apuesta;
			}
			echo "<br/><a href='adivina.php'>Volver a jugar</a>";
		}
		?>
		
	</body>
</html>