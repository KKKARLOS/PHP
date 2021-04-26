<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../css/jquery-ui.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<title>Documento sin título</title>
<style type="text/css">
	.oculta{display: none;}
	.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {text-align: center; 
		float: none !important; 
	}
</style>
</head>
<body background="../images/tragaperras.jpg">

<!--Ventana de bienvenida-->

<div id="InicioDialog" title="Iniciar juego">
  <h4>Bienvenido al juego de las tragaperras</h4>
</div>

<!--Ventana de Login-->

<div id="LoginDialog" class="oculta" title="Login">
  <h3><label id="lblBienvenidaLogin"></label></h3>
 
  <form>
      <label for="name">Usuario</label></br>
      <input type="text" id="txtUsuarioLog" value="" class="text ui-widget-content ui-corner-all"></br></br>
      <label for="password">Password</label></br>
      <input type="password" id="txtPasswordLog" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>

<!--Ventana de Registro-->

<div id="RegisterDialog" class="oculta" title="Registro">
  <h3><label id="Registro"></label></h3>
  <form style="text-align:center">
      <label for="name">Usuario</label></br></br>
      <input type="text" id="txtUsuarioReg" value="" class="text ui-widget-content ui-corner-all"/></br></br>
  </form>
</div>

<!--Ventana de Bienvenida y Password-->

<div id="BienvenidaDialog" class="oculta" title="Registro">
  <h3><label id="Registro"></label></h3>
 <h3><label id="lblBienvenida"></label></h3>
  <form style="text-align:center">
      <label for="password">Tu Password es</label></br></br>
      <input type="text" id="txtPasswordBien" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>

<!--Ventana de Cambiar Password-->

<div id="CambiarPassDialog" class="oculta" title="Password">
  <form style="text-align:center">
  	  </br>
      <label for="password">New Password</label></br></br>
      <input type="text" id="txtPasswordChange" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>
<!--
-->
<script>
	$(function(){

		// Inicializar ventana de inicio

		dialog = $( "#InicioDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },
		  height: 200,
		  width: 350,
		  modal: true,
		  buttons: {
			Login: function() {
			  $("#txtUsuarioLog").val("");
			  $("#txtPasswordLog").val("");		
			  $("#InicioDialog" ).dialog("close");
			  $("#LoginDialog").dialog( "open" );
			},
			Registrar: function() {
			  $("#InicioDialog" ).dialog("close");
			  $("#RegisterDialog").dialog( "open" );
			}
		  },
		  close: function() {
			return false;
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});
			
		// Inicializar ventana de login 
			
		dialog = $( "#LoginDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },		  
		  height: 270,
		  width: 350,
		  modal: true,
		  buttons: {
			Aceptar: function() {
			  $( "#LoginDialog" ).dialog( "close" );
				parameters={funcion: "ValidarPassword", usuario: $("#txtUsuarioLog").val(), password: $("#txtPasswordLog").val()};				
				$.ajax({
						type: "POST",
					url: "../servicios/sw_usuario.php",
					data: parameters,
					success: function(data){
						usuario = JSON.parse(data);
						if (usuario.validado==true&&usuario.accesos==1)
						{
							$("#LoginDialog" ).dialog( "close" );
							$("#CambiarPassDialog" ).dialog( "open" );
						}
						else if (usuario.validado==true&&usuario.accesos>1)
						{
							location.href="main.php";
						}
						else if (usuario.validado==false) 
						{
							alert("Usuario o Contraseña incorrecta");
							$("#LoginDialog" ).dialog("open");
						}
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});				  
			},
			Cancelar: function() {
			  $("#LoginDialog" ).dialog( "close" );
			  $("#InicioDialog" ).dialog("open");
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});
		
		// Inicializar ventana de registro

		dialog = $( "#RegisterDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },		  
		  height: 250,
		  width: 350,
		  modal: true,
		  buttons: {
			Aceptar: function() {		  
				$("#RegisterDialog" ).dialog( "close" );
				parameters={funcion: "Registrar", usuario: $("#txtUsuarioReg").val()};				
				$.ajax({
						type: "POST",
					url: "../servicios/sw_usuario.php",
					data: parameters,
					success: function(data){
						usuario = JSON.parse(data);
						$("#txtPasswordBien").val(usuario.password);
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});			  
				$("#lblBienvenida").text("Bienvenido/a " + $("#txtUsuarioReg").val());
				$("#BienvenidaDialog").dialog( "open" );
			},
			Cancelar: function() {
			  $("#RegisterDialog" ).dialog( "close" );
			  $("#InicioDialog" ).dialog("open");
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});

		// Inicializar ventana de bienvenida

		dialog = $( "#BienvenidaDialog").dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },		  
		  height: 260,
		  width: 350,
		  modal: true,
		  buttons: {
			Continuar: function() {
			  $("#BienvenidaDialog" ).dialog( "close" );
			  $("#txtUsuarioLog").val($("#txtUsuarioReg").val());
			  $("#txtPasswordLog").val($("#txtPasswordBien").val());
			  $("#LoginDialog").dialog( "open" );
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});
		
		// Inicializar ventana de cambio de password

		dialog = $( "#CambiarPassDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },		  
		  height: 230,
		  width: 350,
		  modal: true,
		  buttons: {
			Continuar: function() {
				parameters={funcion: "CambiarPassword", password: $("#txtPasswordChange").val()};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_usuario.php",
					data: parameters,
					success: function(data){
						usuario = JSON.parse(data);
						alert("Password modificado correctamente");
					    $("#txtUsuarioLog").val(usuario.usuario);
			  		    $("#txtPasswordLog").val(usuario.password);
					 	$("#CambiarPassDialog" ).dialog( "close" );
					  	$("#LoginDialog").dialog( "open" );	
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});


			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});		
		$("div").removeClass("oculta");		
		$("#InicioDialog" ).dialog("open");			
	});	
</script>
</body>
</html>
