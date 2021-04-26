<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

</head>

<body>
<h1>Hoy es</h1><strong>
<?php
	//echo "Hoy es ".date("d-m-Y");
	$hoy=date("d-m-Y");
	print $hoy
	//echo "Hoy es ".$hoy;
	//echo "Hoy es $hoy";
	//$txt1="Hola mundo";
	//print "<h2>".$txt1."</h2>";
	//print "<h1>Hoy es</h1><strong>$hoy</strong>";
?>
</body>
</strong>
<br><br><br>
<?php
	//echo "Hoy es ".date("d-m-Y");
	$dia=date("d");
	if ($dia>15) print "Ya ha pasado medio mes";
	else print "Estamos a día $dia";
?>
<br><br><br>
<?php
	//echo rand() . "\n";
	//echo rand() . "\n";
	print "<h1>Con FOR</bold></h1>";
	
	$nAleatorio = rand(1, 10);
	print "El número aleatorio es $nAleatorio";
	
	if ($nAleatorio==3) print "<br><br>Has acertado el número secreto";
	
	print "<br><br>";
	for ($x = 1; $x <= $nAleatorio; $x++) {
		echo "Fila número: $x <br>";
	}	

	print "<br><br>";
	for ($x = $nAleatorio; $x >=1; $x--) {
		echo "Fila número: $x <br>";
	}	
	
	print "<h1>Con While</bold></h1>";
	$x = 1; 

	while($x <= $nAleatorio) {
		echo "Fila número: $x <br>";
		$x++;
	} 
	
	print "<br>";
	$x = $nAleatorio; 

	while($x >= 1) {
		echo "Fila número: $x <br>";
		$x--;
	} 	
?>
</html>