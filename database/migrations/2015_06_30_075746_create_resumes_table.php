<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resumes', function(Blueprint $table) // Створення талциці в БД
		{
			$table->increments('id');
            $table->integer('id_u');
            $table->string('name_u')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('position')->nullable();
            $table->string('industry')->nullable();
            $table->string('city')->nullable();
            $table->integer('salary')->nullable();
            $table->text('description')->nullable();
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
		Schema::drop('resumes');
	}

}
