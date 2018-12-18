@extends('layouts.app')
@section('content')
@include('buscador')
<div class="container">
    <div class="container-carrito">
        <h2>CARRITO</h2>
        <hr>
        <form action="{{ route('carrito') }}" method="POST" name="actualizar" id="actualizar">
            @csrf
            @foreach($productos as $producto)
            <div class="row">
                <div class="container-producto-carrito mb-2 pt-2 pb-2 d-flex justify-content-between">
                    <div class="img-container-carrito col-sm-12 col-md-3 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ $producto->getImagenPrincipal() }}" alt="" class="img-carrito">
                    </div>
                    <div class="informacion-carrito col-sm-12 col-md-7 d-flex flex-column justify-content-center align-items-sm-center align-items-md-start">
                        <div class="nombre-producto-carrito">
                            <strong>{{ $producto->nombre }}</strong>
                        </div>
                        <div class="cantidad-container">
                            <span class="mr-2">Cantidad:</span>
                            <input type="hidden" name="productos[{{ $loop->index }}][id]" value="{{ $producto->id }}" form="actualizar">
                            <input type="text" class="cantidad-input" name="productos[{{ $loop->index }}][cantidad]" value="{{ $producto->pivot->cantidad }}" form="actualizar">
                        </div>
                        <div class="precio-container">
                            <strong class="precio-span">$ {{ $producto->precio }}</strong>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
                        <button type="" class='btn btn-danger eliminar' id="{{ $producto->id }}">X</button>
                    </div>
                </div>
            </div>
            @endforeach
            <div class = "resume-container mt-4 pt-2 pb-2">
                <div class="subtotal-container col-6  d-flex align-items-center">
                    <span class="subtotal" style="">
                        <h4 class="subtotal-h4">
                            <span>
                                TOTAL:
                            </span>
                            <span class="texto-verde">
                                $ {{ $montoTotal }}
                            </span>
                        </h3>
                    </span>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <a href="{{ route('checkout') }}">
                        <button class="btn confirmar-carrito btn-verde" type="button">Checkout</button>
                    </a>
                    <button class="btn actualizar-carrito secondary" type="submit" form="actualizar">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
    @endsection('content')
    @section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/carrito.js"></script>
    @endsection('js')