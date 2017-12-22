<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('total')->nullable();
            $table->integer('free')->nullable();
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
        Schema::drop('projects_vacancies');
    }
}
