@extends('layouts.app')

@section('content')
@include('buscador')
<div class='container'>
    <div class="row producto-info-container" id="{{ $producto->id }}">
        <div class="col-xs-12 col-sm-6 producto-imagen-container">
            <img class="detalle-producto-img" src="{{ $producto->getImagenPrincipal() }}" alt="">
        </div>
        <div class="col-xs-12 col-sm-6 producto-descripcion-container">
            <h2 class="producto-detalle-title">{{ $producto->nombre }}</h2>
            <h3 class="producto-detalle-precio">$ {{ $producto->precio }}</h3>
            <div class="descripcion-container">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur, numquam voluptatem unde hic laborum quam necessitatibus sit laboriosam quaerat repellendus laudantium possimus, recusandae maxime eveniet! Fugiat saepe pariatur deserunt.
            </div>
            <div class="agregar-carrito-multiple-container">
                <input type="cantidad" class='form-control cantidad-carrito' id="cantidad">
                <button class="btn agregar-carrito-multiple">
                    <p style='display: inline'>Agregar al carrito</p>
                    <ion-icon name="cart" size="medium" class="pointer-hover agregar-carrito-detalle-producto"></ion-icon> 
                </button>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/detalleProducto.js') }}"></script>
@endsection('js')