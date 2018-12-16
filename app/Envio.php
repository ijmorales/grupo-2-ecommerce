<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $table = 'envios';
    protected $fillable = ['estado_envio_id', 'direccion_origen_id', 'pedido_id'];

    public function direccionDestino()
    {
        return $this->belongsTo('App\Direccion', 'direccion_destino_id');
    }

    public function direccionOrigen()
    {
        return $this->belongsTo('App\Direccion', 'direccion_origen_id');
    }

    public function pedido()
    {
        return $this->hasOne('App\Pedido');
    }
}
