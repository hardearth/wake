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
        Schema::create('activity_register', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('activity_id')->unsigned()->comment('Id de la actividad o evento')->nullable();
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->bigInteger('user_id')->unsigned()->comment('Usuario registrado')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('activity_register');
    }
};
