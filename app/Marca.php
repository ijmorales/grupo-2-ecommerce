<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $table = 'marcas';
    public $timestamps = true;
    public $guard = [];
    public $fillable = ['nombre'];
}
