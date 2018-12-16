<?php

namespace App\Http\Middleware;

use Closure;
use App\Pedido;
use App\EstadoPedido;
use Illuminate\Support\Facades\Auth;

class CompletarPedido
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Buscamos si hay algun pedido por completar (que este en estado 1 o 2)
        $pedidoAbierto = Auth::user()->pedidoAbierto();
        
        if(!$pedidoAbierto)
        {
            return redirect('carrito');
        }

        $estado = $pedidoAbierto->estado()->first();
        
        $creado = EstadoPedido::getCreado();
        $pagado = EstadoPedido::getPagado();
        $aEnviar = EstadoPedido::getAEnviar();

        if($estado->id == $creado->id)
        {
            return $request->is('*datos-pago*') ? $next($request) : redirect(route($creado->getProximaAccion()));
        }
        elseif($estado->id == $pagado->id)
        {
            return $request->is('*datos-envio*') ? $next($request) : redirect(route($pagado->getProximaAccion()));
        }
        elseif($estado->id == $aEnviar->id)
        {
            return $request->is('*checkout/final*') ? $next($request) : redirect(route($aEnviar->getProximaAccion()));
        }

        return $next($request);
    }
}
