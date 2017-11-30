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
           $table->integer('user_id')->nullable();
           $table->string('name')->default('');
           $table->string('brand')->default('');
           $table->string('location')->default('');
           $table->string('bonuses')->default('');
           $table->string('company_desc')->default('');
           $table->string('company_about')->default('');
           $table->string('project_about')->default('');
           $table->string('project_term')->default('');
           $table->string('breaf_desc')->default('');
           $table->string('full_desc')->default('');
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
