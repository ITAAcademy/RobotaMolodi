<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable()->default(null);;
            $table->string('time_start')->nullable()->default(null);;
            $table->string('time_end')->nullable()->default(null);;
            $table->integer('consults_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('time_consultations');
    }
}
