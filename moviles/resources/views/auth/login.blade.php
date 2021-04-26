<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

<!-- insert los css propios de la página -->
<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('css/sb-admin.css')}}">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email address" autofocus="autofocus" value="{{ old('email') }}">
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}
                    </strong>
                </span>
              @endif              
              <label for="email">E-Mail</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <label for="password">{{ __('Password') }}</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" {{ old('remember') ? 'checked' : '' }}>
                Remember Password
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">
            {{ __('Login') }}
          </button>          
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('register') }}" >Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ URL::asset('js/jquery.easing.min.js')}}"></script>

</body>

</html>