<?php
//Recogemos el número apostado:
$apuesta = $_POST["apuesta"];
?>
<html>
	<body>
		<h3>Has apostado por el <?php echo $apuesta ?></h3>
		<?php
		$intentos = 0;
		do {
			//Obtenemos el ganador de forma aleatoria:
			$ganador = rand(1,10);
			//Sumamos un intento:
			$intentos++;
			//Mostramos en pantalla:
			echo "<h4>Sorteo $intentos, ganador: $ganador</h4>";
		} while ($apuesta!=$ganador);
		echo "<h3>Intentos hechos: $intentos";
		?>
		<br/>
		<a href="adivina.php">Volver a jugar</a>
	</body>
</html>