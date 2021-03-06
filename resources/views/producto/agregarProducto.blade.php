@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
@endsection('css')
@section('content')
<div class='container'>
  <form action="{{ route('agregarProducto') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2>Agregar producto</h2>
    <hr>
    <div class='form-group'>
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="nombre">
    </div>
    <div class='form-group'>
      <label for="precio">Precio</label>
      <input type="text" class="form-control" name="precio">
    </div>
    <div class='form-group'>
      <label for="categoria">Categoria</label>
      <input type="text" class="form-control" name="categoria">
    </div>
    <div class='form-group'>
      <label for="marca">Marca</label>
      <input type="text" class="form-control" name="marca">
    </div>
    <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <textarea class='form-control' name='descripcion' rows='6'> </textarea>
    </div>
    <div class='form-group'>
      <label for="imagen-principal">Imagen principal</label>
      <div class='input-group'>
        <input type="file" class="form-control" name="imagen-principal">
      </div>
      <div class='input-group radio-tipo-imagen'>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tipo-imagen" id="S" value="S">
          <label class="form-check-label" for="S">S</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tipo-imagen" id="M" value="M">
          <label class="form-check-label" for="M">M</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tipo-imagen" id="L" value="L" checked>
          <label class="form-check-label" for="L">L</label>
        </div>
      </div>
    </div>
    <div class='form-group d-flex justify-content-center'>
      <input type="submit" class='btn btn-primary'>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  </form>
</div>
@endsection()

@section('js')
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/agregarProducto.js') }}"></script>
@endsection('js')