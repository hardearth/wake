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
        Schema::create('user_notes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->comment('Usuario');
            $table->foreign('user_id')->on('users')->references('id');

            $table->unsignedBigInteger('course_lesson_id');
            $table->foreign('course_lesson_id')->on('course_lessons')->references('id');

            $table->text('note')->comment('Nota de usuario');
            $table->integer('time_video')->default(0)->comment('Tiempo de video en el que se genero la nota');
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
        Schema::dropIfExists('user_notes');
    }
};
