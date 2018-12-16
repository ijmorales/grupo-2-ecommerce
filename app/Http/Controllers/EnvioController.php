<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Envio;
use App\Direccion;
use App\EstadoPedido;

class EnvioController extends Controller
{
    public function validatorDireccionElegida(array $data)
    {
        return Validator::make($data, [
            'radioDireccion' => ['numeric', 'exists:direcciones,id']
        ]);
    }

    public function mostrarElegirDireccion()
    {
        $direcciones = Auth::user()->direcciones()->get();
        $vac = compact('direcciones');

        return view('pedido.datosEnvio', $vac);
    }

    public function guardarElegirDireccion(Request $req)
    {
        // Valido la direccion elegida.
        $this->validatorDireccionElegida(['radioDireccion' => $req->radioDireccion])->validate();

        // Traigo la direccion.
        $direccion = Direccion::find($req->radioDireccion);

        // Traigo el pedido.
        $pedido = Auth::user()->pedidoAbierto();

        // Creo el envio nuevo
        $envio = Envio::create(['estado_envio_id' => 1, 'direccion_origen_id' => 1]);

        // Le agrego la direccion de destino.
        $envio->direccionDestino()->associate($direccion);
        $envio->save();
        
        // Asocio el envio con su pedido.
        $pedido->envio()->associate($envio);

        // Actualizo el estado del pedido.
        $pedido->estado()->associate(EstadoPedido::getAEnviar());
        $pedido->save();

        return redirect()->route('finalizarPedido');
    }
}
