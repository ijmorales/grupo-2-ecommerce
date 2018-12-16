<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    public $table = 'estados_pedido';
    public $guard = [];
    public $fillable = [];
    public $rutaProximaAccion = "";

    public static function getCreado()
    {
        return self::getEstado(1, 'datosPago');
    }

    public static function getPagado()
    {
        return self::getEstado(2, 'datosEnvio');
    }

    public static function getAEnviar()
    {
        return self::getEstado(3, 'carrito');
    }

    protected static function getEstado($id, $rutaAccion)
    {
        $estado = self::find($id);
        $estado->rutaProximaAccion = $rutaAccion;
        return $estado;
    }

    public function getProximaAccion()
    {
        return $this->rutaProximaAccion;
    }
}
