<?php
session_start();
if (!isset($_SESSION["min"]) || !isset($_SESSION["max"])) {
	$_SESSION["min"]=1;
	$_SESSION["max"]=10;
}
?>
<html>
	<body>
	<form method="post" action="validar.php">
		<h3>Introduce un num <?php echo $_SESSION["min"]?> - <?php echo $_SESSION["max"]?>:</h3>
		
		<input type="text" name="apuesta" id="apuesta" 
			placeholder="Apuesta" required/>
			
		<br/>
		
		<input type="submit" name="btn_jugar" id="btn_jugar" value="Jugar"/>

	</form>
	</body>

</html>