<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $table = 'productos';
    public $timestamps = true;
    public $guard = [];
    public $fillable = ['nombre', 'precio', 'id_categoria', 'id_marca'];

    public function imagenes(){
        return $this->belongsToMany('App\Imagen', 'imagenes_productos');
    }
}
