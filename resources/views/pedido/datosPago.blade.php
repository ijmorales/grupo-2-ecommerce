@extends('layouts.app')

@section('content')

<form action="{{ route('datosPago') }}" method="post">
    @csrf
    <h2>Carga tus datos</h2>
    <div class="form-group">

    </div>

    <button class="btn btn-primary" type="submit">Pagar</button>
</form>

@endsection('content')