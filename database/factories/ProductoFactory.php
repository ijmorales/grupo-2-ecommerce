<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'id_categoria' => 2,
        'id_marca' => 818,
        'nombre' => $faker->company,
        'precio' => $faker->numberBetween(3000, 7340),
        'descripcion' => $faker->paragraph(),
    ];
});
