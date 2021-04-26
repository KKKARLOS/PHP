@extends('layouts.privada')
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
            <h1>CATEGORÍAS</h1>
                <form method="post" action="{{url('categorias')}}">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <label for="nombre"></label>
                        <input class="form-control" name="nombre" type="text" placeholder="Indica el nombre"/>
                    </div>
                    <div class="col-4">
                        <input class="form-control" type="submit" value="Alta">
                    </div>                    
                 </div>

              @isset($errors)
                <div class="text-center">
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6">
                      <ul>
                      @foreach($errors->all() as $error) 
                        <li>{{$error}}</li>
                      @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              @endisset

                </form>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td scope="row">{{$categoria->id}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td><a href=""><img src="{{asset('images/edit.svg') }}" alt=""></a>&nbsp<a href="{{route('categorias.eliminar',['id'=>$categoria->id])}}"><img src="{{asset('images/trash.svg') }}"></a></td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>               
            </div>  
    </div>
</div>
@endsection
