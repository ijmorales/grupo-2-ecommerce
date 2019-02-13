<div class="buscador-caja p-2">
    <form class="form-inline mr-4" method="GET" action="{{ route('buscadorProductos') }}">
        <input class="form-control mr-2" type="search" placeholder="Buscar producto..." aria-label="Search" name="busqueda">
        <button class="btn btn-verde btn-busqueda d-none d-sm-block" type="submit">Buscar</button>
    </form>
    @if(isset($busqueda))
    <span class="termino-busqueda d-flex align-items-center">
        Buscando productos que contengan "{{ $busqueda }}"
    </span>
    @endif

    @if(Auth::user()->carritoActivo() !== null)
    <div class="ml-auto mr-2">
        <a href="{{ route('carrito') }}" class="carrito-info-bar">
            <ion-icon name="cart" size="large" class="verde"></ion-icon>
            <span class="texto-buscador" id="carrito-count">{{ Auth::user()->carritoActivo()->productos()->sum('cantidad') }}</span>
        </a>
    </div>
    @endif
</div>