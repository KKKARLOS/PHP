@extends('layouts.public')

@section('titulo')
  Bienvenido/a
@endsection

@section('css')
<!-- insert los css propios de la página -->

@endsection

@section('content')
  <div class="containerLogin"       >
    <div class="card card-login mx-auto">
      <div class="card-header">{{ __('Login') }}</div>
      <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
         @csrf
          <div class="form-group">
            <div class="form-label-group">
               
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}"  placeholder="Email address" required autofocus>               
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}
                    </strong>
                </span>
               @endif
               <label for="email">{{ __('E-Mail Address') }}</label> 
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label for="password">{{ __('Password') }}</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox m-4">
              <label>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                {{ __('Remember Me') }}
              </label>
            </div>
          </div>
        
          <button type="submit" class="btn btn-primary btn-block">
            {{ __('Login') }}
         </button>          
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a>
          <a class="d-block small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>       
        </div>
      </div>
    </div>
  </div>
@endsection
