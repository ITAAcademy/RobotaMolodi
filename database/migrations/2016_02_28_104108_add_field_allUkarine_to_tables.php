<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldAllUkarineToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function ($table) {
            $table->boolean('vacanyAllUkraine');
        });
        Schema::table('resumes', function ($table) {
            $table->boolean('resumeAllUkraine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function ($table) {
            $table->dropColumn('vacanyAllUkraine');
        });
        Schema::table('resumes', function ($table) {
            $table->dropColumn('resumeAllUkraine');
        });
    }
}
