<?php
	//Incluir código reutilizable en varias páginas
	include("cabecera.php");	
?>

<div style="width:630px;border:solid 1px black;height:400px;position:absolute;top:100px;left:260px;background-color:lightgray" >	
	<span style="text-align: center;margin-top:40px"><h1>Usuario</h1></span>

	<form id="frmMisDatos" name="frmMisDatos" method="post" action="modificarUsuario.php">
		<hr>
		<table cellpadding="10px" style="margin:40px" align="center">
			<tr>
				<td><strong>Email:</strong></td>
				<td><label id="lblEmail" name="lblEmail"></label></td>
			</tr>
			<tr>
				<td><strong>Nombre:</strong></td>
				<td><input type="text" id="txtNombre" name="txtNombre" value="" placeHolder="Indica el nombre" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><strong>Password:</strong></td>
				<td><input type="number" id="txtPassword" name="txtPassword" style="width:100px" value="" placeHolder="Indica el pasword" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><strong>Saldo:</strong></td>
				<td align="left"><input type="number" id="txtSaldo" name="txtSaldo" style="width:100px" value="" placeHolder="Indica el saldo" size="60" autocomplete="off"/></td>
			</tr>
			<tr>
				<td colspan=2 align="center">		
					<input type="button" id="btnGrabar" style="margin-top:20px;height:30px; width:110px;background:url(iconos/save.png) no-repeat;background-position: 10px 4px; " value="Grabar"/><input type="button" id="btnCancelar" style="margin-left:20px;margin-top:20px;height:30px; width:110px; background:url(iconos/cancel.png) no-repeat; background-position: 6px 4px;" value="Cancelar"/> 
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
			<br>
			<h1>
				<?php echo $mensaje;?>	
			</h1>
		</div>
		<input type="hidden" id="email" style="width:0px" name="email" value=""/> 	
		<input type="hidden" id="origen" style="width:0px" name="origen" value=""/> 				
	</form>
</div>
<script type="text/javascript">
	//Puedo venir de la opción mis datos o eligiendo un usuario
	var email = '<?php 
					if (isset($_GET["email"])) {
						echo $_GET["email"];
					} else {
						echo $_SESSION["email"]; 
					}					
				?>';
	$("#email").val(email);

	//Para regresar a la pantalla anterior debo saber el origen

	var origen ='<?php
					if (isset($_GET["origen"])) 
						echo $_GET["origen"];
					else echo "intranet.php";
				?>';

	$("#origen").val(origen);	
								
	$(document).ready(function(){
		pintarDatosUsuario(email);
	  	$('body').on('click', '#btnGrabar', function(){
	  		validarDatos();
	  	});	  
		$('body').on('click', '#btnCancelar', function(){
	  		location.href=$("#origen").val();
	  	});	  	  	
	})

	function pintarDatosUsuario(email){
		$("#lblEmail").html(email);
		$.ajax({
			type: 'POST',
			url: "sw_leerUsuario.php",
			data: { email: email },
			success: function(data){
				console.log(data);
				//convertimos en array de objetos el jason
				usuario = JSON.parse(data);

				$.each(usuario, function( key, value ) {
					$("#txtNombre").val(value.nombre);
					$("#txtPassword").val(value.password);
					$("#txtSaldo").val(value.saldo);			  
				});				
			},
			error: function (xhr, status, error) {
				console.log("error:"+err.Message);
			}
		});
	}		
	function validarDatos(){
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
		if ($("#txtPassword").val().length<4)
		{
			alert("La longitud del password debe ser de 4 digitos o mayor");
			return false;	
		} 
		var resto = $("#txtPassword").val().length%2;
		if (resto!=0)
		{
			alert("El número de dígitos del password debe ser par");
			return false;			
		}			
		if ($("#txtSaldo").val()=="")
		{
			alert("Debes indicar un saldo");
			return false;	
		} 
		frmMisDatos.submit();
	}	
</script>
<?php
include("pie.php");
?>


