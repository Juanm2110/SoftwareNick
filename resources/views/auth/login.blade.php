@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Inicia sesión para continuar')

@section('auth_body')
    <form action="{{ route('login') }}" method="post">
        @csrf

        {{-- Input de email --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        {{-- Input de contraseña --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        {{-- Botón para iniciar sesión --}}
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
        </div>
    </form>
@endsection

@section('auth_footer')
    <p class="my-0">
        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
    </p>
    <p class="my-0">
        <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
    </p>
@endsection

@section('css')
    <style>
        body {
            background: url('/images/login.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
    </style>
@stop
