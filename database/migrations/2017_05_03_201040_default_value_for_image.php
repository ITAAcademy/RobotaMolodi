<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultValueForImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function ($table) {
            $table->string('image')->default('NULL')->change();
        });
        Schema::table('vacancies', function ($table) {
            $table->string('image')->default('NULL')->change();
        });
        Schema::table('resumes', function ($table) {
            $table->string('image')->default('NULL')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function ($table) {
            $table->string('image')->change();
        });
        Schema::table('vacancies', function ($table) {
            $table->string('image')->change();
        });
        Schema::table('resumes', function ($table) {
            $table->string('image')->change();
        });
    }
}
