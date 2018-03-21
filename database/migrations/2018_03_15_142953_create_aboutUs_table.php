<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutUses',function(Blueprint $table)
        {
            $table->increments('id')->nullable();
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->boolean('published')->nullable();
            $table->integer('images_id')->nullable();
            $table->rememberToken();
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
        Schema::drop('aboutsUses');
    }
}
