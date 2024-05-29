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
        Schema::create('user_bills', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->float('amount',null);
            $table->string('name');
            $table->string('lastname');
            $table->bigInteger('countries_id')->unsigned()->comment('Id del pais');
            $table->foreign('countries_id')->references('id')->on('countries');
            $table->string('city');
            $table->integer('cellphone');
            $table->string('email');
            $table->json('courses')->comment('Contiene los detalles de los cursos que se compraron');
            $table->enum('payment_method',['coinpayment'])->default('coinpayment');
            $table->bigInteger('users_id')->unsigned()->comment('Id del usuario');
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
        Schema::dropIfExists('user_bills');
    }
};
