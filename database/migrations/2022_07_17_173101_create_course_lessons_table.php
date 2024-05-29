<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Título de la clase');
            $table->text('description')->comment('Breve descripcion de la clase');
            $table->text('url_video')->nullable();
            $table->bigInteger('course_modules_id')->unsigned()->comment('Id del módulo al que está asociado la clase');
            $table->foreign('course_modules_id')->references('id')->on('course_modules');
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
        Schema::dropIfExists('course_lessons');
    }
};
