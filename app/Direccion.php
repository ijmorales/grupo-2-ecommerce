<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public $table = 'direcciones';
    public $guarded = [];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function getEnvioString()
    {
        return "$this->ciudad, $this->estado, $this->codigo_postal";
    }

    public function envios()
    {
        return $this->hasMany('App\Envio');
    }
}
