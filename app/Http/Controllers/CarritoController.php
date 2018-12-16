<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Producto;
use App\Carrito;

class CarritoController extends Controller
{

    public function validator(array $data)
    {
        return Validator::make($data, [
            'productos.*.cantidad' => ['required', 'numeric', 'max: 100'],
            'productos.*.id' => ['required', 'numeric', 'exists:productos,id'],
        ]);
    }

    // Se consume a traves de Ajax.
    public function agregar(Request $req)
    {

        // Chequeamos que el producto existe.
        $producto = Producto::find($req->id);
        $usuario = auth()->user();

        if(!$producto){
            return response("false");
        }

        // Buscamos el carrito para el usuario
        $carrito = $usuario->carritoActivo();

        // Validamos la cantidad recibida
        $cantidad = $req->cantidad;
        if($cantidad > 500 || $cantidad <= 0)
        {
            return response("false");
        }
        // Agregamos el producto al carrito.
        $carrito->attachProducto($producto, $cantidad);

        return response("true");
    }

    public function carrito()
    {
        // Chequeamos si el usuario tiene productos en el carrito
        $carrito = auth()->user()->carritoActivo();
        if($carrito === null)
        {
            // Si no tiene carrito lo mandamos a productos para que agregue alguno!
            return redirect('/productos');
        }

        // Calculamos el precio total del carrito, hasta el momento.
        $montoTotal = $carrito->montoTotal();

        $productos = $carrito->productos()->get();
        $vac = compact('productos', 'montoTotal');
        return view('carrito.listado', $vac);
    }

    public function actualizarCarrito(Request $req)
    {
        // productosEnCarrito = ['id' => int, 'cantidad' => int]
        $productosEnCarrito = $req->all()['productos'];
        // Valido la informacion del form
        $this->validator($productosEnCarrito)->validate();

        // Traigo mi carrito.
        $carrito = Auth::user()->carritoActivo();

        // Actualizo las cantidades del pedido, en la tabla pivot.
        foreach($productosEnCarrito as $pec)
        {
            $carrito->productos()->updateExistingPivot($pec['id'], ['cantidad' => $pec['cantidad']]);
        }

        // Guardo el carrito.
        $carrito->save();

        return redirect('/carrito');
    }
}
