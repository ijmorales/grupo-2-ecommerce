@extends('layouts.app')

@section('content')

<div class="container container-datos-envio">

    <div class="direcciones-container col-12">
        <form action="" class="direcciones-form" method="POST">
            @csrf
            <table class="table direcciones-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Direccion</th>
                        <th scope="col"><ion-icon name="cube"></ion-icon></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($direcciones as $direccion)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><strong>{{ $direccion->calle }} {{ $direccion->numero }}</strong>, {{ $direccion->ciudad }}, {{ $direccion->codigo_postal }}</td>
                        <td><input class="" type="radio" name="radioDireccion" id="radioDireccion{{ $direccion->id }}" value="{{ $direccion->id }}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="boton-container row">
                    <button class="btn btn-secondary col-xs-12 col-md-5 col-lg-4 agregar-direccion" type="">
                        Agregar
                    </button>
                    <button class="btn btn-success col-xs-12 col-md-5 col-lg-4" type="submit">
                        Enviar
                    </button>
            </div>
        </form>
    </div>

    <div class="direccion-nueva-container">
        <h3>Agregar direccion</h3>
        <hr>
        <form action="{{ route('agregarDireccionDesdeEnvio') }}" class="direccion-nueva-form" method="post">
            @csrf
            <div class="form-group">
                <label for="pais">Pais</label>
                <select name="pais" id="pais" class="form-control paises" value="" disabled>
                    <option value="">Cargando...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Provincia</label>
                <input type="text" class="form-control" name="estado">
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" name="ciudad">
            </div>
            <div class="form-group">
                <label for="calle">Calle</label>
                <input type="text" class="form-control" name="calle">
            </div>
            <div class="form-group">
                <label for="numero">Numero</label>
                <input type="text" class="form-control" name="numero">
            </div>
            <div class="form-group">
                <label for="apartamento">Apartamento</label>
                <input type="text" class="form-control" name="apartamento">
            </div>
            <div class="form-group">
                <label for="codigo-postal">Codigo postal</label>
                <input type="text" class="form-control" name="codigo-postal">
            </div>
            <div class="nueva-direccion-button-container">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>

</div>

@endsection('content')

@section('js')
<script src="{{ asset('js/envio.js') }}"></script>
@endsection('js')