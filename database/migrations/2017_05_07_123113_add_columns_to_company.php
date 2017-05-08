<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function ($table) {
            $table->string('description');
            $table->string('phone');
            $table->string('link_company');
            $table->string('short_name');
            $table->integer('industries_id');
            $table->foreign('industries_id')->references('id')->on('industries');
            $table->integer('cities_id');
            $table->foreign('cities_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company');
    }
}