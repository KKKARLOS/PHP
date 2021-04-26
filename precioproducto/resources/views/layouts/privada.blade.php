<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />

    <title>Dashboard Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    <style>
      .no-close .ui-dialog-titlebar-close {display: none }    
      .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {text-align: center; 
        float: none !important; 
      }   
     
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;"
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">     
      @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
      @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
      @endguest   
    </ul> 
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">    
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">
              <span data-feather="home"></span>
              Estadísticas <span class="sr-only">(current)</span>
            </a>
          </li>
          @if(Auth::user()->hasRole('superadmin'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url('categorias') }}">
              <span data-feather="file"></span>
              Categorías
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('webs') }}">
              <span data-feather="shopping-cart"></span>
              Webs
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('anuncios.index') }}">
              <span data-feather="users"></span>
              Anuncios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/gmaps') }}">
              <span data-feather="bar-chart-2"></span>
              Mapas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div>{{csrf_token()}}</div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        
        @yield('content')
      </div>
    </main>
  </div>
</div>
<script src="js/feather.min.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
