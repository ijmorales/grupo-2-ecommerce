@extends('layouts.app') @section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('img/carrousel-home.png') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/carrousel-home2.png') }}" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="separador-caja">
    <h3 class="separador-texto">ASESOR ONLINE</h2>
</div>
<div class="asesor-online">
    <div class="pregunta">
        <h2>¿Qué necesitás proteger?</h2>
    </div>

    <div class="asesor-categorias row d-flex justify-content-around">
        <div class="asesor-img-empresa col-xs-12 col-md-5 col-lg-4">
            <img src="img/empresa.png" alt="Img" class="img-responsive" />
            <button class="asesor-btn">Empresa</button>
        </div>

        <div class="asesor-img-vivienda col-xs-12 col-md-5 col-lg-4">
            <img src="img/vivienda.png" alt="Img" class="img-responsive" />
            <button class="asesor-btn">Vivienda</button>
        </div>
    </div>
</div>
<div class="separador-caja">
    <h3 class="separador-texto">DESTACADOS</h3>
</div>
<div class="destacados-container row p-4">
    @foreach($productos as $producto)
    <article class="col-xs-12 col-md-6 col-lg-4 producto-box" id="{{ $producto->id }}">
        <a href="{{ route('detalleProducto', ['id' => $producto->id]) }}">
            <div class="producto-mini">
                <img class="producto-mini-img" src='{{ $producto->getImagenPrincipal() }}' alt="Card image cap">
                <div class="producto-mini-nombre">
                    {{ $producto->nombre }}
                </div>
                <div class="producto-mini-precio">
                    ${{ $producto->precio }},00
                </div>
                <div class="producto-mini-precio">
                    <ion-icon name="cart" size="large" class="agregar-carrito pointer-hover"></ion-icon> 
                </div>
            </div>
        </a>
    </article>
    @endforeach
</div>

@endsection

@section('js')
<script src="{{ asset('js/carrousel.js') }}"></script>
@endsection('js')