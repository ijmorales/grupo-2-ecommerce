<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoPedido;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    public function mostrarFormPago()
    {
        return view('pedido.datosPago');
    }

    public function procesarPago(Request $req)
    {
        $pedido = Auth::user()->pedidoAbierto();
        $pedido->estado()->associate(EstadoPedido::getPagado());
        $pedido->save();
        return redirect(route('datosEnvio'));
    }
}
