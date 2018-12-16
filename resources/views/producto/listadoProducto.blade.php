@extends('layouts.app')

@section('content')
<div class='container row'>
  <div class="col-3 col-md-4 container-categorias mb-4">
    <ul>
      <li>
        Electronica
      </li>
      <li>
        Electronica
      </li>
    </ul>
    {{ $productos->links() }}
  </div>
  <div class="container-productos col-9">
    <div class="col-12 row">
      @foreach($productos as $producto)
      <article class="col-md-6 producto-box mb-4" id="{{ $producto->id }}">
        <div class="producto-mini">
          <img class="producto-mini-img" src='{{ $producto->getImagenPrincipal() }}' alt="Card image cap">
          <div class="producto-mini-nombre">
            <a href="" style="text-decoration: none;">
              {{ $producto->nombre }}
            </a>
          </div>
          <div class="producto-mini-precio">
            ${{ $producto->precio }},00
          </div>
          <div class="producto-mini-precio">
            <ion-icon name="cart" size="large" class="agregar-carrito pointer-hover"></ion-icon> 
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='{{ asset('js/listadoProductos.js') }}'></script>
@endsection