<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('contract_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del rol. Ejemplo: "Rol 1", "Rol 22", etc.'); // Nombre del rol. Ejemplo: "Rol 1", "Rol 22", etc.
            $table->decimal('percentage', 5, 2)->comment('Porcentaje asociado al rol. Ejemplo: 10.50 para 10.50%');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contract_roles')->truncate();
        Schema::dropIfExists('contract_roles');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
