<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre de la persona');
            $table->string('lastname')->comment('Apellido de la persona');
            $table->date('birth_date')->comment('Fecha de nacimiento');
            $table->bigInteger('countries_id')->unsigned()->comment('Id del pais')->nullable();
            $table->foreign('countries_id')->references('id')->on('countries');
            $table->string('phone_prefix', 5)->comment('Prefijo del teléfono')->nullable();
            $table->string('phone_number', 15)->comment('Numero de telefono')->nullable();
            $table->text('about_me')->comment('Sobre mi')->nullable();
            $table->string('career', 100)->comment('Profesión')->nullable();
            $table->enum('languages',['EN','ES'])->comment('Idiomas que habla')->nullable();
            $table->text('web')->comment('Pagina web')->nullable();
            $table->text('facebook')->comment('Perfil de facebook')->nullable();
            $table->text('twitter')->comment('Perfil de twitter')->nullable();
            $table->text('instagram')->comment('Perfil instagram')->nullable();
            $table->text('linkedin')->comment('Perfil de LinkedIn')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
