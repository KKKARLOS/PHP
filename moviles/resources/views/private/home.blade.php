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
        <h2 class="card-title text-center">Mantenimiento de móviles
        </h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs open-modal"  style="width: 190px;margin-bottom :30px">Alta de un móvil</button>
    </div>

    <div>
        <table class="table table-inverse table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th scope="col">Modelo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Valoración</th>
                <th scope="col">Rango</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody id="phones-list" name="phones-list">
            @foreach ($phones as $phone)
                <tr id="{{$phone->id}}">
                    <td scope="row">{{$phone->id}}</td>
                    <td>{{$phone->modelo}}</td>

                    <td><img width="40px" height="40px" src="{{$phone->urlfoto}}" alt=""></td>
                    <td>{{$phone->valoracion}}</td>

                    <td>{{$phone->range()->first()->rango}}</td>                  
                    <td>
                        <button class="btn btn-info open-modal" value="{{$phone->id}}">Edit
                        </button>
                        <button class="btn btn-danger delete-phone" value="{{$phone->id}}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-end">     
                {{ $phones->links() }} 
            </ul>
        </nav>  
        <div class="modal fade" id="phoneEditorModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="phoneEditorModalLabel">Mantenimiento de móviles</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" role=
                        "form" name="modalFormData" class="form-horizontal" novalidate="">
                            <div class="row m-4">
                                <label for="modelo" class="col-2 control-label">Modelo</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="modelo" name="modelo"
                                    placeholder="Introduce el modelo del móvil" 
                                    value="" style="width:350px">
                                </div>                               
                            </div>
                            <div class="row m-4">
                                <label for="url" class="col-2 control-label">URL</label>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="url" name="url"
                                    placeholder="Introduce la URL de la imagen" 
                                    value="" style="width:350px">
                                </div>
                              
                            </div>
                            <div class="row m-4">
                                <label for="valoracion" class="col-2 control-label">Valoración</label>
                                <div class="col-3">
                                    <input type="number" class="form-control" id="valoracion" name="valoracion"
                                    value="0" min=0 max=10>
                                </div>
                                <label for="url" class="col-2 control-label">Rango</label>
                                <div class="col-3">
                                    <select class="form-control" id="cboRango" style="width:175px">
                                    <option value="0">Elije un rango</option>
                                    @foreach ($ranges as $range)
                                    <option value="{{$range->id}}">{{$range->rango}}
                                    </option>
                                    @endforeach   
                                    </select> 
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
        $('#phoneEditorModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });    

    ////----- Abrir la modal para insertar un movil-----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#phoneEditorModal').modal('show');
    });
 
    ////----- Dar contenido a la modal y mostrar -----////
    $('tbody').on('click', '.open-modal', function () {
        var id = $(this).val();
        $.get('phones/' + id, function (data) {
            $('#id').val(data.id);
            $('#modelo').val(data.modelo);
            $("#url").val(data.urlfoto);
            $("#valoracion").val(data.valoracion);
            $("#cboRango").val(data.range_id);

            $('#btn-save').val("update");
            $('#phoneEditorModal').modal('show');
        })
    });
 
    // AL GUARDAR BIEN POR INSERTAR O UPDATEAR
    $("#btn-save").click(function (e) {

        e.preventDefault();

        if ($("#valoracion").val()<0){
            $("#valoracion").val("0");
            alert('La valoración no puede ser negativa');
            return;    
        };
        if ($("#valoracion").val()>10){
            $("#valoracion").val("0");
            alert('La valoración no puede ser mayor a 10    ');
            return;    
        };
        var parameters={
            _token: $('input[name=_token]').val(),
            modelo:  $("#modelo").val(),
            urlfoto:  $("#url").val(),
            range_id: $("#cboRango").val(),
            valoracion: $("#valoracion").val(),              
        };        
        var state = $('#btn-save').val();
        var type = "POST";
        var id = $('#id').val();
        var ajaxurl = 'phones';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'phones/' + id;
        }
      
        $.ajax({
            type: type,
            url: ajaxurl,
            data: parameters,
            dataType: 'json',
            success: function (data) {
                var phone = '<tr id="' + data.id + '"><td>' + data.id + '</td><td>' + data.modelo + '</td><td><img width="40px" height="40px" src="' + data.urlfoto+'">';
                phone += '</td><td>'+ data.valoracion ;
                phone += '</td><td>'+ $("#cboRango option:selected").text(); //+data
                phone += '</td><td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                phone += '<button class="btn btn-danger delete-phone" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    $('#phones-list').append(phone);
                } else {
                    $("#" + id).replaceWith(phone);
                }
                $('#modalFormData').trigger("reset");
                $('#phoneEditorModal').modal('hide')
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
    $(document).on('click','.delete-phone', function () {    
        valor=confirm("Seguro que deseas eliminar el registro?");
        if (!valor) return false;      
    ////----- BORRAR UNA phone DE LA PAGINA-----////
    //$('.delete-phone').click(function () {
        var id = $(this).val();
        //console.log($('input[name=_token]').val());
        $.ajax({
            type: "DELETE",
            url: 'phones/'+ id,
            //url: url+'ads/' + id,
            headers: {
             
              'X-CSRF-TOKEN': $('input[name=_token]').val()
             
            },          
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