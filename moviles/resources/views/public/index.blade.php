@extends('layouts.public')

@section('titulo')
  Bienvenido/a
@endsection

@section('css')
<!-- insert los css propios de la página -->
<style> 
.foto{ width:130px;height:212px }
</style>
@endsection

@section('content')
    <!-- insert the page content here -->
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="{{asset('img/h4-slide.png')}}" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="{{asset('img/h4-slide2.png')}}" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								by one, get one <span class="primary">50% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">school supplies & backpacks.*</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="{{asset('img/h4-slide3.png')}}" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">Select Item</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="{{asset('img/h4-slide4.png')}}" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">& Phone</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> 
    <!-- End slider area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div id="moviles" class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Novedades</h2>
                        <div class="product-carousel">
                            @foreach ($phones as $phone)
                                <div class="single-product">
                                    <div class="product-f-image text-center" style="height: 270px;" >
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
                                </div>
                            @endforeach  

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('img/product-1.jpg')}}" alt="">
                                    <div class="product-hover">                        
                                        <a href="#" id="1" class="view-details-link"><i class="fa fa-link"></i>Ver comentarios</a>
                                    </div>
                                </div>
                                
                                <h2>Samsung Galaxy s5- 2015</h2>
                                
                                <div class="product-carousel-price">
                                    @for ($i = 0; $i < 6; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor  
                                    </br></br> 
                                    <div class="article-comments"><a title="35 comentarios" href="#comments" class="js-smooth-scroll">35 comentarios</a>
                                    </div>    
                                </div> 
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('img/product-2.jpg')}}" alt="">
                                    <div class="product-hover">    
                                        <a href="#" id="2" class="view-details-link"><i class="fa fa-link"></i> Ver comentarios</a>
                                    </div>
                                </div>
                                
                                <h2>Nokia Lumia 1320</h2>
                                
                                <div class="product-carousel-price">
                                    @for ($i = 0; $i < 6; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor  
                                    </br></br> 
                                    <div class="article-comments"><a title="372 comentarios" href="#comments" class="js-smooth-scroll">372 comentarios</a>
                                    </div>    
                                </div>                                  
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('img/product-3.jpg')}}" alt="">
                                    <div class="product-hover">
                                        <a href="#" id="3" class="view-details-link"><i class="fa fa-link"></i> Ver comentarios</a>
                                    </div>
                                </div>
                                
                                <h2>LG Leon 2015</h2>

                                <div class="product-carousel-price">
                                    @for ($i = 0; $i < 4; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor  
                                    </br></br> 
                                    <div class="article-comments"><a title="292 comentarios" href="#comments" class="js-smooth-scroll">292 comentarios</a>
                                    </div>    
                                </div>                                 
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('img/product-4.jpg')}}" alt="">
                                    <div class="product-hover">
                                        <a href="#" id="4" class="view-details-link"><i class="fa fa-link"></i> Ver comentarios</a>
                                    </div>
                                </div>
                                
                                <h2>Sony microsoft</h2>

                                <div class="product-carousel-price">
                                    @for ($i = 0; $i < 8; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor  
                                    </br></br> 
                                    <div class="article-comments"><a title="98 comentarios" href="#comments" class="js-smooth-scroll">98 comentarios</a>
                                    </div>    
                                </div>                         
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('img/product-5.jpg')}}" alt="">
                                    <div class="product-hover">
                                        <a href="#" id="5" class="view-details-link"><i class="fa fa-link"></i> Ver opiniones</a>
                                    </div>
                                </div>
                                
                                <h2>iPhone 6</h2>

                                <div class="product-carousel-price">
                                    @for ($i = 0; $i < 9; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor  
                                    </br></br> 
                                    <div class="article-comments"><a title="292 comentarios" href="#comments" class="js-smooth-scroll">292 comentarios</a>
                                    </div>    
                                </div>                                 
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('img/product-6.jpg')}}" alt="">
                                    <div class="product-hover">
                                        <a href="#" i="6" class="view-details-link"><i class="fa fa-link"></i> Ver comentarios</a>
                                    </div>
                                </div>
                                
                                <h2>Samsung gallaxy note 4</h2>

                                <div class="product-carousel-price">
                                    @for ($i = 0; $i < 8; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor  
                                    </br></br> 
                                    <div class="article-comments"><a title="310 comentarios" href="#comments" class="js-smooth-scroll">310 comentarios</a>
                                    </div>    
                                </div>                          
                            </div>
                        </div>
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
   
<!--Ventana de Mensajes-->

<div id="ErrorDialog" class="oculta" title="Error">
  <br/><br/>
  <div id="divError"> 
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