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
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro de la cuenta</div>
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="name" required autofocus>
                   <label for="name">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Apellido</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required>
                <label for="email">Email address</label>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>    
                <label for="password">Password</label>                
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif                             
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password_confirmation" class="form-control" placeholder="Confirm password" required="required" name="password_confirmation">
                  <label for="password_confirmation">Confirm Password</label>
                </div>
              </div>
            </div>
          </div>
        <button type="submit" class="btn btn-primary btn-block">
            {{ __('Register') }}
        </button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
          <a class="d-block small" href="#">Forgot Password?</a>
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