@extends('layouts.app')

@section('content')
<div class="login-top-cont">
</div>
<div class="login-bottom-cont">
    <!-- Container -->
    <div class="container-fluid">
        <div class="login-modal">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <img src="{{ asset('img/artwork/login.png') }}" class="login-logo">
                </div>
                <div class="row justify-content-center px-5">
                    <div class="col-12 col-lg-3">
                        <div class="card login-card">
                            <div class="card-body px-4 zindex-modal">
                                <form method="POST" action="{{ url('login') }}">
                                    @csrf
                                    <h1 class="h4 text-center py-4">Iniciar sesión</h1>
                                    <div class="form-group row px-4">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row px-4">
                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row px-4">
                                        <div class="col-md-12">
                                            <div class="form-check custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember">Recordarme</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4 mb-0 px-4">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Entrar
                                            </button>
                                        </div>
                                        <div class="col-md-12 text-center mt-5">
                                            @if (1>2)<!-- (Route::has('password.request')) -->
                                                <a href="{{ url('password.request') }}">
                                                    ¿Olvidaste la contraseña?
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection