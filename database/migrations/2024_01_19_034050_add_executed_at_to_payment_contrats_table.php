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
        Schema::table('payment_contracts', function (Blueprint $table) {
            $table->string('transaction_hash')->comment('Hash de la red cuando se ejecuta el contrato')->nullable()->after('created_user_id');
            $table->dateTime('executed_at')->comment('Fecha en la que se ejecuto exitosamente el contrato')->nullable()->after('created_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_contracts', function (Blueprint $table) {

            $table->dropColumns(['executed_at','transaction_hash']);
        });
    }
};
