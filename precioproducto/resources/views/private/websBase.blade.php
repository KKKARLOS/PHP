@extends('layouts.privada')

@section('content')
<style>
    .oculta{display: none;}
    h1{
        text-align:center;
    }
    img{
        cursor:pointer;
    }    
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>WEBS</h1>
                <form method="post" action="{{url('webs')}}">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <input class="form-control" name="nombre" type="text" placeholder="Indica el nombre"/>
                        </div>
                        <div class="col-5">
                            <input class="form-control" name="url" type="text" placeholder="Indica la URL"/>
                        </div>
                        <div class="col-2"><input class="form-control" type="submit" value="Alta"></div>
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
                <table class="table mt-2">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Url</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach ($webs as $web)
                    <tr>
                        <td scope="row">{{$web->id}}</td>
                        <td>{{$web->nombre}}</td>
                        <td>{{$web->url}}</td>
                        <td><a href=""><img src="{{asset('images/edit.svg') }}" alt=""></a>&nbsp<a href="{{url('web_eliminar/'.$web->id)}}"><img src="{{asset('images/trash.svg') }}"></a></td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>               
    </div>
</div>

@endsection
