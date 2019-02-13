<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public $table = 'pedidos';
    public $guarded = [];
    public $timestamps = true;
    public $fillable = ['estado_pedido_id', 'carrito_id', 'usuario_id'];

    public function carrito()
    {
        return $this->belongsTo('App\Carrito');
    }

    public function productos()
    {
        return $this->carrito()->productos();
    }

    public function montoTotal()
    {
        return $this->carrito()->montoTotal();
    }

    public function estado()
    {
        return $this->belongsTo('App\EstadoPedido', 'estado_pedido_id');
    }

    public function usuario()
    {
        return $this->hasOne('App\Usuario');
    }

    public function envio()
    {
        return $this->belongsTo('App\Envio');
    }

    public function setEstado(int $estadoId)
    {
        $this->estado_pedido_id = $estadoId;
        $this->save();
    }
}
