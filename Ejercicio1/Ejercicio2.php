<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

</head>

<body>

<?php
	print "<h1>Con FOR</bold></h1>";
	
	print "<ul>";
	for ($x = 1; $x <= 5; $x++) {
		$nAleatorio = rand(1,10);
		if ($nAleatorio==5) break;
		if ($nAleatorio % 2==0)	
			echo "<li style='color:blue'>Número $nAleatorio </li>";
		else
			echo "<li style='color:red'>Número $nAleatorio </li>";
	}	
	print "</ul>";
	print "<br><br>";
	print "<ul>";
	
	print "<h1>Con While</bold></h1>";
	$condicion=true;
	$contador=1;
	while ($contador<=5 and $nAleatorio!=5) 
	{
	
		$nAleatorio = rand(1,10);
		$contador++;
		if ($nAleatorio % 2==0)	
			echo "<li style='color:blue'>Número $nAleatorio </li>";
		else
			echo "<li style='color:red'>Número $nAleatorio </li>";
	}	
	print "</ul>";
	print "<br><br>";	
	
	//$dias = array("L", "M", "X" "J" "V" "S" "D");
	$dias = ["L", "M", "X", "J", "V" ,"S", "D"];
	print "<ul>";
	for ($d = 0; $d < 7; $d++) {
		echo "<li>".$dias[$d]."</li>";
	}	
	print "</ul>";	
?>
</body>
</html>