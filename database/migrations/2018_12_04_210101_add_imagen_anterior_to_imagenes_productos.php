<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagenAnteriorToImagenesProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagenes_productos', function (Blueprint $table) {
            $table->unsignedInteger('imagen_anterior')->nullable();
            $table->foreign('imagen_anterior')->references('id')->on('imagenes_productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagenes_productos', function (Blueprint $table) {
            $table->dropForeign('imagen_anterior');
        });
    }
}
