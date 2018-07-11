<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToVacanciesTelephone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function(Blueprint $table)
        {
            $table->string('telephone')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function(Blueprint $table)
        {
            $table->string('telephone')->nullable();
        });
    }
}
