<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarritoIdToPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->unsignedInteger('carrito_id');
            $table->foreign('carrito_id')->references('id')->on('carritos');
            $table->renameColumn('estados_pedido_id', 'estado_pedido_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->renameColumn('estado_pedido_id', 'estados_pedido_id');
            $table->dropColumn('carrito_id');
        });
    }
}
