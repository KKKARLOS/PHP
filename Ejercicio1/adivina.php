<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script>
function validarDatos()
{
	if (parseInt(formulario.txtNumero.value,10)<1 || parseInt(formulario.txtNumero.value,10)>10) 
	{
		alert("Valor incorrecto");
		return false;
	}
	formulario.submit();
}
</script>
</head>

<body>
<?php
	session_start();
	if (isset($_SESSION["ganador"])){
		if ($_SESSION["ganador"]>$_SESSION["numero"]){
			$margen = $_SESSION["numero"]." y ".$_SESSION["ganador"];
		}
		else
		{
			$margen = $_SESSION["ganador"]." y ".$_SESSION["numero"];
		}
	}
	else
	{
		$margen = "1 y 10";
	}
?>
<strong><h1>Introduce un número entre <?php echo $margen;?></h1></strong>
<form name="formulario" method="post" action="validar_session.php">
 <input type="numeric" name="txtNumero" name="txtNumero" value="" required width="300px" placeHolder="Introduce un número
 "/>
 <br/><br/>
 <input type="button" id="btnEnviar" name="btnEnviar" onclick="validarDatos()" value="Jugar"/>

</form>
</body>
</html>