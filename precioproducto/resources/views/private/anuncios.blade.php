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
<div class="container-fluid">

    <div class="card card-block">
        <h2 class="card-title">Mantenimiento de Anuncios
        </h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs open-modal"  style="width: 190px;margin-bottom :30px">Alta de un Anuncio</button>
    </div>

    <div>
        <table class="table table-inverse table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Categoría</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody id="anuncios-list" name="anuncios-list">
            @foreach ($anuncios as $anuncio)
                <tr id="{{$anuncio->id}}">
                    <td scope="row">{{$anuncio->id}}</td>
                    <td>{{$anuncio->title}}</td>

                    <td><img width="40px" height="40px" src="{{$anuncio->foto}}" alt=""></td>
                    <td>{{$anuncio->category()->first()->nombre}}</td>                  
                    <td>
                        <button class="btn btn-info open-modal" value="{{$anuncio->id}}">Edit
                        </button>
                        <button class="btn btn-danger delete-anuncio" value="{{$anuncio->id}}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-end">        
                {{ $anuncios->links() }} 
            </ul>
        </nav>  
        <div class="modal fade" id="anuncioEditorModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="anuncioEditorModalLabel">Mantenimiento de ANUNCIOS</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" role=
                        "form" name="modalFormData" class="form-horizontal" novalidate="">
                            <div class="row m-2">
                                <label for="titulo" class="col-2 control-label">Título</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                    placeholder="Introduce el título del anuncio" 
                                    value="">
                                </div>
                                <label for="url" class="col-2 control-label">Categoría</label>
                                <div class="col-3">
                                    <select class="form-control" id="cboCategorias">
                                    <option value="0">Elije una categoría</option>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}
                                    </option>
                                    @endforeach   
                                    </select> 
                                </div>                                
                            </div>
                            <div class="row m-2">
                                <label for="url" class="col-2 control-label">URL</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="url" name="url"
                                    placeholder="Introduce la URL del anuncio" 
                                    value="">
                                </div>
                                <label for="url" class="col-2 control-label">Web</label>
                                <div class="col-3">
                                    <select class="form-control" id="cboWeb">
                                    <option value="0">Elije una web</option>
                                    @foreach ($webs as $web)
                                    <option value="{{$web->id}}">{{$web->nombre}}
                                    </option>
                                    @endforeach   
                                    </select> 
                                </div>                               
                            </div>
                            <div class="row m-2">
                                <label for="foto" class="col-2 control-label">Foto</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="foto" name="foto"
                                    placeholder="Introduce la foto del anuncio" 
                                    value="">
                                </div>
                                <label for="precioventa" class="col-2 control-label">Precio de Venta</label>
                                <div class="col-3">
                                    <input type="number" class="form-control" id="precioventa" name="precioventa"
                                    placeholder="Introduce el precio venta" 
                                    value="">
                                </div>                                
                            </div>  
                                                              
                            <div class="row m-2">
                                <label for="preciocorrecto" class="col-2 control-label">Precio Correcto</label>
                                <div class="col-5">
                                    <input type="number" class="form-control" id="precioalto" name="precioalto"
                                    placeholder="Introduce el precio correcto del anuncio" 
                                    value="">
                                </div>
                                <label for="preciochollo" class="col-2 control-label">Precio Chollo</label>
                                <div class="col-3">
                                    <input type="number" class="form-control" id="preciochollo" name="preciochollo"
                                    placeholder="Introduce el precio chollo del anuncio" 
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
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>

<script> 

$(document).ready(function () {

    $('.open-modal').click(function(){
        $('#anuncioEditorModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });    

    ////----- Abrir la modal para insertar una anuncio -----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#anuncioEditorModal').modal('show');
    });
 
    ////----- Dar contenido a la modal y mostrar -----////
    $('tbody').on('click', '.open-modal', function () {
        var id = $(this).val();
        $.get('anuncios/' + id, function (data) {
            $('#id').val(data.id);
            $('#titulo').val(data.title);
            $("#url").val(data.url);
            $("#foto").val(data.foto);
            $("#cboWeb").val(data.web_id);
            $("#cboCategorias").val(data.category_id);
            $("#precioventa").val(data.precio_vta);
            $("#preciochollo").val(data.precio_chollo);
            $("#precioalto").val(data.precio_alto);

            $('#btn-save').val("update");
            $('#anuncioEditorModal').modal('show');
        })
    });
 
    // AL GUARDAR BIEN POR INSERTAR O UPDATEAR
    $("#btn-save").click(function (e) {

        e.preventDefault();

        //if ($("#foto").val()=="") $("#foto").val("");
        var parameters={
            _token: $('input[name=_token]').val(),
            title:  $("#titulo").val(),
            url:  $("#url").val(),
            foto:  $("#foto").val(),
            web_id: $("#cboWeb").val(),
            precio_vta: $("#precioventa").val(),                 
            precio_chollo:$("#preciochollo").val(),
            precio_alto:$("#precioalto").val(),
            category_id:$("#cboCategorias").val()
        };        
        var state = $('#btn-save').val();
        var type = "POST";
        var id = $('#id').val();
        var ajaxurl = 'anuncios';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'anuncios/' + id;
        }
      
        $.ajax({
            type: type,
            url: ajaxurl,
            data: parameters,
            dataType: 'json',
            success: function (data) {
                var anuncio = '<tr id="' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td><img width="40px" height="40px" src="' + data.foto+'">';
                anuncio += '</td><td>'+ $("#cboCategorias option:selected").text(); //+data
                anuncio += '</td><td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                anuncio += '<button class="btn btn-danger delete-anuncio" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    $('#anuncios-list').append(anuncio);
                } else {
                    $("#" + id).replaceWith(anuncio);
                }
                $('#modalFormData').trigger("reset");
                $('#anuncioEditorModal').modal('hide')
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
    $(document).on('click','.delete-anuncio', function () {    
        valor=confirm("Seguro que deseas eliminar el registro?");
        if (!valor) return false;      
    ////----- BORRAR UNA anuncio DE LA PAGINA-----////
    //$('.delete-anuncio').click(function () {
        var id = $(this).val();
        //console.log($('input[name=_token]').val());
        $.ajax({
            type: "DELETE",
            url: 'anuncios/'+ id,
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
