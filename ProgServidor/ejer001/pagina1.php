<html>

<body>
<h1>
<?php
	//Comprobar si existe en la url una variable msg:
	if (isset($_GET["msg"])) {
		echo $_GET["msg"];
	}
	$edad="";
	if (isset($_GET["edad"])) {
		$edad=$_GET["edad"];
	}
?>
</h1>
<form id="form_validar" name="form_validar" method="post" action="pagina2.php">
	<h3>Introduce tu edad:</h3>
	<input type="text" name="edad" id="edad" placeholder="Edad" 
	value="<?php echo $edad ?>"/>
	
	<br/>
	<input type="text" name="email" id="email" placeholder="Introduce email" size="20" required/>
	<br/>
	<input type="submit" name="btn_validar" id="btn_validar" value="Validar" required/>

</form>
</body>

</html>