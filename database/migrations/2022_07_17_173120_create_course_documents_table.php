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
        Schema::create('course_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del documento');
            $table->string('description')->comment('Breve descripcion')->nullable();
            $table->string('path')->comment('Ubicacion del archivo');
            $table->string('type')->comment('Tipo de archivo');
            $table->bigInteger('course_lessons_id')->unsigned()->comment('Id del modulo al que esta asociado la clase');
            $table->foreign('course_lessons_id')->references('id')->on('course_lessons');
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
        Schema::dropIfExists('course_documents');
    }
};
