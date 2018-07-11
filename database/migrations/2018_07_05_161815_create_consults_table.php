<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consults', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consult_id')->unsigned();
            $table->foreign('consult_id')->references('id')->on('users');
            $table->string('telephone')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('position')->nullable();
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consults');
    }
}
