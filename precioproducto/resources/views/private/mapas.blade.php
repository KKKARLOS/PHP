@extends('layouts.privada')
@section('content')
<style type="text/css">
        #mymap {
            border:1px solid red;
            width: 800px;
            height: 500px;
        }
</style>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>

<script src="http://maps.google.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

<div class="container">
  <h1>Mapas</h1>


  <div id="mymap"></div>    
    <script type="text/javascript">
    var locations = <?php print_r(json_encode($locations)) ?>;


    var mymap = new GMaps({
      el: '#mymap',
      lat: 43.314714,
      lng: -1.9724963000000002,
      zoom:3
    });

    $.each( locations, function( index, value ){
        mymap.addMarker({
          lat: value.latitud,
          lng: value.longitud,
          title: value.ciudad,
          click: function(e) {
            alert('Esto es '+value.ciudad+' ciudad de '+value.pais+'.');
          }
        });
   });

  </script>

@if(Auth::user()->hasRole('admin'))
    <div>Acceso como administrador</div>
@else
    <div>Acceso usuario</div>
@endif
@if(Auth::user()->hasRole('superadmin'))
    <div>Acceso como superadministrador</div>
@endif    
</div>

   
@endsection