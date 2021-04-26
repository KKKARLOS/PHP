<!DOCTYPE HTML>
<html>

<head>
  <title>@yield('titulo')</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="{{ url('/') }}">textured_<span class="logo_colour">orbs</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="@yield('seleccionado1')"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="@yield('seleccionado2')"><a href="{{ url('anuncios/listar') }}">Productos</a></li>
          <li class="@yield('seleccionado3')"><a href="{{ url('/contacto') }}">Contacto</a></li>
          <li>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif            
          </li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="">
        <!-- insert the page content here -->
        @yield('content')
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="{{ url('/') }}">Inicio</a> | <a href="{{ url('anuncios/listar') }}">Producto</a> | <a href="{{ url('/contacto') }}">Contacto</a></p>
      <p>Copyright &copy; textured_orbs | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Website templates</a></p>
    </div>
  </div>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.js')}}"></script>
</body>
</html>