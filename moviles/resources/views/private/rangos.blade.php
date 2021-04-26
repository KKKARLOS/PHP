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
        <h2 class="card-title text-center">Mantenimiento de rangos
        </h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs open-modal"  style="width: 190px;margin-bottom :30px">Alta de un rango</button>
    </div>

    <div>
        <table class="table table-inverse table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th scope="col">Rango</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody id="ranges-list" name="ranges-list">
            @foreach ($ranges as $range)
                <tr id="{{$range->id}}">
                    <td scope="row">{{$range->id}}</td>
                    <td>{{$range->rango}}</td>
                    <td>
                        <button class="btn btn-info open-modal" value="{{$range->id}}">Edit
                        </button>
                        <button class="btn btn-danger delete-range" value="{{$range->id}}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-end">        
                {{ $ranges->links() }} 
            </ul>
        </nav>  
        <div class="modal fade" id="rangeEditorModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="rangeEditorModalLabel">Mantenimiento de rangos</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" role=
                        "form" name="modalFormData" class="form-horizontal" novalidate="">
                            <div class="row m-2">
                                <label for="modelo" class="col-2 control-label">Rango</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="rango" name="rango" style="width:350px"
                                    placeholder="Introduce el rango de opiniones
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
        $('#rangeEditorModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });    

    ////----- Abrir la modal para insertar un movil-----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#rangeEditorModal').modal('show');
    });
 
    ////----- Dar contenido a la modal y mostrar -----////
    $('tbody').on('click', '.open-modal', function () {
        var id = $(this).val();
        $.get('ranges/' + id, function (data) {
            $('#id').val(data.id);
            $('#rango').val(data.rango);

            $('#btn-save').val("update");
            $('#rangeEditorModal').modal('show');
        })
    });
 
    // AL GUARDAR BIEN POR INSERTAR O UPDATEAR
    $("#btn-save").click(function (e) {

        e.preventDefault();

        //if ($("#foto").val()=="") $("#foto").val("");
        var parameters={
            _token: $('input[name=_token]').val(),
            rango:  $("#rango").val(),              
        };        
        var state = $('#btn-save').val();
        var type = "POST";
        var id = $('#id').val();
        var ajaxurl = 'ranges';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'ranges/' + id;
        }
      
        $.ajax({
            type: type,
            url: ajaxurl,
            data: parameters,
            dataType: 'json',
            success: function (data) {
                var range = '<tr id="' + data.id + '"><td>' + data.id + '</td><td>' + data.rango;
                range += '</td><td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                range += '<button class="btn btn-danger delete-range" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    $('#ranges-list').append(range);
                } else {
                    $("#" + id).replaceWith(range);
                }
                $('#modalFormData').trigger("reset");
                $('#rangeEditorModal').modal('hide')
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
    $(document).on('click','.delete-range', function () {    
        valor=confirm("Seguro que deseas eliminar el registro?");
        if (!valor) return false;      
    ////----- BORRAR UNA range DE LA PAGINA-----////
    //$('.delete-range').click(function () {
        var id = $(this).val();
        //console.log($('input[name=_token]').val());
        $.ajax({
            type: "DELETE",
            url: 'ranges/'+ id,
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