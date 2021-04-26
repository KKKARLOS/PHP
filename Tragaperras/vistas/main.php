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

<!--Ventana de Opciones-->

<div id="OpcionesDialog" class="oculta" title="Opciones disponibles">
  <h3><label id="lblBienvenida"></label></h3>
  <div style="float: right "><label style="margin-right:10px">Saldo:</label><label id="lblSaldo" style="margin-right:2px;width: 150px;border-color:#FFB100;
border-width:1px;
border-style:solid;
background:#F5F5F5;"></label></div>
  </br></br></br>
  <form style="text-align:center">
      <input type="button" style="width:200px" id="btnRecargarSaldo" value="Recargar Saldo" /></br></br>
      <input type="button" style="width:200px" id="btnJugarPartida" value="Jugar Partida" disabled="true" /></br></br>
      <input type="button" style="width:200px" id="btnCambiarPass" value="Cambiar Password" /></br></br>
      <input type="button" style="width:200px" id="btnLogout" value="Logout" ></br></br>      
  </form>
</div>

<!--Ventana de actualización de saldo-->

<div id="RecargarSaldoDialog" class="oculta" title="Recargar saldo">
  <form style="text-align:center">
  	  </br></br>
      <label for="name">Importe</label></br></br>
      <input type="number" id="txtImporte" value="" class="text ui-widget-content ui-corner-all"/></br></br>
  </form>
</div>

<!--Ventana de Cambiar Password-->

<div id="CambiarPasswordDialog" class="oculta" title="Password">
  <form style="text-align:center">
      <label for="password">New Password</label></br></br>
      <input type="text" id="txtPasswordChange" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>
<script>
	$(function(){
		// Inicializar ventana de opciones 	
		dialog = $( "#OpcionesDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },
		  height: 370,
		  width: 400,
		  modal: true,
		});
			
		// Inicializar ventana de recarga de saldo 

		dialog = $( "#RecargarSaldoDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },
      	  position:{my:"right center",at:"right center",of:window},		  
		  height: 250,
		  width: 350,
		  modal: true,
		  buttons: {
			Aceptar: function() {		  
				$("#RecargarSaldoDialog" ).dialog( "close" );
				parameters={funcion: "actualizarSaldo", importe: $("#txtImporte").val()};				
				$.ajax({
						type: "POST",
					url: "../servicios/sw_usuario.php",
					data: parameters,
					success: function(data){
						usuario = JSON.parse(data);
						importe= new Intl.NumberFormat('es-ES').format(usuario.saldo) + " euros";
						$("#lblSaldo").html(importe);
						if (usuario.saldo<15)
							$("#btnJugarPartida").attr("disabled",true);
						else
							$("#btnJugarPartida").attr("disabled",false);
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});			  
				$("#lblBienvenida").text("Bienvenido/a " + usuario.usuario);
				$("#BienvenidaDialog").dialog( "open" );
			},
			Cancelar: function() {
			  $("#RecargarSaldoDialog" ).dialog( "close" );
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});
	
		dialog = $( "#CambiarPasswordDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "blind",
        		duration: 700
      	  },
      	  position:{my:"right center",at:"right center",of:window},		  
		  height: 230,
		  width: 350,
		  modal: true,
		  buttons: {
			Continuar: function() {
				if ($("#txtPasswordChange").val()=="")
				{
					alert("Debes indicar un password");
					return;
				}
				parameters={funcion: "CambiarPassword", password: $("#txtPasswordChange").val()};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_usuario.php",
					data: parameters,
					success: function(data){
						usuario = JSON.parse(data);
						alert("Password modificado correctamente");
					 	$("#CambiarPasswordDialog" ).dialog( "close" );
					  	//$("#LoginDialog").dialog( "open" );	
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
	
		$("input").removeClass("oculta");							
		$("#OpcionesDialog" ).dialog("open");

		$("#btnRecargarSaldo" ).on("click",function(){
			$("#RecargarSaldoDialog" ).dialog( "open" );
		});

		$("#btnJugarPartida" ).on("click",function(){
			location.href="partida.php";
		});

		$("#btnCambiarPass" ).on("click",function(){
			$("#CambiarPasswordDialog" ).dialog( "open" );
		});	

		$("#btnLogout" ).on("click",function(){
			location.href="index.php";
		});	
		
		pintarSaldo();
	});	
	function pintarSaldo(){
		parameters={funcion: ""};
		$.ajax({
			type: 'POST',
			url: "../servicios/sw_usuario.php",
			data: parameters,
			success: function(data){
				usuario = JSON.parse(data);
				importe= new Intl.NumberFormat('es-ES').format(usuario.saldo) + " euros";
				$("#lblSaldo").html(importe);
				$("#lblBienvenida").text("Bienvenido/a " + usuario.usuario);
				if (usuario.saldo<usuario.saldoMinimo)
					$("#btnJugarPartida").attr("disabled",true);
				else
					$("#btnJugarPartida").attr("disabled",false);
			},			
			error: function (xhr, status, error) {
				alert("error:"+err.Message);	
			}
		});
	}
</script>
</body>
</html>
