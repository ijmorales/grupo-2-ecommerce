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

        $data = [
            'carritoCount' => $carrito->productos()->sum('cantidad'),
            'success' => true,
        ];
        return response(json_encode($data));
    }

    public function carrito()
    {
        // Chequeamos si el usuario tiene productos en el carrito
        $carrito = auth()->user()->carritoActivo();
        $productos = $carrito->productos()->get();

        if($productos->isEmpty())
        {
            // Si no tiene objetos en el carrito lo mandamos a productos para que agregue alguno!
            return redirect('/productos');
        }

        // Calculamos el precio total del carrito, hasta el momento.
        $montoTotal = $carrito->montoTotal();

        $vac = compact('productos', 'montoTotal');
        return view('carrito.listadoCarrito', $vac);
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

    public function eliminar(Request $req)
    {
        $carrito = Auth::user()->carritoActivo();
        $producto = Producto::find($req->id);
        $carrito->productos()->detach($producto->id);
        $carrito->save();
        
        $respuesta = ['id' => $req->id, 'success' => true];
        return json_encode($respuesta);
    }
}
