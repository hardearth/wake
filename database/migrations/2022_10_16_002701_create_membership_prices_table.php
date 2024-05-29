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
        Schema::create('membership_prices', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->comment('Precio de la membresía');
            $table->bigInteger('memberships_id')->unsigned()->comment('Id de la membresia');
            $table->foreign('memberships_id')->references('id')->on('memberships');
            $table->enum('status',['A','I'])->default('A')->comment('Indica si el precio esta A= Activo o I= Inactivo');
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
        Schema::dropIfExists('membership_prices');
    }
};
