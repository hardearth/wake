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
        DB::statement("ALTER TABLE user_bills MODIFY COLUMN payment_method ENUM('coinpayment', 'free') NOT NULL DEFAULT 'coinpayment'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_bills', function (Blueprint $table) {
            //
        });
    }
};
