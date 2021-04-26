<?php
	//Incluir código reutilizable en varias páginas
	include("cabeceraConSession.php");	
?>
<div style="width:510px;border:solid 1px black;height: 400px;position:absolute;top:100px;left:300px;background-color:lightgray" >

<form id="frmLogin" name="frmLogin" action="validar.php" method="post">
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
			<td colspan=2 align="center"><input id="btnValidar" type="button" style="cursor:pointer;margin-top:20px;height:30px; width:110px;background:url(iconos/key.png) no-repeat; background-position: 6px 4px;text-align: right;text-align:center" value="Validar"/><a style="cursor:default;text-decoration: none" href="registrar.php?origen=login.php"><input type="button" style="cursor:pointer;margin-left:20px;margin-top:20px;height:30px; width:110px;background:url(iconos/save.png) no-repeat; background-position: 1px 4px;text-align: right;text-align:center" value="Registrarse"/></a> 
			</td>
		</tr>
	</table>
	<?php
		$mensaje = "";
		if (isset($_SESSION["autorizado"])){	
			if ($_SESSION["autorizado"]==false) $mensaje = "Usuario no autorizado";
		}
		if (isset($_GET["mensaje"])){
			$mensaje = $_GET["mensaje"];
			unset($_SESSION["email"]);
			unset($_SESSION["autorizado"]);
			unset($_SESSION["mensaje"]);			
		}			
	?>	
	<div id="divMensaje" width="300px" height="90px" style="margin-left:100px">
		<h1>
			<?php echo $mensaje?>	
		</h1>
	</div>

</form>
</div>
<script>
	$(document).ready(function(){
		$('body').on("keypress", "input[type='email'],input[type='password']", function(){
			$("#divMensaje>h1").html("");
	  	});
	  	$('body').on('click', '#btnValidar', function(){
	  		validarDatos();
	  	});
	})	
	function validarDatos(){
		if ($("#txtEmail").val()=="")
		{
			alert("Debes indicar el email");
			return false;	
		} 
		if ($("#txtPassword").val()=="")
		{
			alert("Debes indicar el password");
			return false;	
		} 

		frmLogin.submit();
	}	
</script>
<?php
include("pie.php");
?>