<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public $table = 'carritos';
    public $guarded = [];
    public $fillable = ["usuario_id", "estado_carrito_id"];


    // Usamos esta funcion para añadir un producto, calculando si ya existe uno en el carrito.
    // Si existe, simplemente incrementamos el campo cantidad de la tabla pivot.

    public function attachProducto(Model $producto, $cantidad)
    {
        // Buscamos si existe el producto en el carrito actual.
        $productoEnCarrito = $this->productos()->where('producto_id', $producto->id)->first();

        if($productoEnCarrito)
        {
            // Existe, entonces incrementamos el campo cantidad.
            $productoEnCarrito->pivot->cantidad += $cantidad;
            
            // Guardamos el registro actualizado en la tabla pivot.
            $productoEnCarrito->pivot->save();
            // $this->save();
        } else {
            // No existe, entonces lo añadimos normalmente con su cantidad.
            $this->productos()->attach($producto->id, ['cantidad' => $cantidad]);
        }
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'carritos_productos')->withPivot('cantidad')->withTimestamps();
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'usuario_id');
    }

    public function estado()
    {
        return $this->hasOne('App\EstadoCarrito');
    }

    public function pedido()
    {
        return $this->hasOne('App\Pedido', 'carrito_id');
    }

    // Suma todos los productos de un carrito y devuelve el total.
    public function montoTotal()
    {
        $precioTotal = 0;
        foreach($this->productos()->get() as $producto)
        {
            $precioTotal += $producto->precio * $producto->pivot->cantidad;
        }
        return $precioTotal;
    }
}
