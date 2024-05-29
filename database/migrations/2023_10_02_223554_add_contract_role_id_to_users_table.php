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
        Schema::table('users', function(Blueprint $table){
            // Añade la columna contract_role_id a la tabla users->$this->nullable()
            $table->unsignedBigInteger('contract_roles_teacher_id')->nullable()->default(6)->after('roles_id');
            $table->unsignedBigInteger('contract_roles_second_id')->nullable()->default(6)->after('roles_id');
            $table->unsignedBigInteger('contract_roles_first_id')->nullable()->default(14)->after('roles_id');
//
//            // Define la columna contract_role_id como una llave foránea
//            $table->foreign('contract_roles_teacher_id')->references('id')->on('contract_roles');
//            $table->foreign('contract_roles_second_id')->references('id')->on('contract_roles');
//            $table->foreign('contract_roles_first_id')->references('id')->on('contract_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function(Blueprint $table){
            if(Schema::hasColumn('users', 'contract_roles_first_id')) {
                $table->dropColumn(['contract_roles_first_id']);
            }
            if(Schema::hasColumn('users', 'contract_roles_second_id')) {
                $table->dropColumn(['contract_roles_second_id']);
            }
            if(Schema::hasColumn('users', 'contract_roles_teacher_id')) {
                $table->dropColumn(['contract_roles_teacher_id']);
            }
        });
    }
};
