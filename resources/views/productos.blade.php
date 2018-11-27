@extends('layouts.app')
@section('content')
<div class='container'>
  <div class="row container-productos">
    @foreach($productos as $producto)
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src=".../100px180/" alt="Card image cap">
    </div>
    @endforeach
  </div>
</div>
@endsection('content')