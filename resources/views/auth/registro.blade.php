@extends('layouts.app')

@section('content')
<div class="container form-container mb-3">
    <form action="{{ route('registro') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex-container">
        <h1>Alta de usuario</h1>
        <p>Complete con sus datos para crear un usuario</p>
        <hr>
        <div class="form-group">
            <label for="nombre"><b>Nombre</b></label>
            @if($errors->has('nombre'))
                <input class="form-control is-invalid" type="text" placeholder="Ingrese su nombre" name="nombre" required>
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </div>
            @else
                <input class="form-control" type="text" placeholder="Ingrese su nombre" name="nombre" value="{{ old('nombre') }}" required>
            @endif
        </div>

        <div class="form-group">
            <label for="apellido"><b>Apellido</b></label>
            @if($errors->has('apellido'))
                <input class="form-control is-invalid" type="text" placeholder="Ingrese su apellido" name="apellido" required>
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </div>
            @else
                <input class="form-control" type="text" placeholder="Ingrese su apellido" name="apellido" value="{{ old('apellido') }}" required>
            @endif
        </div>

        <div class="form-group">
            <label for="email"><b>Email</b></label>
            @if($errors->has('email'))
                <input class="form-control is-invalid" type="text" placeholder="Ingrese su email" name="email" required>
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @else
                <input class="form-control" type="text" placeholder="Ingrese su email" name="email" value="{{ old('email') }}" required>
            @endif
        </div>

        <div class="form-group">
            <label for="password"><b>Password</b></label>
            @if($errors->has('password'))
                <input class="form-control is-invalid" type="password" placeholder="Ingrese su password" name="password" required>
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @else
                <input class="form-control" type="password" placeholder="Ingrese su password" name="password" value="" required>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation"><b>Repetir Password</b></label>
            <input class="form-control" type="password" placeholder="Repita su password" name="password_confirmation" required>
        </div>

        <div class='form-group'>
            <div class="input-group">
                <label class="avatar-label" for="avatar"><b>Avatar*</b></label>
                <input class="avatar-input" type="file" name="avatar" value="">
                @if($errors->has('avatar'))
                    <div class="invalid-feedback" style="display: block !important">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <hr>
        <p>Al ingresar sus datos usted acepta nuestros <a href="#">Términos y condiciones de privacidad</a>.</p>
        <button type="submit" class="registrobtn">Crear Cuenta</button>
    </div>

    <div class="container signin">
        <p class="ya-tiene-cuenta">Ya tiene una cuenta? <a href="#">Login</a>.</p>
    </div>
    </form>
</div>

@endsection('content')