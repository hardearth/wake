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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('referred_user_id')->nullable()->after('roles_id');
            $table->foreign('referred_user_id')->references('id')->on('users');
            $table->string('referred_url')->nullable()->after('referred_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['referred_user_id']);
            $table->dropColumn('referred_user_id');
            $table->dropColumn('referred_url');
        });
    }
};
