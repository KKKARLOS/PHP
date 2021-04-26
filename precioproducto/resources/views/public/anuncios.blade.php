
@extends('layouts.public')
@section('titulo')
  Contacte con nosotros
@endsection
@section('seleccionado2')
  selected
@endsection
<style>
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
       <div class="col-md-12">
            <h1>ANUNCIOS</h1>
                <div class="dropdown" style="margin-top:30px">
                  <button id="category_id" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorías
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($categorias as $categoria)
                    <a class="dropdown-item" href="{{url('anuncios/listar')}}/{{$categoria->id}}" id="{{$categoria->id}}">{{$categoria->nombre}}</a>
                    @endforeach 
                  </div>
                </div> 
        
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Imagen</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach ($anuncios as $anuncio)
                    <tr>
                        <td scope="row">{{$anuncio->id}}</td>
                        <td>{{$anuncio->title}}</td>
                        <td><img width="40px" height="40px" src="{{$anuncio->foto}}" alt=""></td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table> 
                <nav>
                    <ul class="pagination justify-content-end">        
                        {{ $anuncios->links() }} 
                    </ul>
                </nav>            
            </div>  
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.js')}}"></script>
@endsection