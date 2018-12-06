<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $table = 'categorias';
    public $timestamps = true;
    public $guard = [];

    public function getSubcategorias()
    {
        return self::where('categoria_padre_id', '=', "$this->id");
    }
}
