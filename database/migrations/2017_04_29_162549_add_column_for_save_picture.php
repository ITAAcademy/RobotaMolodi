<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnForSavePicture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function ($table) {
            $table->string('image');
        });
        Schema::table('vacancies', function ($table) {
            $table->string('image');
        });
        Schema::table('resumes', function ($table) {
            $table->string('image');
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
            $table->dropColumn('image');
        });
        Schema::table('vacancies', function ($table) {
            $table->dropColumn('image');
        });
        Schema::table('resumes', function ($table) {
            $table->dropColumn('image');
        });
    }
}
