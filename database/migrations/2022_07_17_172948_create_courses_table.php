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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del curso');
            $table->longText('description')->comment('Descripción breve del curso');
            $table->text('image')->nullable()->comment('Imagen de portada del curso');
            $table->text('video')->nullable()->comment('Imagen de portada del curso');
            $table->enum('language', ['ES', 'EN'])->nullable()->comment('Idioma del curso es : español / en : ingles');
            $table->enum('level', ['B', 'I', 'A'])->nullable()->comment('Nivel requerido B: Basico / I: Intermedio / A: Avanzado');
            $table->json('categories')->nullable()->comment('Categorias del curso');
            $table->boolean('free')->nullable()->comment('Es un curso gratuito');
            $table->bigInteger('teacher_id')->unsigned()->comment('Id del que hara de profesor');
            $table->foreign('teacher_id')->references('id')->on('users');
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
        Schema::dropIfExists('courses');
    }
};
