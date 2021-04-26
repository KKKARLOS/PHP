@extends('layouts.public')

@section('titulo')
  Bienvenido/a
@endsection

@section('seleccionado2')
  active
@endsection

@section('css')
<!-- insert los css propios de la página -->
<style> 
.foto{ width:130px;height:212px }
</style>
@endsection

@section('content')
<!-- insert the page content here -->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Productos - Tienda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach ($phones as $phone)
                <div class="col-md-3 col-sm-6">
                    <div class="single-product mt-3">
                        <div class="product-f-image text-center" style="width: 210px;">
                            <img class="foto" src="{{$phone->urlfoto}}" alt="">
                            <div class="product-hover">                        
                                <a href="#" id="{{$phone->id}}" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>
                        
                        <h2>{{$phone->modelo}}</h2>
                        
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < $phone->valoracion; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br>           
                            <div class="article-comments"><a title="{{$phone->opinions()->sum('cantidad')}} comentarios">{{$phone->opinions()->sum('cantidad')}} comentarios</a>
                            </div>       
                        </div> 
                        </br></br>
                    </div>
                </div>                    
                @endforeach 

                <div class="col-md-3 col-sm-6">
                    <div class="single-product">

                        <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-2.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="1" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>

                        <h2>Nokia Lumia 1320</h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 9; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="35 comentarios" href="#comments" class="js-smooth-scroll">538 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">

                        <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-1.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="2" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>

                        <h2>Samsung Galaxy s5- 2015</h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 9; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="438 comentarios" href="#comments" class="js-smooth-scroll">438 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                         <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-3.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="3" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>
                        <h2><a href="">LG Leon 2015</a></h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 7; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="345 comentarios" href="#comments" class="js-smooth-scroll">345 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                         <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-4.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="4" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>
                        <h2><a href="">Sony microsoft</a></h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 8; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="125 comentarios" href="#comments" class="js-smooth-scroll">125 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>                
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">

                        <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-2.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="1" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>

                        <h2>Nokia Lumia 1320</h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 9; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="35 comentarios" href="#comments" class="js-smooth-scroll">538 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">

                        <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-1.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="2" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>

                        <h2>Samsung Galaxy s5- 2015</h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 9; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="438 comentarios" href="#comments" class="js-smooth-scroll">438 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                         <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-3.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="3" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>
                        <h2><a href="">LG Leon 2015</a></h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 7; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="345 comentarios" href="#comments" class="js-smooth-scroll">345 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                         <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-4.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="4" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>
                        <h2><a href="">Sony microsoft</a></h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 8; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="125 comentarios" href="#comments" class="js-smooth-scroll">125 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>   
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">

                        <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-2.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="1" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>

                        <h2>Nokia Lumia 1320</h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 9; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="35 comentarios" href="#comments" class="js-smooth-scroll">538 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">

                        <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-1.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="2" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>

                        <h2>Samsung Galaxy s5- 2015</h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 9; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="438 comentarios" href="#comments" class="js-smooth-scroll">438 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                         <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-3.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="3" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>
                        <h2><a href="">LG Leon 2015</a></h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 7; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="345 comentarios" href="#comments" class="js-smooth-scroll">345 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                         <div class="product-f-image" style="width:195px">
                            <img src="{{asset('img/product-4.jpg')}}" alt="">
                            <div class="product-hover" >                     
                                <a href="#" id="4" class="view-details-link open-modal"><i class="fa fa-link"></i>Ver comentarios</a>
                            </div>
                        </div>
                        <h2><a href="">Sony microsoft</a></h2>
                        <div class="product-carousel-price">
                            @for ($i = 0; $i < 8; $i++)
                                <i class="fas fa-star"></i>
                            @endfor  
                            </br></br> 
                            <div class="article-comments"><a title="125 comentarios" href="#comments" class="js-smooth-scroll">125 comentarios</a>
                            </div>    
                        </div> 
                        </br></br>                      
                    </div>
                </div>                   
 
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="modal fade" id="opinionModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="opinionModalLabel">Opiniones</h2>
                    </div>
                    <div class="modal-body">
                        <h4>Enlaces de opinión</h4>
                        <br>
                        <ul id="opinionesModelo">
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Salir
                        </button>
                        <input type="hidden" id="id" name="id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>    
<!-- End main content area -->   
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script>   
$(document).ready(function () {
    //para hacerla realmente modal
    $('#opinionModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    $('#opinionModal').modal('hide');
    //
    $('.open-modal').click(function(){
        ///----- Dar contenido a la modal y mostrar -----////
        var id = $(this).attr("id");
        $("#opinionesModelo li").remove();
        $.get('opinions/listar/' + id, function (data) {
            //opiniones = JSON.parse(data);
            
            $.each(data, function( key, value ) {
                var opinion= "<li><a href='"+value.url+"'>"+value.url+" ("+value.cantidad+") opiniones</a></li>";
                $("#opinionesModelo").append(opinion);
            }); 
        })
        $('#opinionModal').modal('show');        
    }); 
}); 
</script>           
@endsection

@section('js')
<!-- insert los js propios de la página -->
@endsection