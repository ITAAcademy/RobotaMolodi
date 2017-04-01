<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table for roles
        Schema::create('user_roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('role_name',255);
            $table->timestamps();
        });

        // Add user role column
        Schema::table('users', function ($table)
        {
            $table->integer('role')->default(2);
        });

        Schema::table('vacancies', function ($table)
        {
            $table->integer('published')->default(1);
        });

        Schema::table('resumes', function ($table)
        {
            $table->integer('published')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_roles');
        Schema::table('resumes', function ($table) {
            $table->dropColumn('published');
        });
        Schema::table('vacancies', function ($table) {
            $table->dropColumn('published');
        });

    }
}
