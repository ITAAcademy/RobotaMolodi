<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('company_id');
           $table->integer('industry_id');
           $table->string('name');
           $table->string('logo')->nullable();
           $table->string('brand')->nullable();
           $table->string('location')->nullable();
           $table->string('bonuses')->nullable();
           $table->string('project_term')->nullable();
           $table->text('company_desc')->nullable();
           $table->text('company_about')->nullable();
           $table->text('project_about')->nullable();
           $table->text('breaf_desc')->nullable();
           $table->text('full_desc')->nullable();
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
        Schema::drop('projects');
    }
}
