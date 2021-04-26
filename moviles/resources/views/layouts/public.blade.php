<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    @yield('css')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>  
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">              
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 

                <div class="col-8 navbar-collapse collapse float-right">
                    <ul class="nav navbar-nav">
                        <li class="@yield('seleccionado1')"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="@yield('seleccionado2')"><a href="{{url('listadoProductos')}}">Productos-Tienda</a></li>
                        <li class="@yield('seleccionado3')"><a href="{{url('contacto')}}">Contacto</a></li>
                        @if (Route::has('login'))
                            @auth
                            <li><a href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        @endif                      
                    </ul>
                    <div class="col-4 float-right">
                        <div class="logo">
                        <h1><a href="./"><img src="{{asset('img/logoEmpresa.png')}}"></a></h1>
                        </div>
                    </div>                     
                </div>  
            </div>
        </div>
    </div> 
    <!-- End mainmenu area -->
      
    <div id="site_content">
        <!-- insert the page content here -->
        @yield('content')
    </div> 

    <!-- End main content area -->   
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
   
    <!-- jQuery sticky menu -->
    <script src="{{ URL::asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.sticky.js')}}"></script>
    
    <!-- jQuery easing -->
    <script src="{{ URL::asset('js/jquery.easing.1.3.min.js')}}"></script>
 
     <!-- Bootstrap JS form CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
       
    <!-- Main Script -->
    <script src="{{ URL::asset('js/main.js')}}"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="{{ URL::asset('js/bxslider.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/script.slider.js')}}"></script>
    @yield('js')
  </body>
</html>