<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public $table = 'pedidos';
    public $guarded = [];
    public $timestamps = true;
}
