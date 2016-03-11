<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Salary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function ($table)
        {
            $table->integer('salary_max');
        });
        Schema::table('vacancies', function ($table)
        {
            $table->string('currency', 3)->default('UAH');
        });

        Schema::table('resumes', function ($table)
        {
            $table->integer('salary_max');
        });
        Schema::table('resumes', function ($table)
        {
            $table->string('currency', 3)->default('UAH');
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
            $table->dropColumn('salary_max');
        });
        Schema::table('resumes', function ($table) {
            $table->dropColumn('salary_max');
        });
    }
}
