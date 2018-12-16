@extends('layouts.app')

@section('content')

<div class='container'>
@foreach($productos as $producto)
  <div class='row'>
    <div class="col-3">
      <div class="img-box">
        <img src='{{ asset("storage/img/{$producto->imagenes()->first()->nombre}") }}' alt="">
      </div>
    </div>
    <div class="col-4">
      <div class="nombre-container">
        $producto->nombre
      </div>
      <div class="descripcion-container">
        $producto->descripcion
      </div>
    </div>
    <div class="col-2">
      <div class="order-container">
        <div class="precio-container">
          $producto->precio
        </div>
        <div class="cantidad">
          $producto->cantidad
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection