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
        Schema::create('course_registered', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courses_id')->unsigned()->comment('Id del usuario que creo el registro');
            $table->foreign('courses_id')->references('id')->on('courses');
            $table->bigInteger('users_id')->unsigned()->comment('Id del usuario');
            $table->foreign('users_id')->references('id')->on('users');
            $table->bigInteger('created_user')->unsigned()->comment('Id del usuario que creo el registro');
            $table->foreign('created_user')->references('id')->on('users');
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
        Schema::dropIfExists('course_registered');
    }
};
