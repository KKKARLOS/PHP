<?php
	//Incluir código reutilizable en varias páginas
	include("cabeceraConSession.php");	
?>
<div style="width:630px;border:solid 1px black;height:400px;position:absolute;top:100px;left:260px;background-color:lightgray" >	
	<span style="text-align: center;margin-top:40px"><h1>Registro de Usuario</h1></span>

	<form id="frmRegistrar" name="frmRegistrar" action="insertarUsuario.php" method="post">
		<hr>
		<table cellpadding="10px" style="margin:40px" align="center">
			<tr>
				<td><strong>Email:</strong></td>
				<td><input type="text" id="txtEmail" name="txtEmail" value="" placeHolder="Indica el email" size="60"/></td>
			</tr>
			<tr>
				<td><strong>Nombre:</strong></td>
				<td><input type="text" id="txtNombre" name="txtNombre" value="" placeHolder="Indica el nombre" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><strong>Password:</strong></td>
				<td><input type="text" id="txtPassword" name="txtPassword" style="width:100px" value="" placeHolder="Indica el pasword" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><strong>Saldo:</strong></td>
				<td align="left"><input type="number" id="txtSaldo" name="txtSaldo" style="width:100px" value="" placeHolder="Indica el saldo" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td colspan=2 align="center">		
					<input type="button" id="btnGrabar" style="cursor:pointer;margin-top:20px;height:30px; width:110px;background:url(iconos/save.png) no-repeat;background-position: 10px 4px;" value="Grabar"/>
					<input type="button" id="btnCancelar" style="margin-left:20px;margin-top:20px;height:30px; width:110px; background:url(iconos/cancel.png) no-repeat; background-position: 6px 4px;" value="Cancelar"/> 
				</td>
			</tr>
		</table>
		<?php
			$mensaje = "";
			if (isset($_GET["mensaje"])){
				$mensaje = $_GET["mensaje"];
			}			
		?>	
		<div id="divMensaje" width="300px" height="90px" style="margin-left:100px">
			<h1>
				<?php echo $mensaje?>	
			</h1>
		</div>
	</form>
</div>
<script type="text/javascript">
	var existeDireccion=false;
	var origen ='<?php
					if (isset($_GET["origen"])) 
						echo $_GET["origen"];
					else echo "intranet.php";
				?>';	
	$(document).ready(function(){
	  	$('body').on('blur', '#txtEmail', function(){
	  	comprobarEmail();
	  	});

	  	$('body').on('click', '#btnGrabar', function(){
	  	validarDatos();
	  	});	

		$('body').on('click', '#btnCancelar', function(){
	  		location.href=origen; //$("#origen").val();
	  	});	 	    
	})	
	function comprobarEmail(){
		$.ajax({
			type: 'POST',
			url: "sw_usuario_email.php",
			data: { email: $("#txtEmail").val() },
			success: function(data){
				console.log(data);
				if (data=="true") {
					existeDireccion=true;
					$("#txtEmail").css("backgroud-color","red");
					alert("Existe otro usuario con el mismo Email");
				}
				else existeDireccion=false;
			},
			error: function (xhr, status, error) {
				console.log("error:"+err.Message);
			}
		});
	}
	function validarDatos(){
		if ($("#txtEmail").val()=="")
		{
			alert("Debes indicar el email");
			return false;	
		} 
		if (existeDireccion)
		{
			alert("El mail indicado ya existe");
			return false;	
		} 		
		if ($("#txtNombre").val()=="")
		{
			alert("Debes indicar el nombre");
			return false;	
		} 		
		if ($("#txtPassword").val()=="")
		{
			alert("Debes indicar el password");
			return false;	
		} 
		if ($("#txtSaldo").val()=="")
		{
			alert("Debes indicar un saldo");
			return false;	
		} 
		frmRegistrar.submit();
	}	
</script>
<?php
include("pie.php");
?>


