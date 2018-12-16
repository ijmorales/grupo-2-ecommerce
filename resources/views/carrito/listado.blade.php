@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container-checkout">
        <form action="/carrito" class="carrito-checkout" method="POST">
            @csrf
            @foreach($productos as $producto)
            <div class="container-producto-checkout">
                <input type="text" class="" value="{{ $producto->id }}" name="" hidden>
                <div class="img-container-checkout">
                    <img src="{{ $producto->getImagenPrincipal() }}" alt="" class="img-checkout">
                </div>
                <div class="informacion-checkout">
                    <div class="nombre-producto-checkout">
                        <strong>{{ $producto->nombre }}</strong>
                    </div>
                    <div class="form-group cantidad-container">
                        <p>Cantidad:</p>
                        <input type="hidden" name="productos[{{ $loop->index }}][id]" value="{{ $producto->id }}">
                        <input type="text" class="cantidad-input" name="productos[{{ $loop->index }}][cantidad]" value="{{ $producto->pivot->cantidad }}">
                    </div>
                    <div class="precio-container">
                        <strong class="precio-span">$ {{ $producto->precio }}</strong>
                    </div>
                </div>
            </div>
            @endforeach
            <div class = "resume-container">
                <div class="subtotal-container">
                    <span class="subtotal">
                        {{ $montoTotal }}
                    </span>
                </div>
                <a href="{{ route('checkout') }}">
                    <button class="btn btn-primary confirmar-carrito" type="button">Checkout</button>
                </a>
                <button class="btn btn-secondary actualizar-carrito" type="submit">Actualizar</button>
            </div>
        </form>
    </div>
</div>
    @endsection('content')
    @section('js')
    <script src="js/carrito.js"></script>
    @endsection('js')