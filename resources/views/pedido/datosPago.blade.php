@extends('layouts.app')

@section('content')
<div class="col d-flex flex-column justify-content-center" style="background-color: #404041;">
    <div class="container">
        <div class="col d-flex justify-content-center mt-4">
            <h2></h2>
            <form action="{{ route('datosPago') }}" method="post" class="datos-pago-form">
                @csrf
                <h2>Carga tus datos</h2>
                <hr>
                <div class="form-group">
                    <label for="form-control">Metodo de pago</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Tarjeta de credito
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" disabled>
                        <label class="form-check-label" for="exampleRadios2">
                            Transferencia bancaria
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                        <label class="form-check-label" for="exampleRadios3">
                            Efectivo
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-control">Numero de tarjeta</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="form-control">CSV</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="form-control">Fecha de vencimiento</label>
                    <input type='text' class="form-control">
                </div>
                <div class="form-group">
                    <label for="form-control">Cuotas</label>
                    <select class='form-control' name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                        <option value="">6</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Pagar</button>
            </form>
        </div>
    </div>
</div>

@endsection('content')