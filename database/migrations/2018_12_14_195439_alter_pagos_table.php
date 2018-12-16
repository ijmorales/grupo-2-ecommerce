<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->renameColumn('estados_pago_id', 'estado_pago_id');
            $table->foreign('estado_pago_id')->references('id')->on('estados_pago');
            $table->unsignedInteger('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->renameColumn('estado_pago_id', 'estados_pago_id');
            $table->dropForeign('estado_pago_id');
            $table->dropColumn('pedido_id');
        });
    }
}
