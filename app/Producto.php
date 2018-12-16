<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $table = 'productos';
    public $timestamps = true;
    public $guard = [];
    public $fillable = ['nombre', 'precio', 'categoria_id', 'marca_id', 'descripcion'];
    protected $defaultImgPath = '/storage/img';

    public function imagenes()
    {
        return $this->belongsToMany('App\Imagen', 'imagenes_productos');
    }

    // Si n
    public function getImagenPrincipal()
    {
        $imagenPrincipal = $this->imagenes()->first();
        return "$this->defaultImgPath/$imagenPrincipal->nombre";
    }

    public function carrito()
    {
        return $this->belongsToMany('App\Carrito', 'carritos_productos')->withPivot('cantidad')->withTimestamps();
    }
}
