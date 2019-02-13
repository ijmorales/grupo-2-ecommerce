<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomModels\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Producto;
use App\Pedido;
use App\EstadoCarrito;
use App\EstadoPedido;

class PedidoController extends Controller
{
    public $redirectTo = '';

    public function listadoPedidos()
    {
        $pedidos = Pedido::where('id', Auth::id());
        $vac = compact('pedidos');
        return view('pedido.listado', $vac);
    }

    public function iniciarPedido()
    {
        // Traigo el usuario
        $usuario = Auth::user()->first();
        // Cierro el carrito
        $carrito = $usuario->carritoActivo();
        $carrito->estado_carrito_id = 2;
        $carrito->save();

        // Creo un pedido nuevo y le asocio el carrito.
        $pedido = Pedido::create([
            'carrito_id' => $carrito->id,
            'estado_pedido_id' => 1,
            'usuario_id' => $usuario->id,
        ]);

        return redirect('/checkout/datos-pago');
    }

    public function finalizarPedido()
    {
        $pedido = Auth::user()->pedidos()->where('estado_pedido_id', 3)->get()->last();
        $vac = compact('pedido');
        return view('pedido.finalizarPedido', $vac);
    }
}
