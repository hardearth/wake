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
        Schema::table('course_registered', function (Blueprint $table) {
            $table->bigInteger('user_bill_id')->unsigned()->comment('Id del pago de la factura')->nullable()->after('users_id');
            $table->foreign('user_bill_id')->references('id')->on('user_bills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_registered', function (Blueprint $table) {
            $table->dropColumn(['user_bill_id']);
        });
    }
};
