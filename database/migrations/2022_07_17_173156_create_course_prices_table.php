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
        Schema::create('course_prices', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->unsigned();
            $table->enum('status',['A','I'])->default('A')->comment('Indica si el precio esta A= Activo o I= Inactivo');
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
        Schema::dropIfExists('course_prices');
    }
};
