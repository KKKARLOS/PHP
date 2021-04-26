@extends('layouts.privada')

@section('titulo')
  Bienvenido/a
@endsection

@section('css')
<!-- insert los css propios de la página -->
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
@endsection

@section('content')
<script src="{{asset('js/jquery-adm.js')}}"></script>
<script src="{{asset('js/jquery-ui-adm.js')}}"></script>

<div class="container-fluid">

    <div class="card card-block border-0">
        <h2 class="card-title text-center">Mantenimiento de opiniones
        </h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs open-modal"  style="width: 190px;margin-bottom :30px">Alta de una opinión</button>
    </div>

    <div>
        <table class="table table-inverse table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Modelo</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody id="opinions-list" name="opinions-list">
            @foreach ($opinions as $opinion)
                <tr id="{{$opinion->id}}">
                    <td scope="row">{{$opinion->id}}</td>
                    <td>{{$opinion->nombre}}</td>

                    <td>{{$opinion->url}}</td>
                    <td>{{$opinion->cantidad}}</td>

                    <td>{{$opinion->phone()->first()->modelo}}</td>                  
                    <td>
                        <button class="btn btn-info open-modal" value="{{$opinion->id}}">Edit
                        </button>
                        <button class="btn btn-danger delete-opinion" value="{{$opinion->id}}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-end">        
                {{ $opinions->links() }} 
            </ul>
        </nav>  
        <div class="modal fade" id="opinionEditorModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="opinionEditorModalLabel">Mantenimiento de opiniones</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" role=
                        "form" name="modalFormData" class="form-horizontal" novalidate="">
                            <div class="row m-2">
                                <label for="url" class="col-2 control-label">Móvil</label>
                                <div class="col-3">
                                    <select class="form-control" id="cboPhone" style="width:350px">
                                    <option value="0">Elije un móvil</option>
                                    @foreach ($phones as $phone)
                                    <option value="{{$phone->id}}">{{$phone->modelo}}
                                    </option>
                                    @endforeach   
                                    </select> 
                                </div>                               
                            </div>
                            <div class="row m-2">
                                <label for="modelo" class="col-2 control-label">Portal</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="nombre" name="nombre" style="width:350px"
                                    placeholder="Introduce la descripción de la opinión" 
                                    value="">
                                </div>
                            </div>
                            <div class="row m-2">
                                <label for="url" class="col-2 control-label">URL</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="url" name="url" style="width:350px"
                                    placeholder="Introduce la URL del portal" 
                                    value="">
                                </div>
                              
                            </div>
                            <div class="row m-2">
                                <label for="valoracion" class="col-2 control-label">Cantidad</label>
                                <div class="col-3">
                                    <input type="number" class="form-control" id="cantidad" name="cantidad"
                                    placeholder="Introduce la valoracion" 
                                    value="">
                                </div>                               
                            </div>            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Grabar
                        </button>

                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar
                        </button>
                        <input type="hidden" id="id" name="id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!--Ventana de Mensajes-->

    <div id="ErrorDialog" class="oculta" title="Error">
      <br/><br/>
      <div id="divError"> 
      </div>
    </div> 

</div>
<!--
@if(Auth::user()->hasRole('admin'))
    <div>Acceso como administrador</div>
@else
    <div>Acceso usuario</div>
@endif
@if(Auth::user()->hasRole('superadmin'))
    <div>Acceso como superadministrador</div>
@endif  

-->
<script> 

$(document).ready(function () {

    $('.open-modal').click(function(){
        $('#opinionEditorModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });    

    ////----- Abrir la modal para insertar un movil-----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#opinionEditorModal').modal('show');
    });
 
    ////----- Dar contenido a la modal y mostrar -----////
    $('tbody').on('click', '.open-modal', function () {
        var id = $(this).val();
        $.get('opinions/' + id, function (data) {
            $('#id').val(data.id);
            $('#nombre').val(data.nombre);
            $("#url").val(data.url);
            $("#cantidad").val(data.cantidad);
            $("#cboPhone").val(data.phone_id);

            $('#btn-save').val("update");
            $('#opinionEditorModal').modal('show');
        })
    });
 
    // AL GUARDAR BIEN POR INSERTAR O UPDATEAR
    $("#btn-save").click(function (e) {

        e.preventDefault();

        //if ($("#foto").val()=="") $("#foto").val("");
        var parameters={
            _token: $('input[name=_token]').val(),
            nombre:  $("#nombre").val(),
            url:  $("#url").val(),
            phone_id: $("#cboPhone").val(),
            cantidad: $("#cantidad").val(),              
        };        
        var state = $('#btn-save').val();
        var type = "POST";
        var id = $('#id').val();
        var ajaxurl = 'opinions';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'opinions/' + id;
        }
      
        $.ajax({
            type: type,
            url: ajaxurl,
            data: parameters,
            dataType: 'json',
            success: function (data) {
                var opinion = '<tr id="' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>'+data.url;
                opinion += '</td><td>'+ data.cantidad ;
                opinion += '</td><td>'+ $("#cboPhone option:selected").text(); //+data
                opinion += '</td><td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                opinion += '<button class="btn btn-danger delete-opinion" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    $('#opinions-list').append(opinion);
                } else {
                    $("#" + id).replaceWith(opinion);
                }
                $('#modalFormData').trigger("reset");
                $('#opinionEditorModal').modal('hide')
            },
            error: function (xhr, status, error) {
                responseText = JSON.parse(xhr.responseText);
                $("#divError").text(responseText.message);
                $("#ErrorDialog" ).dialog("open");
            }            
            /*error: function (data) {
                console.log('Error:', data);
            }*/
        });
    });
    // si no existe el objeto lo hacemos así
    $(document).on('click','.delete-opinion', function () {    
        valor=confirm("Seguro que deseas eliminar el registro?");
        if (!valor) return false;      
    ////----- BORRAR UNA opinion DE LA PAGINA-----////
    //$('.delete-opinion').click(function () {
        var id = $(this).val();
        //console.log($('input[name=_token]').val());
        $.ajax({
            type: "DELETE",
            url: 'opinions/'+ id,
            //url: url+'ads/' + id,
            data: {
                   '_token': $('input[name=_token]').val(),
                },
            success: function (data) {
                console.log(data);
                $("#" + id).remove();
            },
            error: function (xhr, status, error) {
                responseText = JSON.parse(xhr.responseText);
                $("#divError").text(responseText.message);
                $("#ErrorDialog" ).dialog("open");
            } 
        });
    });

    dialog = $( "#ErrorDialog" ).dialog({
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
  
});
</script>  
  

@endsection
@section('js')
<!-- insert los js propios de la página -->

@endsection