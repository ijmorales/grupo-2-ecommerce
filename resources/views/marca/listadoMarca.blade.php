@extends('layouts.app')
@section('content')
<div class='container'>
    <table class="table" style='width: 70%; text-align: center;'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de creacion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <th scope="row">{{ $marca->id }}</th>
                <td>{{ $marca->nombre }}</td>
                <td>{{ $marca->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection()