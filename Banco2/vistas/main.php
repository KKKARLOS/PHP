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
<body background="../images/banco.jpg">

<!--Ventana de Opciones-->

<div id="OpcionesDialog" class="oculta" title="Opciones disponibles">
  <h3><label id="lblBienvenida"></label></h3>
  <div style="float: right "><label style="margin-right:10px">Saldo:</label><label id="lblSaldo" style="margin-right:2px;width: 150px;border-color:#FFB100;
border-width:1px;
border-style:solid;
background:#F5F5F5;"></label></div>
  </br></br></br>
  <form style="text-align:center">
      <input type="button" style="width:200px" id="btnMeterDinero" value="Meter dinero" /></br></br>
      <input type="button" style="width:200px" id="btnSacarDinero" value="Sacar dinero" /></br></br>
      <input type="button" style="width:200px" id="btnTransferencia" value="Transferencias" /></br></br>
      <input type="button" style="width:200px" id="btnCambiarPin" value="Cambiar PIN" /></br></br>
      <input type="button" style="width:200px" id="btnLogout" value="Salir" ></br></br>      
  </form>
</div>

<!--Ventana meter dinero a la cuenta-->

<div id="MeterDineroDialog" class="oculta" title="Meter dinero a la cuenta">
  <form style="text-align:center">
  	  </br></br>
      <label for="name">Importe</label></br></br>
      <input type="number" id="txtAumentarImporte" value="" class="text ui-widget-content ui-corner-all"/></br></br>
  </form>
</div>

<!--Ventana sacar dinero a la cuenta-->

<div id="SacarDineroDialog" class="oculta" title="Sacar dinero de la cuenta">
  <form style="text-align:center">
  	  </br></br>
      <label for="name">Importe</label></br></br>
      <select id="txtQuitarImporte">
		<option value="10" selected>10 euros</option>
		<option value="20">20 euros</option>
		<option value="50">50 euros</option>
		<option value="100">100 euros</option>
      </select>
      </br></br>
  </form>
</div>

<!--Ventana realizar transferncia desde la cuenta-->

<div id="TransferenciaDialog" class="oculta" title="Sacar dinero de la cuenta">
  <form style="text-align:center">
  	  </br>
      <label for="name">Importe</label></br>
      <input type="number" id="txtImporte" value="" class="text ui-widget-content ui-corner-all"/></br></br>
      <label for="name">Cuenta Corriente</label></br>
      <input type="text" id="txtCta" value="" class="text ui-widget-content ui-corner-all"/>      
  </form>
</div>

<!--Ventana de Cambiar PIN-->

<div id="CambiarPinDialog" class="oculta" title="PIN">
  <form style="text-align:center">
      <label for="pin">New PIN</label></br></br>
      <input type="text" id="txtPinChange" value="" class="text ui-widget-content ui-corner-all"/>
  </form>
</div>
<script>
	$(function(){
		var idcuenta = <?php echo $_GET["idcuenta"];?>;

		// Inicializar ventana de opciones 	
		dialog = $( "#OpcionesDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },
		  height: 430,
		  width: 400,
		  modal: true,
		});
			
		// Inicializar Ventana meter dinero a la cuenta-->

		dialog = $( "#MeterDineroDialog" ).dialog({
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
				$("#MeterDineroDialog" ).dialog( "close" );
				parameters={
					funcion: "Insertar", 
					idcuenta: idcuenta,
					importe: $("#txtAumentarImporte").val(),
					denominacion: 'Ingreso en efectivo'
				};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_movimiento.php",
					data: parameters,
					success: function(data){
						movimiento = JSON.parse(data);
						pintarSaldo(movimiento.idcuenta);
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});			  
				$("#lblBienvenida").text("Bienvenido/a " + cuenta.nombre);
				$("#BienvenidaDialog").dialog( "open" );
			},
			Cancelar: function() {
			  $("#MeterDineroDialog" ).dialog( "close" );
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});

		// Inicializar Ventana meter dinero a la cuenta-->

		dialog = $( "#SacarDineroDialog" ).dialog({
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
				$("#SacarDineroDialog" ).dialog( "close" );
				parameters={
					funcion: "Insertar", 
					idcuenta: idcuenta,
					importe: -($("#txtQuitarImporte").val()),
					denominacion: 'Retirada en efectivo'
				};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_movimiento.php",
					data: parameters,
					success: function(data){
						movimiento = JSON.parse(data);
						pintarSaldo(movimiento.idcuenta);
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});			  
				$("#lblBienvenida").text("Bienvenido/a " + cuenta.nombre);
				$("#BienvenidaDialog").dialog( "open" );
			},
			Cancelar: function() {
			  $("#SacarDineroDialog" ).dialog( "close" );
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});

		// Inicializar Ventana realizar transferencia dinero a la cuenta-->

		dialog = $( "#TransferenciaDialog" ).dialog({
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
				$("#TransferenciaDialog" ).dialog( "close" );
				parameters={
					funcion: "Insertar",
					idcuenta: idcuenta, 
					importe: -($("#txtImporte").val()),
					denominacion: 'Transferencia a la cuenta '+$("txtCta").val()
				};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_movimiento.php",
					data: parameters,
					success: function(data){
						movimiento = JSON.parse(data);
						pintarSaldo(movimiento.idcuenta);
					},			
					error: function (xhr, status, error) {
						alert("error:"+err.Message);
					}
				});			  
				$("#lblBienvenida").text("Bienvenido/a " + cuenta.nombre);
				$("#BienvenidaDialog").dialog( "open" );
			},
			Cancelar: function() {
			  $("#SacarDineroDialog" ).dialog( "close" );
			}
		  },
		  close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		  }
		});

		dialog = $( "#CambiarPinDialog" ).dialog({
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
				if ($("#txtPinChange").val()=="")
				{
					alert("Debes indicar un PIN");
					return;
				}
				parameters={funcion: "CambiarPin", pin: $("#txtPinChange").val()};				
				$.ajax({
					type: "POST",
					url: "../servicios/sw_cuenta.php",
					data: parameters,
					success: function(data){
						usuario = JSON.parse(data);
						alert("PIN modificado correctamente");
					 	$("#CambiarPinDialog" ).dialog( "close" );
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

		$("#btnMeterDinero" ).on("click",function(){
			$("#MeterDineroDialog" ).dialog( "open" );
		});

		$("#btnSacarDinero" ).on("click",function(){
			$("#SacarDineroDialog" ).dialog( "open" );
		});

		$("#btnTransferencia" ).on("click",function(){
			$("#TransferenciaDialog" ).dialog( "open" );
		});

		$("#btnCambiarPin" ).on("click",function(){
			$("#CambiarPinDialog" ).dialog( "open" );
		});	
			
		$("#btnLogout" ).on("click",function(){
			location.href="index.php";
		});	
		
		pintarSaldo(idcuenta);
	});	
	function pintarSaldo(idcuenta){
		parameters={
				funcion: "ObtenerDatosCuenta",
				idcuenta: idcuenta
		};
		$.ajax({
			type: 'POST',
			url: "../servicios/sw_cuenta.php",
			data: parameters,
			success: function(data){
				cuenta = JSON.parse(data);
				importe= new Intl.NumberFormat('es-ES').format(cuenta.saldo) + " euros";
				$("#lblSaldo").html(importe);
				$("#lblBienvenida").text("Bienvenido/a " + cuenta.nombre);
			},			
			error: function (xhr, status, error) {
				alert("error:"+err.Message);	
			}
		});
	}
</script>
</body>
</html>
