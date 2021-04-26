@extends('layouts.privada')
<style>

    .card {
       border: 0px!important; 
       margin-bottom:10px;
    }
    h1{
        text-align:center;
    }
    img{
        cursor:pointer;
    }
</style>
@section('content')
<div class="container">
 

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estadísticas</div>
                <div class="card-body">
					<!-- gráficos -->
					<div id="piechart_3d" style="width: 900px; height: 500px;"></div>

				    <div id="divDatos" style="width:338px;height:380px;overflow-y:auto;">
				        <table id="tblDatos" width="320px">
				            <tbody>         
				            </tbody>        
				        </table>
				    </div>
					<!--Ventana de Mensajes-->
					<div id="ErrorDialog" class="oculta" title="Error">
					  <br/><br/>
					  <div id="divError"> 
					  </div>
					</div> 
                </div>
            </div>
        </div>
    </div>
	@if(Auth::user()->hasRole('admin'))
	    <div>Acceso como administrador</div>
	@else
	    <div>Acceso usuario</div>
	@endif
	@if(Auth::user()->hasRole('superadmin'))
	    <div>Acceso como superadministrador</div>
	@endif    
</div>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(function(){

        dialog = $( "#ErrorDialog" ).dialog({
          dialogClass: 'no-close',
          autoOpen: false,
          show: {
                effect: "slideDown",
                duration: 700
          },
          height: 340,
          width: 600,
          modal: true,
          buttons: {
            Continuar: function() {
              $("#ErrorDialog" ).dialog("close");
            }
          },
          close: function() {
            return false;
            //form[ 0 ].reset();
            //allFields.removeClass( "ui-state-error" );
          }
        });         
        pintarEstadisticas();       
    });

    function pintarEstadisticas(){
        var precio_chollo=0;
        var precio_correcto=0;
        var precio_alto=0;

        parameters={
            //funcion: "estadisticas"
        };
        $.ajax({
            type: 'GET',
            url: "anunciosEstadisticas",
            data: parameters,
            success: function(data){
                //anuncios = JSON.parse(data);
                //anuncios = data[0];
                anuncios = data;
                $("#tblDatos tbody").html("");

             	precio_chollo=anuncios.TOTAL_PRECIO_CHOLLO;
            	precio_correcto=anuncios.TOTAL_PRECIO_CORRECTO;
            	precio_alto=anuncios.TOTAL_PRECIO_ALTO;


                pintarFila("0","Total: "+anuncios.TOTAL_ANUNCIOS);
                pintarFila("V","Total precio chollo: "+anuncios.TOTAL_PRECIO_CHOLLO);
                pintarFila("A","Total precio correcto: "+anuncios.TOTAL_PRECIO_CORRECTO);
                pintarFila("R","Total precio alto: "+anuncios.TOTAL_PRECIO_ALTO); 

		        //Mostrar Estadísticas
		        estadisticas();       
            },        
            error: function(xhr, status, error) {
                responseText = JSON.parse(xhr.responseText);
                $("#divError").text(responseText.error);
                $("#ErrorDialog" ).dialog("open");
            }
        });
        function pintarFila(opcion,strCon){
            var fila="";
            fila+="<tr data-color='"+opcion+"'  style='cursor:pointer'>";
            fila+=" <td valign='center' style='text-align:left'>"+strCon+"</td>";
            fila+="</tr>"; 
            $("#tblDatos tbody").append(fila);  
        };  
        function estadisticas(){
	        //Mostrar Estadísticas
	        google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
		}   

	    function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['Task', 'Hours per Day'],
	          ['Precio chollo',      precio_chollo],
	          ['Precio correcto',  precio_correcto],
	          ['Precio alto', precio_alto]
	        ]);
        
        	var options = {
          		title: 'Estadísticas anuncios',
          		is3D: true,
        	};

        	var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        	chart.draw(data, options);
        };

    }
</script>    
@endsection
