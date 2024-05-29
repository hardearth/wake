<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_contracts', function (Blueprint $table) {
            $table->id();
            $table->json('wallets')->comment('Wallets que deben viajar al contrato juno con su nivel');
            $table->float('amount', null)->comment('Monto');
            $table->enum('status', ['P', 'C'])->default('P')->comment('Indica si ya se ejecuto o no la distribucion del contrato');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->unsignedBigInteger('created_user_id');
            $table->foreign('created_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('payment_contracts');
    }
};
