@extends('layouts.app')

@section('content')
<div class='col container d-flex flex-column justify-content-center' style="background-color: #404041;">
    <div class=' mt-4 resumen-container'>
        <h2>Pedido finalizado</h2>
        <hr>
        <h4>Resumen de tu pedido</h4>
        <div class="resumen-pedido">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Q</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido->carrito()->first()->productos()->get() as $producto)
                    <tr>
                        <th scope="row">{{ $producto->pivot->cantidad }}</th>
                        <td>{{ $producto->nombre }}</td>
                        <td>$ {{ $producto->precio }}</td>
                        <td>$ {{ $producto->precio * $producto->pivot->cantidad }}</td>
                    </tr>
                    @endforeach()
                    <tr class="btn-verde resumen-fuente">
                        <th scope="row">{{ $pedido->carrito()->first()->productos()->count() }}</th>
                        <td colspan='2'></td>
                        <td>$ {{ $pedido->carrito()->first()->montoTotal()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="botones-container">
            <button class="btn btn-verde">Seguir comprando</button>
            <button class="btn btn-primary">Volver a la home</button>
        </div>
    </div>
</div>
@endsection('content')