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
        Schema::create('course_live', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->comment('Id del que hara de profesor');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->string('title')->comment('Titulo de clase en vivo');
            $table->json('categories')->nullable()->comment('Categorias del curso');
            $table->text('description')->comment('Descripción de clase en vivo');
            $table->text('url_video')->comment('Url de video de introducción');
            $table->text('url_meeting')->comment('Url de meeting');
            $table->timestamp('lesson_date_at')->comment('Fecha de clase en vivo');
            $table->uuid('slug')->comment('Texto con el cual se accedera públicamente al detalle de la clase en vivo');
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
        Schema::dropIfExists('course_live');
    }
};
