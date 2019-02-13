@extends('layouts.app')

@section('content')

<div class='container'>
    <form action="{{ route('agregarMarca') }}" method="POST">
        <h2>Agregar marca</h2>
        <hr>
        @csrf
        <div class='form-group'>
            <label for="nombre">
                Nombre
            </label>
            <input type="text" name='nombre' class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
            @if($errors->has('nombre'))
                <div class='invalid-feedback'>
                    <strong>{{ $errors->first('nombre') }}</strong>
                </div>
            @endif
        </div>
        <div class='form-group form-check'>
            <input type="checkbox" class="form-check-input" id="agregarOtra" name="agregarOtra" checked='checked'>
            <label class="form-check-label active" for="agregarOtra">Quiero agregar otra marca</label>
        </div>
        <button type='submit' class='btn btn-primary'>Guardar</button>
    </form>
</div>

@endsection()