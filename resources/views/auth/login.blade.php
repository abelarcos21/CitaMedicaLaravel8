@extends('layouts.form')

@section('title', 'Iniciar Sesion')

@section('content')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
            <!--Botones para hacer login
          <div class="card-header bg-transparent pb-5">
            <div class="text-muted text-center mt-2 mb-3"><small>Login</small></div>
            <div class="btn-wrapper text-center">
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon"><img src="{{ asset('img/icons/common/github.svg') }}"></span>
                <span class="btn-inner--text">Github</span>
              </a>
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon"><img src="{{ asset('img/icons/common/google.svg') }}"></span>
                <span class="btn-inner--text">Google</span>
              </a>
            </div>
          </div>-->
          <div class="card-body px-lg-5 py-lg-5">
            @if($errors->any())

                <div class="text-center text-muted mb-2">
                   <h4>Ocurrio el Siguiente Error!</h4> 
                </div>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text">{{ $errors->first() }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
            @else
                <div class="text-center text-muted mb-4">
                    <small>Ingresa tus credenciales para Ingresar al Sistema!</small> 
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" role="form">
                @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control" placeholder="Correo Electronico" type="email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input name="password" required autocomplete="current-password" class="form-control" placeholder="Contraseña" type="password">
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input name="remember" class="custom-control-input" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">
                  <span class="text-muted">Recordar Sesion</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Iniciar Sesion</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="{{ route('password.request') }}" class="text-light"><small>Olvidaste tu Contraseña?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light"><small>Crear Cuenta Nueva</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
