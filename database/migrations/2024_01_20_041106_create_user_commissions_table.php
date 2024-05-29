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
        Schema::create('user_commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('Usuario');
            $table->foreign('user_id')->on('users')->references('id');

            $table->unsignedBigInteger('payment_contract_id')->comment('Usuario');
            $table->foreign('payment_contract_id')->on('payment_contracts')->references('id');
            $table->float('amount',null);
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
        Schema::dropIfExists('user_commissions');
    }
};
