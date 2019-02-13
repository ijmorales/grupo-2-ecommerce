<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $table = 'categorias';
    public $timestamps = true;
    public $guard = [];

    public function subCategorias()
    {
        return $this->hasMany('App\Categoria', 'categoria_padre_id');
    }

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
