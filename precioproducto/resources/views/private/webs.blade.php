@extends('layouts.privada')

@section('content')
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

    <div class="card card-block">
        <h2 class="card-title">Mantenimiento de Webs
        </h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs"  style="width: 166px;">Alta de una Web</button>
    </div>

    <div>
        <table class="table table-inverse table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>URL</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody id="webs-list" name="webs-list">
              </tbody>
        </table>

        <div class="modal fade" id="webEditorModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="webEditorModalLabel">Mantenimiento WEB</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"id="nombre" name="nombre"
                                    placeholder="Introduce el nombre de la web" 
                                    value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputweb" class="col-sm-2 control-label">Web</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"id="url" 
                                    name="url"
                                    placeholder="Introduce la URL" 
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
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script> 

$(document).ready(function () {

    ////----- Abrir la modal para insertar una web -----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#webEditorModal').modal('show');
    });
 
    ////----- Dar contenido a la modal y mostrar -----////
    $('tbody').on('click', '.open-modal', function () {
        var id = $(this).val();
        $.get('webs/' + id, function (data) {
            $('#id').val(data.id);
            $('#url').val(data.url);
            $('#nombre').val(data.nombre);
            $('#btn-save').val("update");
            $('#webEditorModal').modal('show');
        })
    });
 
    // AL GUARDAR BIEN POR INSERTAR O UPDATEAR
    $("#btn-save").click(function (e) {

        e.preventDefault();
        var parameters = {
            '_token': $('input[name=_token]').val(),
            'nombre': $('#nombre').val(),
            'url': $('#url').val(),
        };
        var state = $('#btn-save').val();
        var type = "POST";
        var id = $('#id').val();
        var ajaxurl = 'webs';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'webs/' + id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: parameters,
            dataType: 'json',
            success: function (data) {
                var web = '<tr id="' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>' + data.url + '</td>';
                web += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                web += '<button class="btn btn-danger delete-web" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add") {
                    $('#webs-list').append(web);
                } else {
                    $("#" + id).replaceWith(web);
                }
                $('#modalFormData').trigger("reset");
                $('#webEditorModal').modal('hide')
            },
            error: function (xhr, status, error) {
                responseText = JSON.parse(xhr.responseText);
                $("#divError").text(responseText.message);
                $("#ErrorDialog" ).dialog("open");
            } 
        });
    });
    // si no existe el objeto lo hacemos así
    $(document).on('click','.delete-web', function () {
    //$('.delete-web').click(function () { 
        valor=confirm("Seguro que deseas eliminar el registro?");
        if (!valor) return false; 
    ////----- BORRAR UNA WEB DE LA PAGINA-----////
    //$('.delete-web').click(function () {
        var id = $(this).val();

        $.ajax({
            type: "DELETE",
            url: 'webs/' + id,
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
    pintarWebs();
    dialog = $("#ErrorDialog" ).dialog({
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
function pintarWebs(){
  $.ajax({
    type: "GET",
    url: "websListar",
    dataType: 'json',  
    success: function(data){
      webs = JSON.parse(JSON.stringify(data));
      $("#webs-list").html("");
      var fila="";   
      $.each(webs, function( key, data ) {

        fila = '<tr id="' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>' + data.url + '</td>';
        fila += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
        fila += '<button class="btn btn-danger delete-web" value="' + data.id + '">Delete</button></td></tr>';
        $('#webs-list').append(fila);
      }); 
    },      
    error: function(xhr, status, error) {
      responseText = JSON.parse(xhr.responseText);
      $("#divError").text(responseText.message);
      $("#ErrorDialog" ).dialog("open");
    }
  });
}
</script>
@endsection
