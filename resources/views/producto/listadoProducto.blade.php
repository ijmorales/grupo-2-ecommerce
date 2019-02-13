@extends('layouts.app')

@section('cabecera')
@include('buscador')
@endsection('cabecera')
@section('content')

<div class='container'>
  <div class="row d-flex pt-3 pb-3">
    <sidebar class="col-sm-4">
      <div class="categorias-container">
        <ul class="list-group mb-3 listado-categorias">
          @foreach($categorias as $categoria)
          <a href="{{ route('listadoPorCategoria', ['id' => $categoria->id]) }}">
            <li class="list-group-item">
              {{ $categoria->nombre }}
              @if($categoria->subCategorias()->get())
                <ul class="list-group sub-categorias-ul">
                  @foreach($categoria->subCategorias()->get() as $subCategoria)
                  <a href="{{ route('listadoPorCategoria', ['id' => $subCategoria->id]) }}">
                    <li class="lista-level-2-item">
                      {{ $subCategoria->nombre }}
                    </li>
                  </a>
                  @endforeach
                </ul>
              @endif
            </li>
          </a>
          @endforeach
        </ul>
        {{ $productos->appends(['busqueda' => isset($busqueda) ? $busqueda : ''])->links() }}
      </div>
    </sidebar>
    <div class="container-productos col-sm-8">
      <div class="row">
        @foreach($productos as $producto)
        <a href="{{ route('detalleProducto', ['id' => $producto->id]) }}">
          <article class="col-xs-12 col-md-6 col-lg-4 producto-box mb-4 d-flex flex-column justify-content-center" id="{{ $producto->id }}">
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
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src='{{ asset('js/listadoProductos.js') }}'></script>
@endsection()