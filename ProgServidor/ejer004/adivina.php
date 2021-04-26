<?php
session_start();
?>
<html>
	<body>
	<form method="post" action="validar.php">
		<h3>Introduce un num 1-10:</h3>
		
		<input type="text" name="apuesta" id="apuesta" 
			placeholder="Apuesta" required/>
			
		<br/>
		
		<input type="submit" name="btn_jugar" id="btn_jugar" value="Jugar"/>

	</form>
	</body>

</html>