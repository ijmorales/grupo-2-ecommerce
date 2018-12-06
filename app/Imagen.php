<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public $table = 'imagenes';
    public $guarded = [];
    public $fillable = ['size', 'nombre', 'tipo'];

    public function productos(){
        return $this->belongsToMany('App\Producto', 'imagenes_productos');
    }

    public function imagenAnterior(){
        return $this->belongsTo('App\Imagen');
    }
}
