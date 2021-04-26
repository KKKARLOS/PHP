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
	.no-close .ui-dialog-titlebar-close {display: none }
	.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {text-align: center; 
		float: none !important; 
	.ui-widget-overlay {
	    background: #343a40	 !important;
	}		
	.bg-dark {
    background-color: #343a40 !important;
		}		
	}
</style>
</head>
<body>
<!--<body background="../images/banco.jpg">
Ventana de bienvenida-->

<div id="InicioDialog" class="oculta" title="Inicio">
  <h4>Bienvenido.</br></br> 
  Indicar la operación a realizar</h4>
</div>

<!--Ventana de Login-->

<div id="LoginDialog" class="oculta" title="Login">
  <h3><label id="lblBienvenidaLogin"></label></h3>
 
  <form autocomplete="off">
      <label for="name">Nombre</label></br>
      <input type="text" id="txtNombreLog" value="" autocomplete="off" class="text ui-widget-content ui-corner-all"></br></br>
      <label for="pin">PIN</label></br>
      <input type="password" id="txtPinLog" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>

<!--Ventana de Creación de cuenta-->

<div id="CrearDialog" class="oculta" title="Abrir cuenta">
  <form style="text-align:center">
  		</br>	</br>
      <label for="name">Nombre</label></br></br>
      <input type="text" id="txtNombreReg" value="" class="text ui-widget-content ui-corner-all"/></br></br>
  </form>
</div>

<!--Ventana de Bienvenida y Password-->

<div id="BienvenidaDialog" class="oculta" title="Abrir cuenta">
 <h3><label id="lblBienvenida"></label></h3>
  <form style="text-align:center">
      <label for="pin">Tu PIN es</label></br></br>
      <input type="text" id="txtPinBien" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>

<!--Ventana de Cambiar PIN-->

<div id="CambiarPinDialog" class="oculta" title="PIN">
  <form style="text-align:center">
  	  </br>
      <label for="pin">New PIN</label></br></br>
      <input type="text" id="txtPinChange" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>
<!--
-->
<script>
	$(function(){

		var idcuenta;
		// Inicializar ventana de inicio

		dialog = $( "#InicioDialog" ).dialog({
		  dialogClass: 'no-close',
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },
		  height: 240,
		  width: 350,
		  modal: true,
		  buttons: {
			Login: function() {
			  $("#txtNombreLog").val("");
			  $("#txtPinLog").val("");		
			  $("#InicioDialog" ).dialog("close");
			  $("#LoginDialog").dialog( "open" );
			},
		    Cuenta: function() {
			  $("#InicioDialog" ).dialog("close");
			  $("#CrearDialog").dialog( "open" );
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
				parameters={funcion: "ValidarPin", nombre: $("#txtNombreLog").val(), pin: $("#txtPinLog").val()};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_cuenta.php",
					data: parameters,
					success: function(data){
						cuenta = JSON.parse(data);
						idcuenta=cuenta.idcuenta;

						if (cuenta.validado==true&&cuenta.accesos==1)
						{
							$("#LoginDialog" ).dialog( "close" );
							$("#CambiarPinDialog" ).dialog( "open" );
						}
						else if (cuenta.validado==true&&cuenta.accesos>1)
						{
							location.href="main.php?idcuenta="+idcuenta;
						}
						else if (cuenta.validado==false) 
						{
							alert("Nombre o PIN incorrecta");
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
		
		// Inicializar ventana de Abrir Cuenta

		dialog = $( "#CrearDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },		  
		  height: 270,
		  width: 370,
		  modal: true,
		  buttons: {
			Aceptar: function() {		  
				$("#CrearDialog" ).dialog( "close" );
				parameters={funcion: "Crear", nombre: $("#txtNombreReg").val()};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_cuenta.php",
					data: parameters,
					success: function(data){
						cuenta = JSON.parse(data);
						idcuenta= cuenta.idcuenta;
						$("#txtPinBien").val(cuenta.pin);
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});			  
				$("#lblBienvenida").text("Bienvenido/a " + $("#txtNombreReg").val());
				$("#BienvenidaDialog").dialog( "open" );
			},
			Cancelar: function() {
			  $("#CrearDialog" ).dialog( "close" );
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
		  width: 370,
		  modal: true,
		  buttons: {
			Continuar: function() {
			  $("#BienvenidaDialog" ).dialog( "close" );
			  $("#txtNombreLog").val($("#txtNombreReg").val());
			  $("#txtPinLog").val($("#txtPinBien").val());
			  $("#LoginDialog").dialog( "open" );
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});
		
		// Inicializar ventana de cambio de password

		dialog = $( "#CambiarPinDialog" ).dialog({
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
				parameters={funcion: "CambiarPin", idcuenta: idcuenta, pin: $("#txtPinChange").val()};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_cuenta.php",
					data: parameters,
					success: function(data){
						cuenta = JSON.parse(data);
						alert("PIN modificado correctamente");
					    $("#txtNombreLog").val(cuenta.nombre);
			  		    $("#txtPinLog").val(cuenta.pin);
					 	$("#CambiarPinDialog" ).dialog( "close" );
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
		$("#txtNombreReg").keydown(function (event) {
	        if (event.keyCode == $.ui.keyCode.ENTER) {
	            return false;
	        }
	    });
	    $("#txtPinBien").keydown(function (event) {
	        if (event.keyCode == $.ui.keyCode.ENTER) {
	            return false;
	        }
	    }); 

	});	
</script>
</body>
</html>
