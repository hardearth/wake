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
        Schema::table('course_prices', function (Blueprint $table) {
            $table->bigInteger('courses_id')->unsigned()->comment('Id del curso')->after('amount');
            $table->foreign('courses_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_prices', function (Blueprint $table) {
            $table->dropColumn('courses_id');
        });
    }
};
