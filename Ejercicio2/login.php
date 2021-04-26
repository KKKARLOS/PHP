<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body >
<div style="width:510px;border:solid 1px black;height: 400px;position:absolute;top:100px;left:300px;background-color:lightgray" >
<form action="validar.php" method="post">
	<h1 style="text-align:center">Login</h1>
	<hr>
	<table align="center" style="margin:40px" border="0" cellpadding="15px">
		<tr>
			<td><strong>Email</strong></td>
			<td><input type="email" id="txtEmail" name="txtEmail" required style="width:300px" placeHolder="Introduce un email"/>
			</td>
		</tr>
		<tr>
			<td><strong>Password</strong></td>
			<td><input type="password" id="txtPassword" name="txtPassword" required style="width:300px" placeHolder="Introduce un password"/></td>
		</tr>
		<tr>
			<td colspan=2 align="center"><input type="submit" style="margin-top:20px;height:30px; width:110px" value="Validar"/><a href="../registrar/registrar.php"><input type="button" style="margin-left:20px;margin-top:20px;height:30px; width:110px" value="Registrarse"/></a> 
			</td>
		</tr>
	</table>
	<?php
		session_start();
		$mensaje = "";
		if (isset($_SESSION["autorizado"])){	
			if ($_SESSION["autorizado"]==false) $mensaje = "Usuario no autorizado";
		}
		if (isset($_GET["mensaje"])){
			$mensaje = $_GET["mensaje"];
		}					
	?>	
	<div id="divMensaje" width="300px" height="90px" style="margin-left:100px">
		<h1>
			<?php echo $mensaje?>	
		</h1>
	</div>
</div>
</form>
</body>
</html>