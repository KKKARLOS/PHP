<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script>
function validarDatos()
{
	if (formulario.txtEdad.value=="") 
	{
		alert("Debes indicar la edad");
		return false;
	}
	if (formulario.txtEmail.value=="") 
	{
		alert("Debes indicar el email");
		return false;
	}	
	formulario.submit();
}
</script>
</head>

<body>
<h1>
<?php
	//comprobar si existe la variable
	
	if (isset($_GET["mensaje"])){
		$mensaje = $_GET["mensaje"];
		echo "Aviso: $mensaje";
	}
	$edad="";
	if (isset($_GET["edad"])){
		$edad = $_GET["edad"];
	}	
?>
</h1>
<strong><h1>Introduce tu edad</h1></strong>
<form name="formulario" method="post" action="destino.php">
 <input type="numeric" name="txtEdad" name="txtEdad" value="<?php echo $edad ?>" placeHolder="Edad"/>
 <br/><br/>
<input type="Email" name="txtEmail" name="txtEmail" value="" placeHolder="Email"/> 
 <br/><br/>
 <input type="button" id="btnEnviar" name="btnEnviar" onclick="validarDatos();" value="Enviar"/>
</form>
</body>
</html>