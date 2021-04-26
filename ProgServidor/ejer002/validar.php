<?php
//Recogemos el número apostado:
$apuesta = $_POST["apuesta"];
//Obtenemos el ganador de forma aleatoria:
$ganador = rand(1,3);
?>
<html>
	<body>
		<h3>Has apostado por el <?php echo $apuesta ?></h3>
		<h3>El ganador es el <?php echo $ganador ?></h3>
		<a href="adivina.php">Volver a jugar</a>
	</body>
</html>