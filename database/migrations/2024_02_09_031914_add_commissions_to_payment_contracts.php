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
            $table->json('commissions')->comment('Se guarda por cada usuario el id como llave y su monto como valor')->nullable()->after('transaction_hash');
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
            $table->dropColumn('commissions');
        });
    }
};
