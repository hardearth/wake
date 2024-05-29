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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Nombre evento.');
            $table->string('second_name')->comment('Segundo nombre evento.');
            $table->string('description')->comment('Descripción.');
            $table->string('date')->comment('Fecha del evento.');
            $table->string('banner_image')->comment('Imagen banner evento.');
            $table->string('featured_image')->comment('Imagen destacada.');
            $table->bigInteger('activity_categories_id')->unsigned()->comment('Categoría del evento.');
            $table->foreign('activity_categories_id')->references('id')->on('activity_categories');
            $table->bigInteger('users_id')->unsigned()->comment('Presentadores del evento.');
            $table->foreign('users_id')->references('id')->on('users');
            $table->bigInteger('created_users_id')->unsigned()->comment('Usuario que creo el evento');
            $table->foreign('created_users_id')->references('id')->on('users');
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
        Schema::dropIfExists('activities');
    }
};
