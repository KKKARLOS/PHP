<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../../css/jquery-ui.css" rel="stylesheet">
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery-ui.js"></script>
<title>Documento sin título</title>
<style type="text/css">
	.oculta{display: none;}

	.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {text-align: center; 
		float: none !important; 
	}
	.ui-menu { width: 150px;  }

	table {border: 1px solid #ddd;border-collapse: collapse;margin-left: 15px;}

	td{border: 1px solid #ddd;text-align:left;padding-left:4px  }

	#tblCabecera th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  padding-left:4px;
	  text-align: left;
	  background-color: #6ea7d2;
	  color: white;
	  border: 1px solid #ddd;
	  height: 25px;
	}		

	#tblDatos tr:nth-child(odd){background-color:#ffffff;}
	#tblDatos tr:nth-child(even){background-color:#f2f2f2;}
	#tblDatos tr:hover {
		background-color:  #ddd; //mostrar el fondo gris del li activo
	}
    .messages{
        float: left;
        font-family: sans-serif;
        display: none;
    }
	
</style>
</head>
<body>
<!--Menú de opciones-->	
<ul id="menu">
  <li id="inicio"><div>Inicio</div></li>
  <li id="anuncios"><div>Anuncios</div></li>
  <li id="categorias"><div>Categorias</div></li>
  <li id="estadisticas"><div>Estadísticas</div></li>
</ul>

<div id="CatologoDialog" class=	"oculta" title="Categorías/Productos">
	<table id="tblCabecera" width="620px" style="margin-top:20px">
		<tr>
		<th width="225p	x">Nombre</th>
		<th width="296px" style='text-align:center'>Imagen</th>
		<th width="101px" style='text-align:center'>Anuncios</th>
		</tr>
	</table>
	<div id="divDatos" style="width:652px;height:506px;overflow-y:auto;">
		<table id="tblDatos" width="620px">		
			<tbody>				
			</tbody>
		</table>
	</div>
</div>
<div id="mensaje"></div>
<!--
-->
<script>
	$(function(){
		// Inicializar menu
		$( "#menu" ).menu();
		// Inicializar ventana de Catálogo de categorias

		dialog = $("#CatologoDialog" ).dialog({
		  autoOpen: false,
		  show: {
        		effect: "slideDown",
        		duration: 700
      	  },		  
		  height: 650,
		  width: 690,
		  modal: true,
		  close: function() {
		  }
		});	

		$("div").removeClass("oculta");							
		//$("#CatologoDialog" ).dialog("open");
		
		$("#categorias").on("click",function(){
			$("#CatologoDialog" ).dialog("open");
		});
		pintarCategorias();
	});	

	function pintarCategorias(){

		parameters={
				funcion: "catalogo"
		};
		$.ajax({
			type: 'POST',
			url: "../../servicios/sw_categoria.php",
			data: parameters,
			success: function(data){
				categorias = JSON.parse(data);
				$("#tblDatos tbody").html("");
			
				$.each(categorias, function( key, value ) {
					var fila="";
					fila+="<tr id='"+value.idcategoria+"'>";
					fila+="	<td width='224px' valign='center'>"+value.nombre+"</td>";	
					var foto=(value.foto=="")? "noproduct.png" : value.foto;
					fila+="	<td width='296px' style='text-align:center'><img src='../../images/Categories/"+foto+"' width='60px' height='60px'</td>";			

					fila+="	<td width='103px' style='text-align:center'><img style='cursor:pointer;margin-left:20px' onclick='anuncios("+value.idcategoria+")' src='../../iconos/search.png' width='20px' title='Anuncios'/>					</td>";
					fila+="</tr>"; 
					$("#tblDatos").append(fila);
				});	
			},			
			error: function(xhr, status, error) {
				responseText = JSON.parse(xhr.responseText);
				$("#divError").text(responseText.error);
	    		$("#ErrorDialog" ).dialog("open");
			}
		});
	}
	function anuncios(idCategoria){
		location.href="anuncios_view.php?idCategoria="+idCategoria;
	}	
</script>
</body>
</html>
