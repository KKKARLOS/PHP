

<?php
	$numero = $_POST['txtNumero'];
?>

<html>
<body>


<?php
		print "<h1><strong>Has apostado por el número $numero"."</strong></h1><br><br>";
		
		$condicion=true;
		$contador=0;
		
		do{
	
			$nAleatorio = rand(1,10);
			$contador++;
			print "Sorteo: ".$contador." : ".$nAleatorio."<br>";

		}while ($nAleatorio!=$numero); 	
		print "<br>Numero de intentos:".$contador;

?>	
	
<a href="adivina.php>Pulsa aquí para seguir jugando</a>
</body>
</html>