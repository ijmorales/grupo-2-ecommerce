<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("carritos", function(Blueprint $table) {
           $table->foreign('estado_carrito_id')->references('id')->on('estados_carrito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("carritos", function(Blueprint $table) {
            $table->dropForeign('estado_carrito_id');
        });
    }
}
