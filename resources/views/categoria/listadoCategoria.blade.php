@extends('layouts.app')
@section('content')
<div class='container'>
  @foreach($categoriasPadre as $categoriaPadre)
    <h2>$categoriaPadre->nombre</h2>
    <ul>
      <li></li>
    </ul>
  @endforeach
</div>
@endsection()