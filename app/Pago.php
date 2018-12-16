<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public $table = 'pagos';

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }
}
