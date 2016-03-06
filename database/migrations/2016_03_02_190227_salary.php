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
            $table->integer('salary_max')->nullable();
        });
        Schema::table('vacancies', function ($table)
        {
            $table->integer('currency_id')->default('0');
        });

        Schema::table('resumes', function ($table)
        {
            $table->integer('salary_max')->nullable();
        });
        Schema::table('resumes', function ($table)
        {
            $table->integer('currency_id')->default('0');
        });

        Schema::create('currencies', function($table)
        {
            $table->increments('id');
            $table->string('currency', 3);
            $table->float('index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
