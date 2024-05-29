<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->comment('Monto');
            $table->json('detail')->comment('Detalles de la transacción')->nullable();
            $table->bigInteger('user_bills_id')->unsigned()->comment('Id de la factura')->nullable();
            $table->foreign('user_bills_id')->references('id')->on('user_bills');
            $table->enum('source',['coinpayment','depay','others'])->comment('Fuente de pago');
            $table->enum('status',['P','A','R','E'])->comment('P: Pendiente / A: Aprobado / R: Rechazado / E: Expiro')->default('P');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
