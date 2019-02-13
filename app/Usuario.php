<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'direccion_id', 'email', 'password', 'avatar',
    ];

    public $table = 'usuarios';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carritos()
    {
        return $this->hasMany('App\Carrito', 'usuario_id');
    }

    public function carritoActivo()
    {
        $carrito = $this->carritos()->where('estado_carrito_id', 1)->first();
        return $carrito ? $carrito : Carrito::create([
            'estado_carrito_id' => 1,
            'usuario_id' => $this->id,
            ]);
    }

    public function direcciones()
    {
        return $this->hasMany('App\Direccion');
    }

    public function nombreCompleto()
    {
        return "$nombre $apellido";
    }

    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

    public function pedidoAbierto()
    {
        return $this->pedidos()->where('estado_pedido_id', 1)->orWhere('estado_pedido_id', 2)->first();
    }
}
