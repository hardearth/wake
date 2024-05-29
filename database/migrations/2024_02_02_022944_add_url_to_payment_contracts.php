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
            $table->text('url')->nullable()->after('transaction_hash')->comment('Url para la consulta de la transacción');
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
            $table->dropColumn('url');
        });
    }
};
