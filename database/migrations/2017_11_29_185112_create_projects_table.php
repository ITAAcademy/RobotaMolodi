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
           $table->integer('industry_id')->nullable();
           $table->string('name')->default('project name');
           $table->string('brand')->default('project nrand');
           $table->string('bonus')->default('project bonuses');
           $table->string('location')->default('somewhere');
           $table->string('logo')->default('logo.png');
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
