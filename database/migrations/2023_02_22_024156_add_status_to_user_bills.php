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
        Schema::table('user_bills', function (Blueprint $table) {
            $table->enum('status',['P','A','C'])->comment('P: Pendiente / A: Aprobado /C: Cancelado')->default('P')->after('users_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_bills', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
