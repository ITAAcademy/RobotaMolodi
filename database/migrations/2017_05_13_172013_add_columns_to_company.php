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
        Schema::table('company', function($table){
            $table->string('short_name');
            $table->string('description');
            $table->string('link');
            $table->string('phone');
            $table->integer('industry_id');
            $table->foreign('industry_id')->references('id')->on('industries');
            $table->integer('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
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
            $table->dropColumn(['short_name', 'description', 'link', 'phone', 'industry_id', 'city_id',]);
        });
    }
}
