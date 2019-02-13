<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carrito_id');
            $table->unsignedInteger('producto_id');
            $table->foreign('carrito_id')->references('id')->on('carritos');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carritos_productos');
    }
}
