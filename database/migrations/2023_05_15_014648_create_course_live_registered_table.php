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
        Schema::create('course_live_registered', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_live_id')->unsigned()->comment('Id curso en vivo');
            $table->foreign('course_live_id')->references('id')->on('course_live');
            $table->bigInteger('users_id')->unsigned()->comment('Id del usuario registrado');
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('course_live_registered');
    }
};
