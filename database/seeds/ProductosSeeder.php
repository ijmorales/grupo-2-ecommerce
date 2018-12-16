<?php

use Illuminate\Database\Seeder;
use App\Imagen;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Producto::class, 20)->create()->each(function($producto){
            $producto->imagenes()->attach(Imagen::find(8));
        });
    }
}
