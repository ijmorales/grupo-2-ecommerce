@extends('layouts.app')

@section('cabecera')
@include('buscador')
@endsection('cabecera')
@section('content')
<div class="container">
    <div class='row'>
        <div class="col-12 producto-info-container d-flex" id="{{ $producto->id }}">
            <div class="col-xs-12 col-sm-6 producto-imagen-container p-4">
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
        <div class="separador-caja">
            <h3 class="separador-texto">RELACIONADOS</h3>
        </div>
        <div class='col-12 d-flex justify-content-center align-items-center mt-3 mb-3'>
        @if($productosRelacionados->isNotEmpty())
            @foreach($productosRelacionados as $pR)
                <article class="col-xs-12 col-md-6 col-lg-4 producto-box {{ $loop->index == 2 ? 'd-sm-none d-xl-flex' : '' }}" id="{{ $pR->id }}">
                    <div class="producto-mini">
                    <a href="{{ route('detalleProducto', ['id' => $pR->id]) }}">
                            <img class="producto-mini-img" src='{{ $pR->getImagenPrincipal() }}' alt="Card image cap">
                            <div class="producto-mini-nombre">
                                {{ $pR->nombre }}
                            </div>
                    </a>
                            <div class="producto-mini-precio">
                                ${{ $pR->precio }},00
                            </div>
                            <div class="producto-mini-precio">
                                <ion-icon name="cart" size="large" class="agregar-carrito pointer-hover"></ion-icon> 
                            </div>
                        </div>
                </article>
            @endforeach
        @endif
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('js/detalleProducto.js') }}"></script>
@endsection('js')