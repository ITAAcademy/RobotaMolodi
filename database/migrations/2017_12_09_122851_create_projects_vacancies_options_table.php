<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsVacanciesOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_vacancies_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacancy_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('value')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects_vacancies_options');
    }
}
