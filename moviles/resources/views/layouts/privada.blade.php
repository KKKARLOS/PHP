<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />

    <title>Dashboard Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap-adm.min.css')}}" rel="stylesheet">
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
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Móviles.com <img src="{{asset('img/logoAdm.png')}}" alt=""> </a>
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
        <ul class="nav flex-column mt-3">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">
              <span data-feather="phone"></span>
              Móviles <span class="sr-only">(current)</span>
            </a>
          </li>
          @if(Auth::user()->hasRole('superadmin'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url('opinions') }}">
              <span data-feather="users"></span>
              Opiniones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('ranges') }}">
              <span data-feather="link"></span>
              Rangos
            </a>
          </li>
          @endif
          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                <span data-feather="log-out"></span>
                Logout                    
              </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!--<div>{{csrf_token()}}</div>-->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 mt-6 border-bottom">        
        @yield('content')
      </div>
    </main>
  </div>
</div>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
@yield('js')
</body>
</html>
