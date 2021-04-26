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
    .messages{
        float: left;
        font-family: sans-serif;
        display: none;
    }
    .info{
        padding: 10px;
        border-radius: 10px;
        background: orange;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }
    .before{
        padding: 10px;
        border-radius: 10px;
        background: blue;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }
    .success{
        padding: 10px;
        border-radius: 10px;
        background: green;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }
    .error{
        padding: 10px;
        border-radius: 10px;
        background: red;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }     
</style>
@section('content')
<div class="container">

    <div class="card card-block">
        <h2 class="card-title">Mantenimiento de Categorías
        </h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs open-modal"  style="width: 190px;margin-bottom :30px">Alta de una Categoría</button>
    </div>

    <div>
        <table class="table table-inverse table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody id="categorias-list" name="categorias-list">
            @foreach ($categorias as $categoria)
                <tr id="{{$categoria->id}}">
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->nombre}}</td>
                    <td>
                        <button class="btn btn-info open-modal" value="{{$categoria->id}}">Edit
                        </button>
                        <button class="btn btn-danger delete-categoria" value="{{$categoria->id}}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="categoriaEditorModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="categoriaEditorModalLabel">Mantenimiento de Categorías</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('categoria/foto') }}" enctype="multipart/form-data" name="fotoForm" id="fotoForm" class="form-horizontal" novalidate="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Introduce el nombre de la categoria" 
                                    value="">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 ml-3">Imagen</label>
                                <img class="col-sm-4" id="fotoImagen" width="100" height="100" src="{{asset('images/noproduct.png')  }}" alt="">
                            </div>                        
                            <div style="visibility:hidden">
                            <input type="file" id="fotoInput" name="fotoInput" accept = 'image/jpeg , image/jpg, image/gif, image/png' >
                            </div>
                         </form>
                        <!--div para visualizar mensajes-->
                        <div class="messages" style="width:500px;text-align:center"></div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Grabar
                        </button>

                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar
                        </button>
                        <input type="hidden" id="id" name="id" value="0">
                    </div>

                    <button type="button" class="btn btn-primary" id="btnSubir">Subir imagen</button>
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
var url="{{asset('image')}}";
$(document).ready(function () {
    // subir foto

    var fotoImagen, fotoInput, fotoForm;

    fotoImagen = $('#fotoImagen');
    fotoInput = $('#fotoInput');
    fotoForm = $('#fotoForm');

    fotoImagen.on('click', function () {
        fotoInput.click();
    });

    $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
    //función que observa los cambios del campo file y obtiene información
    $('#fotoInput').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#fotoInput")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
    });
    //subir la imagen después de grabar
    $('#btnSubir').click(function(){
        $( "#fotoForm").submit();
    });    
    $('#fotoForm').on('submit', function(event){
        /*
        $.ajaxSetup({
         
        headers: {
         
          'X-CSRF-TOKEN': $('input[name=_token]').val()
         
        }
         
        });
        */

        event.preventDefault();
        //información del formulario

        var formData = new FormData(this);
        //  formData.append('_token', $('input[name=_token]').val());
        var message = ""; 
        //hacemos la petición ajax  
        $.ajax({
            url:"{{ route('categorias.upLoadFoto') }}",
            method: 'POST',
            // Form data
            //datos del formulario
            //data: new FormData(this),
            data: formData,
            headers: {
            'X-CSRF-Token': $('input[name=_token]').val()
            },
            //necesario para subir archivos via ajax
            cache: false,
            dataType:'JSON',
            async:false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)        
            },
            //una vez finalizado correctamente
            success: function(data){
                message = $("<span class='success'>La imagen se ha subido correctamente. Grabación correcta.</span>");
                showMessage(message);
                if(isImage(fileExtension))
                {
                    data.foto=url+""+data.foto;
                    $("#fotoImagen").attr('src', data.foto);
                }
            },
            //si ha ocurrido un error
            error: function (xhr, status, error) {
                message = $("<span class='error'>Ha ocurrido un error.</span>");
                showMessage(message);
            }
        });
    });
    function showMessage(message){
        $(".messages").html("").show();
        $(".messages").html(message);
    }

    //comprobamos si el archivo a subir es una imagen
    //para visualizarla una vez haya subido
    function isImage(extension)
    {
        switch(extension.toLowerCase()) 
        {
            case 'jpg': case 'gif': case 'png': case 'jpeg':
                return true;
            break;
            default:
                return false;
            break;
        }
    }   
 
    $('.open-modal').click(function(){
        $('#categoriaEditorModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });    

    ////----- Abrir la modal para insertar una categoria -----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#fotoForm').trigger("reset");
        $('#categoriaEditorModal').modal('show');
    });
 
    ////----- Dar contenido a la modal y mostrar -----////
    $('tbody').on('click', '.open-modal', function () {
        var id = $(this).val();
        $.get('categorias/' + id, function (data) {
            $('#id').val(data.id);
            $('#nombre').val(data.nombre);
            $('#btn-save').val("update");
            $('#categoriaEditorModal').modal('show');
        })
    });
 
    // AL GUARDAR BIEN POR INSERTAR O UPDATEAR
    $("#btn-save").click(function (e) {

        e.preventDefault();
        if ($("#nombre").val()=="")
        {
            alert("Debes indicar el nombre de la categoría");
            return false;
        }     
        // subimos en paralelo la imagen en caso de haber seleccionado alguna

/*
        if ($("#fotoInput").val()!="")
            $("#btnSubir").click();  
*/
        var parameters = {
            '_token': $('input[name=_token]').val(),
            'nombre': $('#nombre').val(),
            'imagen': $('input[type=file]').val().replace(/.*(\/|\\)/, '')
        };
        var state = $('#btn-save').val();
        var type = "POST";
        var id = $('#id').val();
        var ajaxurl = 'categorias';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'categorias/' + id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: parameters,
            dataType: 'json',
            success: function (data) {
                var categoria = '<tr id="' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td>';
                categoria += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                categoria += '<button class="btn btn-danger delete-categoria" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    $('#categorias-list').append(categoria);
                } else {
                    $("#" + id).replaceWith(categoria);
                }
                $('#fotoForm').trigger("reset");
                $('#categoriaEditorModal').modal('hide');
                subirImagen(data.id,data.nombre);
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
    $(document).on('click','.delete-categoria', function () {    
        valor=confirm("Seguro que deseas eliminar el registro?");
        if (!valor) return false;      
        ////----- BORRAR UNA categoria DE LA PAGINA-----////
        //$('.delete-categoria').click(function () {
        var id = $(this).val();

        $.ajax({
            type: "DELETE",
            url: 'categorias/' + id,
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
